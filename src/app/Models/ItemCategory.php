<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

}

Schema::create('category_item', function (Blueprint $table) {

    $table->id();

    $table->foreignId('item_id')->constrained()->cascadeOnDelete();

    $table->foreignId('category_id')->constrained()->cascadeOnDelete();
});