
<div id="app">

    <vtable url="supplier/items/filter" :columns="columns" :filters="filters"></vtable>

</div>

@section('jquery')
    <script>
        new Vue({
            el: '#app',
            data: {
                columns: [
                    {
                        "name": 'supplierName',
                        "title": 'Supplier Name',
                        "visible": true
                    }, {
                        "name": 'restockCount',
                        "title": 'Restocks Count',
                        "visible": true
                    }, {
                        "name": 'email',
                        "title": 'Email',
                        "visible": true
                    }, {
                        "name": 'phone',
                        "title": 'Phone',
                        "visible": true
                    }, {
                        "name": 'itemCost',
                        "title": 'Total Amount ',
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

