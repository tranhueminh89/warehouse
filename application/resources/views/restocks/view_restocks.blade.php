@extends('layouts.master')

@section('title')
    @lang('createrestock.Restock Item in inventory')
@endsection

@section('heading')
    @lang('viewrestocks.Restocks')
@endsection


@section('content')
    <div id="app">
        <vtable url="restock/filter/items" :columns="columns" :filters="filters"></vtable>

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
                        visible:true
                    }, {
                        name: 'untCost',
                        title: 'Unit Cost',
                        visible:true
                    }, {
                        name: 'itemCost',
                        title: 'Item Cost',
                        visible:true
                    }, {
                        name: 'amount',
                        title: 'Amount',
                        visible:true
                    }, {
                        name: 'warehouse.whsName',
                        title: 'Warehouse',
                        visible:true
                    }, {
                        name: 'bin',
                        title: 'Bin',
                        visible:true
                    }, {
                        name: 'supplierName',
                        title: 'Supplier',
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
