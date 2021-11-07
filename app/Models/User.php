<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //attributes id, name, email, password, user, address, age, city, country, telephone, balance, role, created_at, updated_at
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'age',
        'city',
        'country',
        'telephone',
        'balance',
        'role'
    ];
    public static function validateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'password' => 'required|min:4|confirmed',
            'email' => 'required',
        ]);
    }

    public static function validateUpdateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'min:5|nullable',
            'email' => 'required',
            'city' => 'min:2|nullable',
            'country' => 'min:2|nullable',
            'telephone' => 'min:7|nullable'
        ]);
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
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    
    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }
    
    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getAge()
    {
        return $this->attributes['age'];
    }

    public function setAge($age)
    {
        $this->attributes['age'] = $age;
    }

    public function getCity()
    {
        return $this->attributes['city'];
    }

    public function setCity($city)
    {
        $this->attributes['city'] = $city;
    }

    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }

    public function getTelephone()
    {
        return $this->attributes['telephone'];
    }

    public function setTelephone($telephone)
    {
        $this->attributes['telephone'] = $telephone;
    }

    public function getBalance()
    {
        return $this->attributes['balance'];
    }

    public function setBalance($balance)
    {
        $this->attributes['balance'] = $balance;
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
