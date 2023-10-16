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

class categoryController extends Controller
{
     public function createCategory(){
        return view('pages.createcat');
    }

     public function category(){
        return view('pages.category', [
            'category' => Category::orderBy('name', 'asc')->filter(request(['search']))->get()
        ]);
    }

     public function cateDelete(Category $id){
          $id->delete();
        return redirect()->back()->with('deletemessage', 'Category has been deleted!');
    }


    public function catedit(Category $id){
        return view('pages.catedit', [
            'catedit' => $id
        ]);
      }

        public function catupdate(Request $request, Category $id){
        $dataCat = $request->validate([
           'name' => 'required'
        ]);
        $id->update($dataCat);
        return redirect('/category')->with('message', 'Category(s) updated!');
        
       }

       public function createcatConfig(Request $request){
   $formDataCat = $request->validate([
    'name' => 'required'
   ]);

   $cate = Category::create($formDataCat);
   if($cate){
    // return redirect('/dashboard')->with('message', 'user created and logged in');
    return redirect('/category')->with('message', 'New Category created!');
   }
    }
}
