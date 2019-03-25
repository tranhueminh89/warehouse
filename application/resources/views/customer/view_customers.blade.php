@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | @lang('viewcustomers.View Customers')
@endsection

@section('heading')
    @lang('viewcustomers.Customers and Their Stats')
@endsection

@section('content')

    <div id="app">

        <vtable url="customer/items/filter" :columns="columns" :filters="filters"></vtable>

    </div>

@endsection

@section('jquery')
    <script>

        new Vue({
            el: '#app',
            data: {
                columns: [
                    {
                        "name":"companyName",
                        "title":"Company Name",
                        "sortField":"companyName",
                        "visible":true
                    },
                    {
                        "name":"quotes",
                        "title":"Quote",
                        "sortField":"quotes",
                        "visible":true
                    },
                    {
                        "name":"invoices",
                        "title":"Invoices",
                        "sortField":"invoices",
                        "visible":true
                    },
                    {
                        "name":"paymentsMade",
                        "title":"Payment",
                        "sortField":"payments",
                        "visible":true
                    },
                    {
                        "name":"due",
                        "title":"Due Amount",
                        "sortField":"Due Amount",
                        "visible":true
                    },
                    {
                        "name":"companyEmail",
                        "title":"Email",
                        "sortField":"companyEmail",
                        "visible":true
                    },
                    {
                        "name":"companyCurrency",
                        "title":"Currency",
                        "sortField":"companyCurrency",
                        "visible":true
                    },

                    {
                        "name":"customerType",
                        "title":"Customer Type",
                        "sortField":"customerType",
                        "visible":true
                    },
                    {
                        "name":"statement",
                        "title":"Statement",
                        "sortField":"statement",
                        "visible":true
                    },
                    {
                        "name":"country",
                        "title":"Country",
                        "sortField":"country",
                        "visible":false
                    },
                    {
                        "name":"creditLimit",
                        "title":"Credit Limit",
                        "sortField":"creditLimit",
                        "visible":false
                    },
                    {
                        "name":"days",
                        "title":"Credit Days",
                        "sortField":"days",
                        "visible":false
                    },
                    {
                        "name":"discount",
                        "title":"discount",
                        "sortField":"discount",
                        "visible":false
                    },
                    {
                        "name":"active",
                        "title":"Active",
                        "sortField":"active",
                        "visible":false
                    },
                    {
                        "name":"disableReason",
                        "title":"disableReason",
                        "sortField":"disableReason",
                        "visible":false
                    },
                    {
                        "name":"updatedBy",
                        "title":"updatedBy",
                        "sortField":"updatedBy",
                        "visible":false
                    },
                    {
                        "name":"createdBy",
                        "title":"createdBy",
                        "sortField":"createdBy",
                        "visible":false
                    },

                    {
                        "name":"hash",
                        "title":"hash",
                        "sortField":"hash",
                        "visible":false
                    },
                    {
                        "name":"deleted_at",
                        "title":"deleted_at",
                        "sortField":"deleted_at",
                        "visible":false
                    },
                    {
                        "name":"created_at",
                        "title":"created_at",
                        "sortField":"created_at",
                        "visible":false
                    },
                    {
                        "name":"updated_at",
                        "title":"updated_at",
                        "sortField":"updated_at",
                        "visible":false
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