@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | View Department
@endsection
@section('heading')
    Department Detail
@endsection
@section('content')
    <div class="panel panel-default cls-panel">
        <div class="panel-heading">
            <h3 class="panel-title"> View Department </h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <span class="form-control">{{ $department->name }}</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('budgetLimit', trans('createdepartment.Budget Limit')) !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <span class="form-control">{{ $department->budgetLimit }}</span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('departmentEmail', trans('createdepartment.Department Email')) !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <span class="form-control">{{ $department->departmentEmail }}</span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('budgetStartDate', trans('createdepartment.Budget Start Date')) !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <span class="form-control">{{ $department->budgetStartDate }}</span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('budgetEndDate', trans('createdepartment.Budget End Date')) !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <span class="form-control">{{ $department->budgetEndDate }}</span>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('jquery')
    <script>

    </script>
@endsection