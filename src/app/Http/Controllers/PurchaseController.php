<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function create(Item $item)
    {

        $user = Auth::user();

        return view('purchase', [
            'item' => $item,
            'address' => $user->profile->address,
            'postal_code' => $user->profile->postal_code
        ]);
    }

    public function store(Request $request, Item $item)
    {

        Purchase::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'payment_method' => $request->payment_method
        ]);

        return redirect('/')->with('message', '購入しました');
    }
}
