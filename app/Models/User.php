<?php

namespace App\Models;

use App\Models\City;
use App\Models\Media;
use App\Models\Country;
use App\Models\District;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table ='users';


      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function findCountry(){
        $address =  $this->address;
        $district = District::find($address->district_id);
        $city = City::find($district->city_id);
        return  Country::find($city->country_id);
    }

    public function findCity(){
        $address =  $this->address;
        $district = District::find($address->district_id);
        $city = City::find($district->city_id);
        return  $city;
    }

    public function findDistrict(){
        $address =  $this->district;
        $district = District::find($address->district_id);
        return $district;
    }

    public function scopeisActive($query,$id){
        return ($query->find($id)->where('is_active',true)->first()) ? true:false;
    }

    public function scopeisVisible($query,$id){
        return ($query->find($id)->where('is_visible',true)->first()) ? true:false;
    }

    public function scopeisPermissionsActives($query){
        return Auth::user()->getAllPermissions()->pluck('id')->toArray();
    }

   

    /*return the image of a user*/
    public function image(){
        /*1er param is the model use
        2e param est le name of the polymorpic function*/
        return $this->morphOne(Media::class,'mediable');
    }

    public function addresses(){
        return $this->morphMany(Address::class,'addressable');
    }

    public function telephones(){
       return $this->morphMany(Phone::class,'phonable');
    }

    public function scopePrincipalAddress($query){
        return $this->address()->where('is_principal',true)->first();
    }

    public function scopePrincipalPhone($query){
        return $this->phones()->where('is_principal',true)->first();
    }

}
