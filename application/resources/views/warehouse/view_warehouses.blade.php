@extends('layouts.master')

@section('title')
    {!! env('COMPANY_NAME') !!}|@lang('viewwarehouses.Warehouses')
@endsection

@section('sidebar')

@endsection
@section('heading')
    @lang('viewwarehouses.View Warehouses and Products Stocked in them')
@endsection
@section('content')
    <div id="app">
        <vtable url="api/warehouses" :columns="columns" :filters="filters"></vtable>
    </div>
@endsection

@section('jquery')
    <script>
        new Vue({
            el: '#app',
            data: {

                columns: [
                    {
                        name: 'whsName',
                        title: 'Warehouse Name',
                        visible:true
                    }, {
                        name: 'whsBuilding',
                        title: 'Warehouse Building',
                        visible:true
                    }, {
                        name: 'viewProducts',
                        title: 'Products in warehouse',
                        visible:true
                    }, {
                        name: 'whsState',
                        title: 'Warehouse State',
                        visible:true
                    }, {
                        name: 'addBin',
                        title: 'Add A bin Location',
                        visible:true
                    }, {
                        name: 'viewBin',
                        title: 'view Bin Locations',
                        visible:true
                    },
                    {
                        name: '__component:custom-actions',
                        title: 'Actions',
                        titleClass: 'text-center',
                        dataClass: 'text-center'
                    }
                ],
                filters: [

                ]

            },
            methods: {}
        })
    </script>

@endsection