<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.product.wishlist', compact('wishlist'));
    }
    public function addtolist(Request $request)
    {
        $prod_id = $request->input('product_id');
        if(Auth::check())
        {
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product add to wishlist"]);
            }else{
                return response()->json(['status' => "Product doesnot exist"]);
            }
        }
        else{
             return response()->json(['status' => "Loginto Contoniue"]);
        }
    }
    public function delete(Request $request)
    {
        if(Auth::check())
        { 
        $prod_id = $request->input('prod_id');
                // prod_id->cart->ajax data
        if(Wishlist::where('prod_id',$prod_id)->where('user_id', Auth::id())->exists())
        {
            $wish = Wishlist::where('prod_id',$prod_id)->where('user_id', Auth::id())->first();
            $wish->delete();
            return response()->json(['status' => "Wishlist delete"]);
        }
      }
       else
        {
              return response()->json(['status' => "Loginto Contoniue"]);
        }
    }
}
