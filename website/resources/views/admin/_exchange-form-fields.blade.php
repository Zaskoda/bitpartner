
                    <div class="form-group">
                        <label for="name" class="col-2-sm control-label">Platform Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('name', null, ['placeholder'=>'platform...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-2-sm control-label">Description</label>
                        <div class="col-10-sm">
                        {{ Form::textarea('description', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link" class="col-2-sm control-label">Link</label>
                        <div class="col-10-sm">
                        {{ Form::text('link', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>
