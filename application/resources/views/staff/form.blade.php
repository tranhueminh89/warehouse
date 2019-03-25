<div class="panel panel-default cls-panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $title }}
        </h3>
    </div>
    @if(isset($user))
        {!! Form::model($user, ['action' => ['StaffController@update', $user->id], 'method' =>
        'patch'])
        !!}
    @else
        {!! Form::open(array('action' => 'StaffController@store', 'onsubmit' => 'return postForm();',
        'files'=>false)) !!}
    @endif
    <div class="panel-body">
        <div class="form-group{!! $errors->has('name') ? ' has-error' : '' !!}">
            {!! Form::label('name',  trans('createstaff.Staff Name') ) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
            {!! Form::label('email', trans('createstaff.Email')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
            {!! Form::label('password', trans('createstaff.Password')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control">
            </div>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="form-group{!! $errors->has('departmentId') ? ' has-error' : '' !!}">
            {!! Form::label('departmentId', trans('createstaff.User Department'). ' (Add Department in Department Module)') !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                {!! Form::select('departmentId',$departments, null, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('departmentId', '<p class="help-block">:message</p>') !!}
        </div>




    </div>
    <div class="panel-footer">
        <button type="submit" class="btn btn-flat save_form bg-green btn-block"><i
                    class="fa fa-user-plus"></i> @lang('createstaff.Save User')</button>
    </div>
    {!! Form::close() !!}
</div>
