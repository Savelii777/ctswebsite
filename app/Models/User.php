<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Kyslik\ColumnSortable\Sortable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Routing\UrlGenerator;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
        'city',
        'birth',
        'sex',
        'place_of_work',
        'img_url'
    ];

    protected $sortable = [
        'name',
        'login',
        'email',
        'password',
        'city',
        'birth',
        'sex',
        'place_of_work',
        'img_url'
    ];

    public function scopeWithFilters($query, $filters)
    {
        return $query->when($filters->name, function ($query) use ($filters) {
            $query->where('name', 'LIKE', '%' . $filters->name . '%');
        })->when($filters->city, function ($query) use ($filters) {
            $query->where('city', 'LIKE', '%' . $filters->city . '%');
        })->when($filters->place_of_work, function ($query) use ($filters) {
            $query->where('place_of_work', 'LIKE', '%' . $filters->place_of_work . '%');
        })->when($filters->completed, function ($query) use ($filters) {
            if ($filters->completed == 1) {
                $query->whereHas('courses', function($query) {
                    $query->where('completed', 16);
                });
    
            } 
            
            if ($filters->completed == 2) {
                $query->whereHas('courses', function($query) {
                    $query->where('completed', '!=', 16);
                })->orWhereDoesntHave('courses');
            }
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));
    }

    public function courses() {
        return $this->belongsToMany(Course::class)->withPivot('completed');
    }

    public function passed(Test $test) {
        //dd($this->id);
        $attempts = Attempt::where("user_id", $this->id)->where("test_id", $test->id)->get();

        if ($attempts->count() == 0) {
            return "Не приступил";
        }

        if ($attempts->where('is_passed', true)->count() > 0) {
            return "Сдал успешно";
        }

        if ($attempts->where('is_passed', true)->count() == 0) {
            return "Не сдал";
        }

        return "Не приступил";
    }
}
