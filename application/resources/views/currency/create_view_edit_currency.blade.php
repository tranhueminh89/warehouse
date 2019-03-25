@extends('layouts.master')

@section('title', 'Create View Edit Currency')

@section('content')
    <style>
        .form {
            margin: 0 auto;
        }
    </style>
    <div class="form text-center">
        @if(isset($currency))
            {!! Form::model($currency, ['action' => ['CurrencyController@update', $currency->id], 'method' =>
            'patch','class'=>'form-inline'])
            !!}
        @else
            {!! Form::open(array('action' => 'CurrencyController@store', 'files'=>false,'class'=>'form-inline')) !!}
        @endif

        <div class="form-group{!! $errors->has('currency') ? ' has-error' : '' !!}">
            {!! Form::label('currency', 'From',array('class'=>'')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                {!! Form::select('currency',$currencies, null, ['class' => 'form-control currency']) !!}
            </div>
            {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
        </div>

            <div class="form-group{!! $errors->has('baseCurrency') ? ' has-error' : '' !!}">
                    {!! Form::label('baseCurrency', 'To') !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        {!! Form::text('baseCurrency', $companySettings->defaultCurrency, ['class' => 'form-control','placeholder'=>'Base Currency']) !!}
                         <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    </div>
                    {!! $errors->first('baseCurrency', '<p class="help-block">:message</p>') !!}
                </div>

        <div class="form-group{!! $errors->has('amount') ? ' has-error' : '' !!}">
            {!! Form::label('amount', 'Amount',array('class'=>'sr-only')) !!}
            <div class="input-group">
                <span class="input-group-addon">%</span>
                {!! Form::text('amount', null, ['class' => 'form-control','placeholder'=>'Exchange Rate']) !!}
            </div>
            {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{!! $errors->has('startDate') ? ' has-error' : '' !!}">
            {!! Form::label('startDate', 'Start Date',array('class'=>'sr-only')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                {!! Form::text('startDate', null, ['class' => 'form-control date','placeholder'=>'Start Date']) !!}
            </div>
            {!! $errors->first('startDate', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{!! $errors->has('endDate') ? ' has-error' : '' !!}">
            {!! Form::label('endDate', 'End Date',array('class'=>'sr-only')) !!}
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                {!! Form::text('endDate', null, ['class' => 'form-control date','placeholder'=>'End Date']) !!}
            </div>
            {!! $errors->first('endDate', '<p class="help-block">:message</p>') !!}
        </div>
        <button type="submit" class="btn btn-flat bg-green">Save</button>

        {!! Form::close() !!}
    </div>
    <hr/>
    <b>Your currency is : {{$companySettings->defaultCurrency or 'Not Set'}}</b>

    <div id="app">
        <vtable url="{{ url('currency/items/filter') }}" :columns="columns"></vtable>
    </div>

@endsection

@section('jquery')
    <script>
//        $(document).ready(function () {
//            var table = $('table').DataTable({});
//        });
        $('.date').datepicker({
            format: "yyyy/mm/dd"
        });
        $('.currency').select2({});

        new Vue({
            el: '#app',
            data: {
                columns: [

                    {
                        "name": "id",
                        "title": "#",
                        "sortField": "id",
                        "visible": true
                    },
                    {
                        "name": "currency",
                        "title": "Currency",
                        "sortField": "currency",
                        "visible": true
                    },
                    {
                        "name": "baseCurrency",
                        "title": "Base Currency",
                        "sortField": "baseCurrency",
                        "visible": true
                    },
                    {
                        "name": "amount",
                        "title": "Amount",
                        "sortField": "amout",
                        "visible": true
                    },
                    {
                        "name": "startDate",
                        "title": "Start Date",
                        "sortField": "startDate",
                        "visible": true
                    },
                    {
                        "name": "endDate",
                        "title": "End Date",
                        "sortField": "endDate",
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