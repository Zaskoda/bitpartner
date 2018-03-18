
                    <div class="form-group">
                        <label for="title" class="col-2-sm control-label">ICO Title</label>
                        <div class="col-10-sm">
                        {{ Form::text('title', null, ['placeholder'=>'ico...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-2-sm control-label">Description</label>
                        <div class="col-10-sm">
                        {{ Form::textarea('description', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="announce_link" class="col-2-sm control-label">Announcement Link</label>
                        <div class="col-10-sm">
                        {{ Form::text('announce_link', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="col-2-sm control-label">Company Name</label>
                        <div class="col-10-sm">
                        {{ Form::text('company', null, ['placeholder'=>'...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_link" class="col-2-sm control-label">Company Link</label>
                        <div class="col-10-sm">
                        {{ Form::text('company_link', null, ['placeholder'=>'http://...', 'class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_date" class="col-2-sm control-label">Start Date</label>
                        <div class="col-10-sm">
                        {{ Form::date('start_date', null, ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="col-2-sm control-label">End Date</label>
                        <div class="col-10-sm">
                        {{ Form::date('end_date', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
