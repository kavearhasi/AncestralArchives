<?php
namespace App\Http\Controllers;

use App\Http\Requests\AddShopValidationRequest;
use App\Models\Shop;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use illuminate\Routing\Controllers\HasMiddleware;
use illuminate\Routing\Controllers\Middleware;
use Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::all();
    }
    public function showMyShops()
    {
        $userId = Auth::user()->id;
        $shops = Shop::where('user_id', '=', $userId)->get();
        return view("pages.user-pages.shops.my-shops", compact("shops"));
    }
    public function addshop()
    {
        $type = "shop";
        return view('pages.user-pages.shops.add-shops', compact('type'));
    }
    public function storeShop(AddShopValidationRequest $request)
    {
        $formData = $request->all();
        $formData['shop_approved_status'] = 0;
        if (!empty($formData['shop_image'])) {
            $fileName = time() . '-' . $request->file('shop_image')->getClientOriginalName();
            $path = $request->file('shop_image')->storeAs('shop-images', $fileName, 'public');
            $formData['shop_image'] = '/storage/' . $path;
        }
        $shop = Shop::create($formData);
        return redirect()->route('pages.user.my-shops')->with('shopAdded', ' Created Successfully');
    }
    public function editShop($id)
    {
        $shop = Shop::find($id);
        return view('pages.user-pages.shops.edit-shop', compact('shop'));
    }
    public function updateShop(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'owner_name' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'shop_image' => 'nullable|image',
            'license_number' => 'nullable|numeric',
        ]);
        $updateFormData = $request->all();
        $shop = Shop::find($id);
        if (!empty($updateFormData['shop_image'])) {
            $fileName = time() . '-' . $request->file('shop_image')->getClientOriginalName();
            $path = $request->file('shop_image')->storeAs('shop-images', $fileName, 'public');
            $updateFormData['shop_image'] = '/storage/' . $path;
            if ($shop->shop_image != null) {
                $oldFilename = $shop->shop_image;
                Storage::delete($oldFilename);
            }
        }
        $shop->update($updateFormData);
        return redirect()->route('pages.user.my-shops')->with('shopEdited', ' Details were updated successfully');
    }
    public function destroyShop($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return redirect()->route('pages.user.my-shops')->with('shopDeleted', ' Deleted successfully');
    }
    // public function AddTraining()
    // {
    //     $type = "training_center";
    //     return view('pages.user-pages.shops.add-shops', compact('type'));
    // }
    public function allShops()
    {
        $allShops = Shop::all();
        $allProducts = Product::all();
        $shopDisapproved= [];
        foreach($allShops as $item){
            if(!$item->shop_approved_status ){
                $shopDisapproved[] = $item->id; 
            }

        }
        
        return view('pages.shops', compact('allShops', 'allProducts','shopDisapproved'));
    }
    public function shopSingle($id)
    {
        $shopId = $id;
        $shop = Shop::find($id);
        $shopItems = Shop::find($id)->product;
        $userId = $shop->user_id;
        $user = User::find($userId);
        return view('pages.shop-single', compact('shop', 'shopItems', 'user'));
    }
    public function Shopsearch(Request $request)
    {
        $filter = $request->filter;
        $search = $request->search;
        $allProducts  = null;
        $allShops = null;
        if ($search != null && $filter == 'product') {
            $products = Product::where(function ($query) use ($search) {
                $query->where('product_name', 'like', "%$search%")
                    ->orWhere('product_description', 'like', "%$search%");
            })->get();
           
            $allProducts = $products ; 

           
        } elseif ($search != null && $filter == 'shop') {
            $shops = Shop::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })->get();
           $allShops  = $shops;
        }
        elseif($search != null && $filter == 'location'){
            $shops = Shop::where(function ($query) use ($search) {
                $query->where('address', 'like', "%$search%");
            })->get();
           $allShops  = $shops;
        }
        else {
            $product = Product::where(function ($query) use ($search) {
                $query->where('product_name', 'like', "%$search%")
                    ->orWhere('product_description', 'like', "%$search%");
            })->get();
            $shop = Shop::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })->get();
            $allShops = $shop;
            $allProducts = $product;
            
            
        }
        $shopDisapproved= [];
        foreach($allShops as $item){
            if(!$item->shop_approved_status ){
                $shopDisapproved[] = $item->id; 
            }

        }

        
       return view('pages.shops', compact('allShops', 'allProducts','shopDisapproved'));
    }
}
