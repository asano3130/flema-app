<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        // 出品した商品
        $sellProducts = Item::where('user_id', $user->id)->get();

        // 購入した商品
        $buyProducts = Item::where('buyer_id', $user->id)->get();

        return view('profile.index', compact(
            'user',
            'sellProducts',
            'buyProducts'
        ));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('profiles', 'public');

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->building = $request->building;

        $user->save();

        return redirect('/');
    }
}
