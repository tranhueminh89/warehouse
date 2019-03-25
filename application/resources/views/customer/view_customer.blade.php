@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!} | @lang('viewcustomer.View Customer')
@endsection

@section('heading')
    @lang('viewcustomer.View Customer')
@endsection


@section('content')
    <style>
        .row-flex, .row-flex > div[class*='col-'] {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex: 1 1 auto;
        }

        .row-flex-wrap {
            -webkit-flex-flow: row wrap;
            align-content: flex-start;
            flex: 0;
        }

        .row-flex > div[class*='col-'], .container-flex > div[class*='col-'] {
            margin: -.2px; /* hack adjust for wrapping */
        }

        .container-flex > div[class*='col-'] div, .row-flex > div[class*='col-'] div {
            width: 100%;
        }
    </style>
    <div class="row row-flex row-flex-wrap">
        <div class="col-md-6 row-eq-height">
            <div class="panel panel-default cls-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('viewcustomer.Invoices') ({{count($customer->invoices)}})
                    </h3>
                </div>

                <div class="panel-body">
                    <table class="table table-paper table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('viewcustomer.Invoice Number')</th>
                            <th>@lang('viewcustomer.Invoice Amount')</th>
                            <th>@lang('viewcustomer.View Invoice')</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; ?>
                        @foreach ($customer->invoices as $invoice)
                            <tr class="">
                                <th scope="row">{{$i}}</th>
                                <td>{{ucwords($invoice->invoiceNo)}}</td>
                                <td>{{number_format($invoice->items->sum('total') + $invoice->items->sum('tax') ,2)}}</td>
                                <td>
                                    <div aria-label="Actions" role="group" class="btn-group">
                                        <a class="btn btn-flat bg-yellow"
                                           href="{{action('InvoiceController@show', $invoice->id)}}">
                                            <i
                                                    class="   fa fa-eye"></i></a>

                                    </div>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 row-eq-height">
            <div class="panel panel-default cls-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('viewcustomer.Quotes') ({{count($customer->quotes)}})
                    </h3>
                </div>

                <div class="panel-body">
                    <table class="table table-paper table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('viewcustomer.Order Number')</th>
                            <th>@lang('viewcustomer.Invoice Amount')</th>
                            <th>@lang('viewcustomer.View Invoice')</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; ?>
                        @foreach ($customer->quotes as $quote)
                            <tr class="">
                                <th scope="row">{{$i}}</th>
                                <td>{{ucwords($quote->orderNo)}}</td>
                                <td>{{number_format($quote->items->sum('total'),2)}}</td>
                                <td>
                                    <div aria-label="Actions" role="group" class="btn-group">
                                        <a class="btn btn-flat bg-yellow"
                                           href="{{action('InvoiceController@show', $quote->id)}}">
                                            <i
                                                    class="   fa fa-eye"></i></a>

                                    </div>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div class="panel panel-default cls-panel">
        <div class="panel-heading">
            <h3 class="panel-title">
                Customer Returns
            </h3>
        </div>

        <div class="panel-body">
            <table class="table table-paper table-condensed table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Description</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>SalesOrder</th>

                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach ($customer->returns as $return)
                    <tr class="">
                        <th scope="row">{{$i}}</th>
                        <td>{{ucwords($return->productDescription)}}</td>
                        <td>{{$return->quantity}}</td>
                        <td>{{$return->total}} </td>
                        <td>{{$return->order->orderNo}} </td>
                        <?php $i++; ?>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <div class="row row-flex row-flex-wrap">
        <div class="col-md-6 row-eq-height">
            <div class="panel panel-default cls-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('viewpayments.View Payments') ({{count($customer->invoices)}})
                    </h3>
                </div>

                <div class="panel-body">
                    <table class="table table-paper table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('viewpayments.Invoice Number')</th>
                            <th>@lang('viewpayments.Payment Method')</th>
                            <th>@lang('viewpayments.Payment Amount')</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; ?>
                        @foreach ($customer->payments as $payment)
                            <tr class="">
                                <th scope="row">{{$i}}</th>
                                <td>{{ucwords($payment->invoice->invoiceNo)}}
                                    @if($payment->invoice->deleted_at == null)
                                        (<a href="{{action('InvoiceController@show', $payment->invoice->id)}}">View Invoice</a>)
                                    @else
                (-Deleted Invoice -)
                                    @endif
                                </td>
                                <td>{{$payment->paymentMethod}}</td>
                                <td>{{number_format($payment->paymentAmount,2)}}</td>
                                <?php $i++; ?>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('jquery')
    <script>
        $(document).ready(function () {
            $(document).ready(function () {
                var table = $('table').DataTable({
                    responsive: true,

                });
            });
        });
    </script>
@endsection