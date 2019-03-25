@extends('layouts.master')

@section('title')
    {!! env('COMPANY_NAME') !!} | Updates and HotFixes
@endsection


@section('heading')
    Stock Awesome Updates
@endsection

@section('content')
    <iframe class="airtable-embed" src="https://airtable.com/embed/shrhhTKqeMUWZRo5d?backgroundColor=orange"
            frameborder="0" onmousewheel="" width="100%" height="533"
            style="background: transparent; border: 1px solid #ccc;"></iframe>
@endsection


@section('jquery')
    <script>
        $(document).ready(function () {

            $("body").addClass('sidebar-collapse');
        });
    </script>
@endsection

