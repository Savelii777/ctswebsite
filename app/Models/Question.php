<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'settings',
        'data',
        'correct'
    ];


    public function test(){
        return $this->hasOne(Test::class,"id","test_id");
    }


}
