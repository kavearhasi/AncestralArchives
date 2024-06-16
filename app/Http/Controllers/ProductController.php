<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function editItemShow($id)
    {
        $shopId = $id;
        $shopItems = Shop::find($id)->product;
        return view('pages.user-pages.shops.edit-item', compact('shopId', 'shopItems'));
    }
    public function addItem( Request $request)
    {
        
         
        $formData = $request->all();
        if (!empty ($formData['product_image'])) {
            $fileName = time() . '-' . $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('product_images', $fileName, 'public');
            $formData['product_image'] = '/storage/' . $path;
        }
        $product = Product::create($formData);
       
        return redirect()->route('pages.user.my-shops')->with('shopAdded', ' Created Successfully');
    }
    public function destroyItem( $shopId,$id)
    {
        $product = Product::find($id);
        $product->delete();
        $product->save();
        return redirect()->route('pages.user.edit-items', ['id' => $shopId])->with('itemsDeleted', 'Item deleted Successfully ');
    }
   

   
}
