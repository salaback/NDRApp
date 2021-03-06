
<!-- Timeline -->
<div class="timeline">

    <!-- Line component -->
    <div class="line text-muted"></div>

    <!-- /Separator -->

    @foreach($timeline as $year => $yearElement)
        @foreach($yearElement as $month => $monthElement)
            @foreach($monthElement as $day => $dayElement)
                <div class="separator text-muted">
                    <time>{{$month}} {{$year}}</time>
                </div>
                    @foreach($dayElement as $element)
                        @if($element['type'] == 'vote')
                            @include('snipits.timeline_moment.voted', ['vote' => $element])
                        @elseif($element['type'] == 'promise')
                            @include('snipits.timeline_moment.promise', ['promise' => $element])
                        @endif
                    @endforeach
            @endforeach
        @endforeach
    @endforeach



    <!-- Panel -->
    <article class="panel panel-primary">

        <!-- Icon -->
        <div class="panel-heading icon">
            <i class="glyphicon glyphicon-plus"></i>
        </div>
        <!-- /Icon -->

        <!-- Heading -->
        <div class="panel-heading">
            <h2 class="panel-title">New content added</h2>
        </div>
        <!-- /Heading -->

        <!-- Body -->
        <div class="panel-body">
            Some new content has been added.
        </div>
        <!-- /Body -->

        <!-- Footer -->
        <div class="panel-footer">
            <small>Footer is also supported!</small>
        </div>
        <!-- /Footer -->

    </article>
    <!-- /Panel -->

    <!-- Separator -->
    <div class="separator text-muted">
        <time>25. 3. 2015</time>
    </div>
    <!-- /Separator -->

    <!-- Panel -->
    <article class="panel panel-success">

        <!-- Icon -->
        <div class="panel-heading icon">
            <i class="glyphicon glyphicon-plus"></i>
        </div>
        <!-- /Icon -->

        <!-- Heading -->
        <div class="panel-heading">
            <h2 class="panel-title">New content added</h2>
        </div>
        <!-- /Heading -->

        <!-- Body -->
        <div class="panel-body">
            Anything you can do with <code>.panel</code>, can be done in timeline too!
        </div>
        <!-- /Body -->

        <!-- List group -->
        <ul class="list-group">
            <li class="list-group-item">Like</li>
            <li class="list-group-item">list</li>
            <li class="list-group-item">groups</li>
            <li class="list-group-item">and</li>
            <li class="list-group-item">tables</li>
        </ul>

    </article>
    <!-- /Panel -->

    <!-- Panel -->
    <article class="panel panel-info panel-outline">

        <!-- Icon -->
        <div class="panel-heading icon">
            <i class="glyphicon glyphicon-info-sign"></i>
        </div>
        <!-- /Icon -->

        <!-- Body -->
        <div class="panel-body">
            That is all.
        </div>
        <!-- /Body -->

    </article>
    <!-- /Panel -->

</div>
<!-- /Timeline -->


@push('style')

    <style>
        .timeline {
            position: relative;
            padding: 21px 0px 10px;
            margin-top: 4px;
            margin-bottom: 30px;
        }

        .timeline .line {
            position: absolute;
            width: 4px;
            display: block;
            background: currentColor;
            top: 0px;
            bottom: 0px;
            margin-left: 30px;
        }

        .timeline .separator {
            border-top: 1px solid currentColor;
            padding: 5px;
            padding-left: 40px;
            font-style: italic;
            font-size: .9em;
            margin-left: 30px;
        }

        .timeline .line::before { top: -4px; }
        .timeline .line::after { bottom: -4px; }
        .timeline .line::before,
        .timeline .line::after {
            content: '';
            position: absolute;
            left: -4px;
            width: 12px;
            height: 12px;
            display: block;
            border-radius: 50%;
            background: currentColor;
        }

        .timeline .panel {
            position: relative;
            margin: 10px 0px 21px 70px;
            clear: both;
        }

        .timeline .panel::before {
            position: absolute;
            display: block;
            top: 8px;
            left: -24px;
            content: '';
            width: 0px;
            height: 0px;
            border: inherit;
            border-width: 12px;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }

        .timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
        .timeline .panel .panel-heading.icon {
            position: absolute;
            left: -59px;
            display: block;
            width: 40px;
            height: 40px;
            padding: 0px;
            border-radius: 50%;
            text-align: center;
            float: left;
        }

        .timeline .panel-outline {
            border-color: transparent;
            background: transparent;
            box-shadow: none;
        }

        .timeline .panel-outline .panel-body {
            padding: 10px 0px;
        }

        .timeline .panel-outline .panel-heading:not(.icon),
        .timeline .panel-outline .panel-footer {
            display: none;
        }
    </style>

@endpush