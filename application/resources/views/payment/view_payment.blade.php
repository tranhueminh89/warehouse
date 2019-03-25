@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | View Payment
@endsection
@section('heading')
    Payment Details
@endsection
@section('content')
    <div id="app">
        Invoice Number : <a href="{{action('InvoiceController@show',$payment->invoice->id)}}"
                            class="btn btn-flat bg-green ">View {{$payment->invoice->invoiceNo}}</a>
    </div>
@endsection

@section('jquery')
    <script>

    </script>
@endsection