    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h2>
                <div class="pull-right"><span class="badge">{{ $coin->symbol }}</span></div>
                {{ $coin->name }}
            </h2>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-default btn-xs" href="{{ $coin->website }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><br>Website</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->source }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Source</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->paper }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span><br>Paper</a>
                <a class="btn btn-default btn-xs" href="{{ $coin->twitter }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><br>Twitter</a>
            </div>
            <div style="margin-top: 0.5em; height: 4em; width: 4em; overflow: hidden;" class="text-center pull-right">
                @if($coin->logo) 
                    <img src="{{ $coin->logo }}" style="max-height: 100%; max-width: 100%">
                @endif
            </div>
            <p>Genesis::<br> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$coin->genesis_date)->toFormattedDateString() }}</p>
            <p>Author:<br> {{ $coin->creator }}</p>
            <p style="height: 7em; overflow-y: scroll; width: 100%" class="well">{{ $coin->description }}
            </p>
            <div>{{ $coin->forked_from }}</div>

        </div>
