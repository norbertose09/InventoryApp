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

class itemController extends Controller
{
    
    public function createItem(){
        return view('pages.createitem', [
            'category' => Category::orderBy('name', 'asc')->get()
        ]);
    }


     public function createitemconfig(Request $request){
     $itemFormData = $request->validate([
      'name' => 'required',
      'category' => 'required',
      'costprice' => 'required',
      'sellingprice' => 'required',
      'quantity' => 'required'
     ]);
            // dd($request->input('name'));
     $itemFormData['totcp'] = $request->input('costprice') * $request->input('quantity');
     $itemFormData['totsp'] = $request->input('sellingprice') * $request->input('quantity');
     $quan = $request->input('quantity');

     $saveItem = Item::create($itemFormData);
      
     if($saveItem){
        return redirect('/stocks');
     }
    }


 public function itemsupdate(Request $request, Item $id){
     $data = $request->validate([
        'name' => 'required',
        'category' => 'required',
        'costprice' => 'required',
        'sellingprice' => 'required',
     ]);
     $id->update($data);
     return redirect('/stocks')->with('message', 'Item(s) updated!');
     
    }
}
