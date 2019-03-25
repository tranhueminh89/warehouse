@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!}|@lang('viewdispatches.Dispatch Items From Stock')
@endsection
@section('heading')
    @lang('viewdispatches.Dispatches')
@endsection
@section('content')
    <div id="app">
        <vtable url="{{action('DispatchController@table')}}" :columns="columns" :filters="filters"></vtable>
    </div>

@endsection


@section('jquery')
    <script>
        new Vue({
            el: '#app',
            data: {
                columns: [
                    {
                        name: 'productName',
                        title: 'Product Name',
                        visible: true
                    }, {
                        name: 'amount',
                        title: 'Amount',
                        visible: true
                    }, {
                        name: 'product.categoryName',
                        title: 'Category',
                        visible: true
                    }, {
                        name: 'user',
                        title: 'Dispatched To',
                        visible: true
                    }, {
                        name: 'totalCost',
                        title: 'Total Cost',
                        visible: true
                    }, {
                        name: 'warehouseName',
                        title: 'Warehouse',
                        visible: true
                    }, {
                        name: 'bin',
                        title: 'Bin Location',
                        visible: true
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



