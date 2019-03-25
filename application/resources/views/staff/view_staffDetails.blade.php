@extends('layouts.master')

@section('title')
    @lang('viewstaff.Staff')
@endsection

@section('heading')
    View Staff Details
@endsection

@section('content')
    <div id="app">
        <div class="panel panel-default cls-panel">
            <div class="panel-body">
                <canvas id="mix4" count="1"></canvas>
            </div>
        </div>
        <chartjs-line target="mix4" :datalabel="'Staff'" :labels={!! json_encode($staff->dispatches->pluck('date')) !!} :data="{!! json_encode($staff->dispatches->pluck('amount')) !!}"></chartjs-line>

    </div>
@endsection

@section('jquery')

    <script>
        new Vue({
            el: '#app',
            data: {


            },
            methods: {}
        });
    </script>

@endsection