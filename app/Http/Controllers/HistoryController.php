<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $prices = DB::table('prices')
            ->whereDate('prices.created_at','>',Carbon::today()->subDays(90)->toDateString())
            ->LeftJoin('products','products.id' , '=','prices.product_id' )
            ->select('prices.price','products.name','prices.created_at')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('history.history-prices', ['prices' => $prices]);
    }

    public function quantities()
    {

        $quantities = DB::table('quantities')
            ->whereDate('quantities.created_at','>',Carbon::today()->subDays(90)->toDateString())
            ->LeftJoin('products','products.id' , '=','quantities.product_id' )
            ->select('quantities.quantity','products.name','quantities.created_at')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('history.history-quantities', ['quantities' => $quantities]);
    }

    public function trashed()
    {
        $trashed = Product::onlyTrashed()->paginate(10);

        return view('history.history-trashed', ['details' => $trashed]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->route('history-trashed');
    }

}
