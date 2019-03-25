@extends('layouts.master')

@section('title')
    {!! env('COMPANY_NAME') !!} | @lang('createsupplier.Add New Supplier')
@endsection

@section('heading')
    {{ $title }}
@endsection

@section('content')
    @include('suppliers.form')
@endsection

@section('js')

@endsection