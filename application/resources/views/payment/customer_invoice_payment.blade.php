@extends('layouts.frontend.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | Pay Invoice {{$invoiceNumber}}
@endsection

@section('sidebar')

@endsection

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12 gutter">
        <div class="sales">
            <h1 class="text-center">Pay Invoice</h1>
            <hr/>
            You will be paying for the below invoice : <br/><br/>
            <table class="table table-paper table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <td>Invoice Number</td>
                    <td>Invoice Amount</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{$invoiceNumber}}</td>
                    <td>{{number_format($amount)}}</td>
                </tr>
                </tbody>
            </table>
            @if($invoice->paid == 1)
                <p class="alert alert-success">Invoice is already settled nothing to do</p>
            @else
                <form>
                    <div id="dropin-container"></div>
                    <button type="submit" class="btn btn-flat bg-green btn-block">Pay Now</button>
                </form>
            @endif
        </div>
    </div>
@endsection

@section('jquery')
    <script>
        braintree.setup('{{$token}}', 'dropin', {
            container: 'dropin-container'
        });
    </script>

@endsection