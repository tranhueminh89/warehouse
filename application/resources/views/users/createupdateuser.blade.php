@extends('layouts.master')

@section('title')
    {!! env('COMPANY_NAME') !!} | @lang('createuser.Edit/Create Users')
@endsection

@section('heading')
    {{ $title }}
@endsection

@section('content')
    <div id="app">
        @include('users.form')
    </div>

@endsection

@section('jquery')
    <script>
        app = new Vue({
            el: '#app',
            data: {

            }
        });
    </script>

@endsection