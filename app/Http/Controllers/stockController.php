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

class stockController extends Controller
{
     public function stocks(){
        return view('pages.stocks', [
            'item' => Item::orderBy('name', 'asc')->filter(request(['search']))->get()
        ]);
    }


  public function stockupdate(Request $request){
        $itemsid = $request->input('item_ids');
        $quantities = $request->input('quantities');

        foreach ($itemsid as $key => $itemsid){
            $itemz = Item::find($itemsid);
             $itemz->quantity = $quantities[$key];
            $itemz->save();
        }
        return redirect()->back();
    }


 public function stockDelete(Item $id){
        $id->delete();
      return redirect()->back()->with('deleteitemmessage', 'Item has been deleted!');
  }
  

   public function restock(){
        return view('pages.restock', [
            'itemrestock' => Item::orderBy('name', 'asc')->filter(request(['search']))->get()
        ]);
    }


    public function outofstock(){
    return view('pages.outofstock',[
        'os' => Item::where('quantity', '=', 0)->get()
    ]);
  }

    public function stockedit(Item $id){
    return view('pages.itemedit', [
        'itemedit' => $id
    ]);
  }

     public function history(){
         return view('pages.auditlog', [
            'history' => AuditLog::forToday()->filter(request(['search']))->get()]);
       }
}
