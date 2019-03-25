@extends('layouts.master')

@section('title')
    {!! env('COMPANY_NAME') !!} | @lang('viewproductlocations.Warehouse Locations')
@endsection

@section('heading')
    @lang('viewproductlocations.View Products in Warehouse')
@endsection

@section('content')
    <div id="app">

        <vtable url="{{action('ProductController@table',array('id'=>$id,'scope'=>array('warehouse',$id)))}}" :columns="columns" :filters="filters"></vtable>
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
                    }, {
                        name: 'productLocationName',
                        title: 'Warehouse',
                    }, {
                        name: 'binLocationName',
                        title: 'Bin Location',
                    }, {
                        name: 'amount',
                        title: 'Amount',
                    },
                    {
                        name: '__component:custom-actions',
                        title: 'Actions',
                        titleClass: 'text-center',
                        dataClass: 'text-center'
                    }
                ],
                filters: []

            },
            methods: {}
        })
    </script>


@endsection