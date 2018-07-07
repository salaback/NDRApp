<article class="panel
        @if($vote['vote'] == 'yes')
            panel-success
        @elseif($vote['vote'] == 'no')
            panel-danger
        @endif
            panel-outline">

        <!-- Icon -->
            <div class="panel-heading icon">
                @if($vote['vote'] == 'yes')
                <i class="glyphicon glyphicon-ok"></i>
                @elseif($vote['vote'] == 'no')
                <i class="glyphicon glyphicon-remove"></i>
                @endif
            </div>
            <!-- /Icon -->

            <!-- Body -->
            <div class="panel-body">
                <strong>Voted @if($vote['vote'] == 'yes') for @else against @endif </strong> {{$vote['poll']}}
            </div>
            <!-- /Body -->
    </article>
