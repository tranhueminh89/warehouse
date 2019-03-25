@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | View All Items in inventory
@endsection

@section('heading')
    Products
@endsection
@section('content')

    <div id="app">

        <vtable url="{!! url('products/items/outofstock') !!}" v-on:collapse="collapse" v-on:expand="expand" :columns="columns" threshold="9" multi-sort=true :filters="filters"></vtable>

    </div>

@endsection


@section('jquery')
    <script>
        var x = new Vue({
            el: '#app',
            data: {
                columns: [
                    {
                        name: 'hash',
                        title: 'hash',
                        visible: false
                    },
                    {
                        name: 'productName',
                        title: 'Product Name',
                        sortField: 'productName',
                        visible: true
                    }, {
                        name: 'image',
                        title: 'Image',
                        sortField: 'image',
                        visible: false
                    },{
                        name: 'location',
                        title: 'Location',
                        sortField: 'location',
                        visible: true
                    }, {
                        name: 'categoryName',
                        title: 'Category',
                        sortField: 'categoryName',
                        visible: true
                    }, {
                        name: 'productSerial',
                        title: 'Serial',
                        sortField: 'productSerial',
                        visible: true
                    }, {
                        name: 'unitCost',
                        title: 'Unit Cost',
                        sortField: 'unitCost',
                        visible: true
                    }, {
                        name: 'totalCost',
                        title: 'Total Cost',
                        sortField: 'totalCost',
                        visible: true
                    }, {
                        name: 'amount',
                        title: 'Amount',
                        sortField: 'amount',
                        visible: true
                    }, {
                        name: 'reorderAmount',
                        title: 'Reorder Amount',
                        sortField: 'reorderAmount',
                        visible: true
                    },
                    {
                        name: '__component:custom-actions',
                        title: 'Actions',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        visible: true
                    }
                ],
                filters: [
                ]

            },
            methods: {
                expand(){
                    $('body').removeClass('sidebar-collapse')
                },
                collapse(){
                    $('body').addClass('sidebar-collapse')
                }
            }
        })
    </script>
@endsection


