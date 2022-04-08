<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'github_id',
        'name',
        'email',
        'contact_email',
        'phone',
        'company_name',
        'company_address',
        'company_siret',
        'company_ape',
        'bank_incumbent',
        'bank_domiciliation',
        'bank_rib',
        'bank_iban',
        'bank_bic'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
       //
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
