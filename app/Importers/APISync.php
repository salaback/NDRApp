<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 06/07/18
 * Time: 15:12
 */

namespace App\Importers;


use App\ApiSources;
use App\CastVote;
use App\District;
use App\Entity;
use App\Party;
use App\PartyAffiliation;
use App\Person;
use App\Promise;
use Carbon\Carbon;
use Orchestra\Parser\Xml\Facade as XmlParser;



class APISync
{
    public function run()
    {
        $syncs = [
            'hamburgbmember'
        ];

        foreach($syncs as $slug)
        {

            $this->$slug();
        }

    }

    /**
     *
     * Updated information from Bundestag Memebership
     * database
     *
     */

    private function hamburgbmember()
    {

        $data = $this->getRequest('https://www.abgeordnetenwatch.de/api/parliament/hamburg/deputies.json');

        $allData = json_decode($data, true);

        $i = 0;
        foreach($allData['profiles'] as $item)
        {

            $personal = $item['personal'];

            // find or create an entity
            $entity = Entity::firstOrCreate(['name' => $personal['first_name'] . ' ' . $personal['last_name']]);

            // add person if needed
            if($entity->entitable_type == null)
            {
                $current = Person::create($personal);

                $entity->entitiable_type = '\App\Person';
                $entity->entitiable_id = $current->id;

                $entity->save();
            }
            else
            {
                $current = Person::find($entity->entitable_id);
            }


            // Add district association
            if($current->district_id == null)
            {
                $current_district = District::firstOrCreate(['name' => $item['parliament']['name'], 'state' => true]);
                $current->district_id = $current_district->id;
                $current->save();
            }

            $party = Party::firstOrCreate(['name' => $item['party'], 'district_id' => $current->district_id]);


            // Add party affiliation
            if(PartyAffiliation::where('person_id', $entity->person->id)->exists())
            {
                // get most recent party affiliation
                $current_party = PartyAffiliation::where('person_id', $entity->person_id)
                                                ->orderBy('start')
                                                ->first();

                if(isset($current_party->party_id) && !$current_party->party_id == $party->id)
                {
                    $current_party->end = Carbon::now();
                    $current_party->save();

                    $current_party = PartyAffiliation::create([
                        'start' => Carbon::now(),
                        'party_id' => $party->id,
                        'person_id' => $current->id
                    ]);
                }


            }
            else
            {
                $current_party = PartyAffiliation::create([
                    'start' => Carbon::now(),
                    'party_id' => $party->id,
                    'person_id' => $current->id
                ]);
            }

        }

    }

    private function getRequest($url)
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $output;
    }
}