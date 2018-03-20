
                    <div class="form-group">
                        <label for="title" class="col-2-sm control-label">Title</label>
                        <div class="col-10-sm">
                        {{ Form::text('title', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slug" class="col-2-sm control-label">Slug</label>
                        <div class="col-10-sm">
                        {{ Form::text('slug', null, ['placeholder'=>'leave blank to auto-generate...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-2-sm control-label">Body</label>
                        <div class="col-10-sm">
                        {{ Form::textarea('body', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>
