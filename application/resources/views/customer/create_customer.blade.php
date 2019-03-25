@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | @lang('createcustomer.' . $title)
@endsection

@section('heading')
    @lang('createcustomer.' . $title)
@endsection

@section('content')
    @include('customer.form')
@endsection

@section('js')

@endsection