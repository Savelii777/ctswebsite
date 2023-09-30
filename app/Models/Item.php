<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['section', 'name', 'retail_price', 'dealer', 'availability', 'description'];

    public $sortable = ['section', 'name', 'retail_price', 'dealer'];
}
