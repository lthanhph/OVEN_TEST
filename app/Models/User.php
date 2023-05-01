<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static function registerRules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'max:255', Password::min(6)],
            're-password' => 'required|same:password'
        ];
    }

    public function todos()
    {
        return $this->hasMany(Todo::class, 'user_id', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $url = url("reset-password/$token") . '?' . http_build_query(['email' => $this->email]);
        $this->notify(new ResetPasswordNotification($url));
    }

    public static function getApiToken()
    {
        $try = 1;
        $max = 5;
        $apiToken = null;
        while ($try <= $max) {
            $apiToken = Str::random(50);
            $user = User::where('api_token', $apiToken)->first();
            if (!empty($user)) {
                $try++;
            } else {
                break;
            }
        }

        return $apiToken;
    }
}
