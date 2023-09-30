<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Store extends Model
{
    use Sortable;

    protected $fillable = ['section', 'name', 'retail_price', 'dealer', 'availability', 'description'];

    public $sortable = ['section', 'name', 'retail_price', 'dealer'];
}
