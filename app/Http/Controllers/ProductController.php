<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductHasCategory;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin/products/productindex',
            [   'products' => DB::table('products')->simplePaginate(15),
            ]);
    }


    public function createProduct()
    {
        return view('admin/products/createproduct');
    }


    public function storeProduct(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'descripition' => 'required', 
            'info' => 'required',
            'vat' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'quantity' => 'required',
            'category' => 'required',
        ]);

        $newProduct = $request->all();

        product::create($newProduct);

        return redirect()->route('admin');
    }
    
    public function showProduct($id){
        $product = Product::find($id);
        return view('admin/products/product',
            [   'product' => $product,
            ]);
    }


    public function editProduct($id){
        
        $product = product::find($id);
        $productcategory = ProductCategory::find($id);
        return view('admin/products/editproduct', 
            [   'product' => $product, 
                'productcategory' => $productcategory,
            ]);
    }


    public function updateProduct(Request $request ,$id){
        $product = Product::find($id);
        $product->update($request->all());
        
        return redirect()->route('admin');
   }

    public function destroy($id)
    {
    
    }
}
