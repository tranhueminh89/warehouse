@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | @lang('viewpayments.View Payments')
@endsection

@section('heading')
    @lang('viewpayments.Invoice Payments')
@endsection

@section('content')
    <div id="app">
        <vtable url="payments/items/filter" :columns="columns" :filters="filters"></vtable>
    </div>
@endsection

@section('jquery')
    <script>
        new Vue({
            el: '#app',
            data: {
                columns: [

                    {
                        "name": "invoiceNo",
                        "title": "Invoice No",
                        "sortField": "invoiceNo",
                        "visible": true
                    },
                    {
                        "name": "customer",
                        "title": "Customer",
                        "sortField": "customer",
                        "visible": true
                    },
                    {
                        "name": "paymentMethod",
                        "title": "Payment Method",
                        "sortField": "paymentMethod",
                        "visible": false
                    },
                    {
                        "name": "paymentNarration",
                        "title": "Narration",
                        "sortField": "paymentNarration",
                        "visible": true
                    },
                    {
                        "name": "total",
                        "title": "Total",
                        "sortField": "total",
                        "visible": true
                    },
                    {
                        "name": "paymentMethod",
                        "title": "Payment Method",
                        "sortField": "paymentMethod",
                        "visible": true
                    },
                    {
                        "name": "paymentTerms",
                        "title": "Payment Terms",
                        "sortField": "paymentTerms",
                        "visible": false
                    },
                    {
                        "name": "total",
                        "title": "Total",
                        "sortField": "total",
                        "visible": true
                    },

                    {
                        "name": "paymentRemarks",
                        "title": "Remarks",
                        "sortField": "paymentRemarks",
                        "visible": false
                    },
                    {
                        "name": "viewInvoice",
                        "title": "View Invoice",
                        "sortField": "viewInvoice",
                        "visible": true
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
        });
    </script>
@endsection