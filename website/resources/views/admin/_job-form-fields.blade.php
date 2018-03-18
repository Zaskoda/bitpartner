
                    <div class="form-group">
                        <label for="title" class="col-2-sm control-label">Job Title</label>
                        <div class="col-10-sm">
                        {{ Form::text('title', null, ['placeholder'=>'job...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="source" class="col-2-sm control-label">Source URL</label>
                        <div class="col-10-sm">
                        {{ Form::text('source', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="col-2-sm control-label">Company Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('company', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_website" class="col-2-sm control-label">Company Website</label>
                        <div class="col-10-sm">
                        {{ Form::text('company_website', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-2-sm control-label">Description</label>
                        <div class="col-10-sm">
                        {{ Form::textarea('description', null, ['placeholder'=>'', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_date" class="col-2-sm control-label">Post Date</label>
                        <div class="col-10-sm">
                        {{ Form::date('post_date', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>

