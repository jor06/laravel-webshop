<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductHasCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories= ProductCategory::all();
        return view('admin/categories/categoryindex',
            ['categories' => $categories,
            ]);
    }

    public function createCategory()
    {
        return view('admin/category/createcategory');
    }

    public function storeCategory(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required', 
        ]);

        $newCategory = $request->all();

        productcategory::create($newCategory);

        return redirect()->route('admin');

    }


    public function editCategory($id){
        $categories = ProductCategory::find($id);
        return view('admin.category.edit');
        
    }

    public function updateCategory(Request $request ,$id){
        $update = ProductCategory::find($id)->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

         return Redirect()->route('all.category')->with('success', 'Category Updated Successfull');

   }

    public function SoftDelete($id){
        $delete = ProductCategory::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Deleted Successfully');
    }

    public function Restore($id){
        $delete = ProductCategory::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored Successfully');
    }

    public function Pdelete($id){
        $delete = ProductCategory::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
    }

}

