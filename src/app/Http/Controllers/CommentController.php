<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $item_id)
    {

        Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $item_id,
            'comment' => $request->comment
        ]);

        return back();
    }
}
