<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function toggle($item_id)
    {

        $like = Like::where('user_id', Auth::id())
            ->where('product_id', $item_id)
            ->first();

        if ($like) {

            $like->delete();
        } else {

            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $item_id
            ]);
        }

        return back();
    }
}
