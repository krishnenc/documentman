<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use App\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Get the user that owns the phone.
     */
    public function company()
    {
        $companies = '';
        $myCompanies = explode(',', $this->companies);
        foreach ($myCompanies as $key => $value) {
            $companies = $companies.' , '.Companies::findOrFail($value)->name;
        }       
        return $companies;
    }

     /**
     * Get the user that owns the phone.
     */
    public function role()
    {
        return $this->hasOne('App\Roles','id' , 'role_id');
    }

}
