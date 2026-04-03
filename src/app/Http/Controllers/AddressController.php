<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function edit($item_id)
    {
        $item = Item::findOrFail($item_id);
        $address = Auth::user()->profile->address;

        return view('address.edit', compact('item', 'address'));
    }

    public function update(Request $request, $item_id)
    {
        $request->validate([
            'postal_code' => 'required',
            'address' => 'required',
            'building' => 'nullable'
        ]);

        Address::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'item_id' => $item_id
            ],
            [
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building' => $request->building
            ]
        );

        return redirect('/purchase/' . $item_id);
    }
}
