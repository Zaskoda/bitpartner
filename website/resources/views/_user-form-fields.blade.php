    <div class="form-group">
        <label for="name" class="col-2-sm control-label">User Name</label>
        <div class="col-10-sm">
        {{ Form::text('name', null, ['placeholder'=>'Bitcoin', 'class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-2-sm control-label">Email</label>
        <div class="col-10-sm">
        {{ Form::text('email', null, ['placeholder'=>'user@somewhere...', 'class'=>'form-control']) }}
        </div>
    </div>
