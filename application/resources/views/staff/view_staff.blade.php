@extends('layouts.master')

@section('title')
    @lang('viewstaff.Staff')
@endsection

@section('heading')
    @lang('viewstaff.Staff')
@endsection

@section('content')
    <div id="app">
        <vtable url="staff/items/filter" :columns="columns" :filters="filters"></vtable>
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
                        "name": "email",
                        "title": "Email",
                        "sortField": "Email",
                        "visible": true
                    }, {
                        "name": "department.name",
                        "title": "Department",
                        "sortField": "department",
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