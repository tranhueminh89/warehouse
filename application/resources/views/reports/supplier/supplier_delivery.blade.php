<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<body>
<table class="table no-margin">

    <tr>
        <td>
            <b>Report Type</b>
        </td>
        <td colspan="5" >
            Delivery Times for Lpo's
        </td>

    </tr>
    <tr>
        <td>
            <b>Supplier</b>
        </td>
        <td colspan="5" >
            {{$supplier->supplierName}}
        </td>
    </tr>
</table>
<table class="table no-margin">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Restock Date</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($supplier->restocks as $restock)
        <tr class="">
            <td>{{$supplier->present()->getSupplierProduct}}</td>
            <td>{{ucwords($restock->created_at)}}</td>
            <td>{{ucwords($restock->amount)}}</td>
            <td>{{ucwords($restock->unitCost)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

