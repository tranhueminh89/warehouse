<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests;
use CodedCell\Repository\Currency\CurrencyInterface;
use Illuminate\Http\Request;
use CodedCell\Traits\PaginateTrait;
use Response;

class CurrencyController extends Controller
{
    use PaginateTrait;
    protected $currency;

    public function __construct(CurrencyInterface $currency)
    {
        $this->currency = $currency;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('glance', Currency::class);
        $currencyRates = $this->currency->all();
        return view('currency.create_view_edit_currency')->with(compact('currencyRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Currency::class);
        $this->currency->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currencyRates = $this->currency->all();
        $currency = $this->currency->find($id);
        $this->authorize('view', $currency);

        return view('currency.create_view_edit_currency')->with(compact('currencyRates', 'currency'));
    }

    public function table(Request $request)
    {
        $paginate = boolval($request->paginate);
        $model = $this->currency->paginate(20, $request->filter, $request->scope, $paginate);

        return $this->paginate($model, $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $currencyRates = $this->currency->all();
        $currency = $this->currency->find($id);
        $this->authorize('view', $currency);

        return view('currency.create_view_edit_currency')->with(compact('currencyRates', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->currency->update($request->all(), $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->currency->delete($id);
        return Response::json(['ok' => 'ok']);
    }

    public function exchangeRateConversion(Request $request)
    {
        return $this->currency->getCurrentCurrency($request->date, $request->currency);
    }
}
