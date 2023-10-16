<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Store;
use App\Models\Session;
use App\Models\Category;
use App\Models\Stockstore;
use App\Models\AuditLog;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class recordController extends Controller
{
    public function records(){
    $Total = Session::sum('total_price');
    return view('pages.records',[
        'item' => Item::orderBy('name', 'asc')->get(),
        'sess' => Session::all()
    ],
    compact('Total'));
}

 public function revenue(Request $request){
         if($request->has('start_date') && $request->has('end_date')){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $filteredItems = Store::whereBetween('created_at', [$startDate, $endDate])->get();

        $filProfit = Store::whereBetween('created_at', [$startDate, $endDate])->sum('profit');
        $filSp = Store::whereBetween('created_at', [$startDate, $endDate])->sum('total_price');
        $filquan = Store::whereBetween('created_at', [$startDate, $endDate])->sum('quantity');
      
         $totalSales = Store::sum('profit');
       $totalSellingprice = Store::sum('total_price');
        $totalCatInStock = Category::count();
      
        return view('pages.revenue', [
            'store' => Store::latest()->filter(request(['search']))->get()],
             compact('filteredItems', 'totalSales', 'totalSellingprice', 'filSp', 'filProfit', 'filquan'));

    }
     $filProfit = '0';
        $filSp = '0';
        $filquan = '0';
       $totalSales = Store::sum('profit');
       $totalSellingprice = Store::sum('total_price');
    return view('pages.revenue',[
        'rev' => Store::latest()->filter(request(['search']))->get()
    ],  compact('totalSales', 'totalSellingprice', 'filSp', 'filProfit', 'filquan'));

    }
    

        public function recordconfig(Request $request){
        $action = $request->input('action');
        if($action === 'store-session'){

            $item_name = $request->input('item');
            $item_quantity = $request->input('quantity');
            $item = Item::where('name', '=', $item_name)->get();
            foreach($item as $item){
        
            $item_costprice = $item['costprice'];
            $item_sellingprice = $item['sellingprice'];
            $itemQuantity = $item['quantity'];
            $itemsId = $item['id'];

            if($itemQuantity <= 0){
        return redirect()->back()->with('message', $item_name .' ' . 'is out of stock');
            }
            elseif($item_quantity > $itemQuantity){
                if($itemQuantity == 1){
                    return redirect()->back()->with('message', 'There is only' . ' ' . $itemQuantity .' ' . $item_name .' ' . 'left');
                }
                else{
                return redirect()->back()->with('message', 'There are only' . ' ' . $itemQuantity .' ' . $item_name .'(s) ' . 'left');
                }
            }
            else{
    
            $sess = new Session;
            $sess->name = $item_name;
            $sess->items_id = $itemsId;
            $sess->costprice = $item_costprice;
            $sess->sellingprice = $item_sellingprice;
            $sess->quantity = $item_quantity;
            $sess->total_price = $item_sellingprice * $item_quantity;
            $sessscp = $item_sellingprice - $item_costprice;
            $sess->profit = $sessscp * $item_quantity;
            $sess->save();
            }
        }
        return redirect()->back();
    }
            elseif ($action === 'store-database'){
        $item = Session::all();
        foreach($item as $item){
    
        $item_costprice = $item['costprice'];
        $item_sellingprice = $item['sellingprice'];
        $itemsId = $item['id'];
        $cart = new Store;
        $cart->name = $item->name;
        $cart->items_id = $item->items_id;
        $cart->costprice = $item->costprice;
        $cart->sellingprice = $item->sellingprice;
        $cart->quantity = $item->quantity;
        $cart->total_price = $item->total_price;
        $Cp = $item->costprice * $item->quantity;
        $scp = $item->total_price - $Cp;
        $cart->profit = $scp; 
        $cart->save();
        Session::truncate();


        $itemsupdate = Item::find($item['items_id']);
       
        $itemsupdate->quantity -= $item['quantity'];
        $subcp = $item['costprice'] * $item['quantity'];
        $subsp = $item['sellingprice'] * $item['quantity'];
         $itemsupdate->totcp -= $subcp;
          $itemsupdate->totsp -= $subsp;
        $itemsupdate->save();

        }
    }
      
     return redirect()->back()->with('message', 'Item(s) recorded!');

    }

    public function destroy(Session $id)
    {
        // dd($id);
        $id->delete();
        return redirect()->back();
    }

      public function recordedit(Request $request, Session $id){
          $dataEdit = $request->validate([
            'total_price' => 'required'
         ]);
         $id->update($dataEdit);
         return redirect('/records')->with('editmessage', 'Selling price changed!');
       }
}
