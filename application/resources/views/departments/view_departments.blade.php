@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!}|@lang('viewdepartments.View All Departments')
@endsection

@section('heading')

    {!! Helper::translateAndShorten('Departments And Budgets','viewdepartments',50)!!}

@endsection

@section('content')
    <div id="app">
        <vtable url="department/items/filter" :columns="columns" :filters="filters"></vtable>
    </div>
@endsection

@section('jquery')

<script>
    new Vue({
        el: '#app',
        data: {
            columns: [

                {
                    "name": "name",
                    "title": "User",
                    "sortField": "name",
                    "visible": true
                }, {
                    "name": "budgetLimit",
                    "title": "Limit",
                    "sortField": "Limit",
                    "visible": true
                }, {
                    "name": "dispatchCount",
                    "title": "DispatchCount",
                    "sortField": "department",
                    "visible": true
                }, {
                    "name": "dispatchSum",
                    "title": "Dispatch Sum",
                    "sortField": "dispatchSum",
                    "visible": true
                }, {
                    "name": "departmentEmail",
                    "title": "Email",
                    "sortField": "departmentEmail",
                    "visible": true
                }, {
                    "name": "budgetStartDate",
                    "title": "Budget Start Date",
                    "sortField": "budgetStartDate",
                    "visible": true
                },{
                    "name": "budgetEndDate",
                    "title": "Budget End Date",
                    "sortField": "budgetEndDate",
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
