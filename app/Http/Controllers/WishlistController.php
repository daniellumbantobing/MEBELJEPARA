<?php

namespace App\Http\Controllers;

use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function insert(Request $request)
    {
        $status = Wishlist::where('user_id', Auth::user()->id)
            ->where('produk_id', $request->Code)
            ->first();


        if (isset($request->Code) and isset($status->user_id)) {
        } else {
            $p = new Wishlist;
            $p->produk_id = $request->Code;
            $p->user_id = $request->Chief;
            $p->save();
            return response()->json(
                [
                    'success' => true,

                ]
            );
        }
    }

    public function delete($id)
    {
        Wishlist::findOrfail($id)->delete();

        return redirect()->back()->with('sukses', 'Produk Dihapus Wishlist');
    }
    public function wishlist()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->latest()->paginate(9);

        $wishlist = Wishlist::where("user_id", "=", $user->id)->first();
        $profil = User::where('id', Auth::user()->id)->first();

        return view('user.wishlist', compact(['profil', 'wishlists', 'wishlist']));
    }
}