
                    <div class="form-group">
                        <label for="title" class="col-2-sm control-label">Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('name', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-2-sm control-label">API Token</label>
                        <div class="col-10-sm">
                        {{ Form::text('api_token', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summary" class="col-2-sm control-label">Owner</label>
                        <div class="col-10-sm">
                        {{ Form::number('user_id', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
