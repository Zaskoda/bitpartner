    <div class="form-group">
        <label for="name" class="col-2-sm control-label">Coin Name</label>
        <div class="col-10-sm">
        {{ Form::text('name', null, ['placeholder'=>'Bitcoin', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="symbol" class="col-2-sm control-label">Coin Symbol</label>
        <div class="col-10-sm">
        {{ Form::text('symbol', null, ['placeholder'=>'BTC', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="genesis_date" class="col-2-sm control-label">Genesis Date</label>
        <div class="col-10-sm">
        {{ Form::date('genesis_date', '', ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="summary" class="col-2-sm control-label">Summary</label>
        <div class="col-10-sm">
        {{ Form::text('summary', null, ['placeholder'=>'all about it', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-2-sm control-label">Description</label>
        <div class="col-10-sm">
        {{ Form::textarea('description', null, ['placeholder'=>'all about it, in detail', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="homepage" class="col-2-sm control-label">Website</label>
        <div class="col-10-sm">
        {{ Form::text('website', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="source" class="col-2-sm control-label">Source Code</label>
        <div class="col-10-sm">
        {{ Form::text('source', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="paper" class="col-2-sm control-label">Academic Paper</label>
        <div class="col-10-sm">
        {{ Form::text('paper', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="creator" class="col-2-sm control-label">Primary Author / Creator</label>
        <div class="col-10-sm">
        {{ Form::text('creator', null, ['placeholder'=>'Satoshi Nakamoto', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="logo" class="col-2-sm control-label">Logo URL</label>
        <div class="col-10-sm">
        {{ Form::text('logo', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="twitter" class="col-2-sm control-label">Twitter Feed</label>
        <div class="col-10-sm">
        {{ Form::text('twitter', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="reddit" class="col-2-sm control-label">SubReddit</label>
        <div class="col-10-sm">
        {{ Form::text('reddit', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="wikipedia" class="col-2-sm control-label">Wikipedia Entry</label>
        <div class="col-10-sm">
        {{ Form::text('wikipedia', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="docs" class="col-2-sm control-label">Documentation</label>
        <div class="col-10-sm">
        {{ Form::text('docs', null, ['placeholder'=>'https://', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="forked_from" class="col-1-sm  control-label">Forked From</label>
        <div class="col-10-sm">
        {{ Form::number('forked_from', null, ['placeholder'=>'id', 'class'=>'form-control']) }}
        </div>
    </div>
