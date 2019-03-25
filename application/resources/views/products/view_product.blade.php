@extends('layouts.master')

@section('title')
    {!!env('COMPANY_NAME')!!}| @lang('viewproduct.View Product') {{$product->productName}}
@endsection


<style>
    .box-header > .box-tools {
        top: -2px !important;
    }
</style>
@section('heading')
    View Product
@endsection
@section('content')
    <div id="app">
        <div class="panel panel-default cls-panel">
            <div class="panel-body">
                <canvas id="mix4" count="1"></canvas>
            </div>
        </div>


        <chartjs-bar target="mix4" :datalabel="'Data value'" :data="[{{$product->restocks->sum('amount')}},{{$product->dispatches->sum('amount')}},{{$product->invoiceitems->sum('quantity')}},{{$product->purchaseorderitems->sum('amount')}}]"    :backgroundcolor="['rgba(75,0,192,0.6)','rgba(0,88,88,0.6)','rgba(75,192,0,0.6)','rgba(75,192,192,0.6)']" :labels="['Restocks','Dispatches','Invoiced','Re-ordered']"  ></chartjs-bar>

    </div>
@endsection


@section('jquery')
    <script>
        app = new Vue({
            el: '#app',
            data: {}
        });
    </script>
@endsection