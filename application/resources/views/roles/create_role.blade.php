@extends('layouts.master')

@section('title')

@endsection

@section('sidebar')

@endsection

@section('content')

    <div id="role_module">

        @if(isset($role))
            {!! Form::model($role, ['action' => ['RoleController@update', $role->id], 'method' =>
            'patch'])
            !!}
        @else
            {!! Form::open(array('action' => 'RoleController@store', 'files'=>false)) !!}
        @endif


        <div class="panel panel-default cls-panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Add/Edit Role
                </h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{!! $errors->has('roleName') ? ' has-error' : '' !!}">
                            {!! Form::label('roleName', 'Role Name') !!}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                {!! Form::text('roleName', $roleName, ['disabled'=>'true','class' => 'form-control','placeholder'=>'Role Name']) !!}
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>
                            {!! $errors->first('roleName', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{!! $errors->has('model') ? ' has-error' : '' !!}">
                            {!! Form::label('model', 'Module') !!}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                <select2 v-model="model" name="model" :options="{{ json_encode($models) }}"></select2>
                            </div>
                            {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group{!! $errors->has('action') ? ' has-error' : '' !!}">
                            {!! Form::label('action', 'Action') !!}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-ban"></i></span>
                                <select2 name="action" :options="{{ json_encode($actions) }}"></select2>

                            </div>
                            {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{!! $errors->has('permission') ? ' has-error' : '' !!}">
                            {!! Form::label('permission', 'Permission') !!}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-ban"></i></span>
                                <select2 name="permission" :options="[{id:0,text:'No'},{id:1,text:'Yes'}]"></select2>

                            </div>
                            {!! $errors->first('permission', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <a class="text-center" href="{{action('RoleController@assignAll',array('roleId'=>$roleId))}}">Assign All Roles</a>
                </div>

            </div>
            <div class="panel-footer">
                <input type="hidden" name="roleId" value="{{$roleId}}"/>
                <button type="submit" class="btn btn-flat bg-green btn-block">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
        <hr/>
        <table class="table table-paper table-condensed table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Module</th>
                <th>Create</th>
                <th>View</th>
                <th>View Table Listing</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>
            @foreach ($permissions as $permission)
                <tr class="">
                    <th scope="row">{{$i}}</th>
                    <td>{{ucwords($permission->model)}}</td>
                    <td>{{$permission->canCreate}}</td>
                    <td>{{$permission->canView}} </td>
                    <td>{{$permission->canGlance}} </td>
                    <td>{{$permission->canUpdate}}</td>
                    <td>{{$permission->canDelete}}</td>
                    <td>{{Carbon::parse($permission->created_at)->format('d/m/Y')}} </td>
                    <td>{{Carbon::parse($permission->updated_at)->format('d/m/Y')}} </td>
                    <?php $i++; ?>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection

@section('jquery')
    <script>
        app = new Vue({
            el: '#role_module',
            data: {
                module: '',
                model:''

            }
        });
    </script>

@endsection