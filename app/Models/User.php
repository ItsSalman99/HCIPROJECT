<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_img',
        'first_name',
        'last_name',
        'email',
        'password',
        'cpassword',
        'address',
        'nearby_market',
        'province',
        'user_type',
        'city',
        'mobile_model',
        'phone',
        'policy',
        'whatsapp_phone',
        'holiday_start',
        'holiday_end',
        'holiday_mode',
        'cnic_name',
        'cnic_address',
        'location',
        'area',
        'cnic_number',
        'cnic_front_img',
        'cnic_back_img',
        'account_title',
        'account_number',
        'bank_name',
        'branch_code',
        'IBAN',
        'cheque_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
        'two_factor_recovery_codes',
        'email_verified_at',
        'two_factor_secret',
        // 'user_type',
        'two_factor_confirmed_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName(){
        return $this->first_name. ' '. $this->last_name;
    }

    public function details()
    {
        return $this->hasOne(EmployeeData::class, 'user_id', 'id');
    }
    // public function employeedata()
    // {
    //     return $this->hasOne(EmployeeData::class, 'user_id', 'id');
    // }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function product(){
        return $this->hasMany(Product::class, 'user_id');
    }

    public function compaignproduct()
    {
        return $this->hasMany(CompaignProduct::class);
    }

    public function wallet(){
        return $this->hasOne(Wallet::class);
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class, 'roamer_id', 'id');
    }

    public function vendors(){
        return $this->hasMany(Vendor::class, 'roamer_id', 'id');
    }



    // public function province()
    // {
    //     return $this->belongsTo(province::class, 'province_id', 'id');
    // }
}
