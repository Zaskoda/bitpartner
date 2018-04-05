
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
                        <label for="summary" class="col-2-sm control-label">Summary</label>
                        <div class="col-10-sm">
                        {{ Form::text('summary', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="publish_date" class="col-2-sm control-label">Publish Date</label>
                        <div class="col-10-sm">
                        {{ Form::date('publish_date', null, ['class'=>'form-control']) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="body" class="col-2-sm control-label">Body</label>
                        <div class="col-10-sm">
                        {{ Form::textarea('body', null, ['placeholder'=>'You can use markdown here', 'class'=>'form-control']) }}
                        </div>
                    </div>
