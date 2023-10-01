<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;

    protected $fillable = ['id','order_info', 'user_info', 'created_at'];
    public $sortable = ['id','created_at'];

}
