<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Store;
use App\Models\Session;
use App\Models\Category;
use App\Models\Stockstore;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

       $todaysSales = Store::forToday()->sum('profit');
       $todaysSellingprice = Store::forToday()->sum('total_price');
       $totalItemsSold = Store::forToday()->sum('quantity');

        $allSales = Store::sum('profit');
        $allSp = Store::sum('total_price');
        $totalItemsSoldAll = Store::sum('quantity');

        $totalItemsInStock = Item::count();
        $tCp = Item::sum('totcp');
        $tSp = Item::sum('totsp');
        $totalQuanInStock = Item::sum('quantity');
        $totalCatInStock = Category::count();
      
        return view('index', [
            'store' => Store::forToday()->filter(request(['search']))->get()],
             compact('todaysSales', 'totalItemsSold', 'todaysSellingprice', 'totalItemsInStock', 'totalCatInStock', 'tCp', 'tSp', 'allSales', 'allSp', 'totalItemsSoldAll'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
}

