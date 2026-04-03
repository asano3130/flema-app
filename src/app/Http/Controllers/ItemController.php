<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    public function index(Request $request)
    {

        $query = Item::query();

        if (Auth::check()) {
            $query->where('user_id', '!=', Auth::id());
        }

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->tab == 'mylist') {

            if (Auth::check()) {

                $query->whereHas('likes', function ($q) {

                    $q->where('user_id', Auth::id());
                });
            } else {

                $query->whereRaw('0=1');
            }
        }

        $products = $query->get();

        $items = Item::all();

        return view('product.index', compact('products'));
    }

    public function show($item_id)
    {
        $product = Item::with([
            'likes',
            'comments.user',
            'categories'
        ])->findOrFail($item_id);

        return view('item.show', compact('product'));
    }

    public function create()
    {

        $categories = Category::all();

        return view('exhibition', compact('categories'));
    }


    public function store(Request $request)
    {

        $path = $request->file('image')->store('items', 'public');

        $item = Item::create([

            'user_id' => Auth::id(),
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'image' => $path,

        ]);

        $item->categories()->attach($request->categories);

        return redirect('/');
    }
}
