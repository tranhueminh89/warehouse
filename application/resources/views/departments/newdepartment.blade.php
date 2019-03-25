@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection

@section('heading')
    {!! Helper::translateAndShorten($title,'createdepartment',50)!!}
@endsection

@section('content')
    @include('departments.form')
@endsection

@section('jquery')
    <script>
        $('#budgetStartDate,#budgetEndDate').datepicker({
        format:"yyyy/mm/dd"
        });
    </script>
@endsection