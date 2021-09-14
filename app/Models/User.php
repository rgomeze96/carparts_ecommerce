<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class User extends Model
{
    use HasFactory;

    //attributes id, name, user, password, email, address, age, city, country, telephone. balance, created_at, updated_at
    protected $fillable = ['name','user','password','email','address','age','city','country','telephone','balance'];

    public static function validateUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "user" => "required",
            "password" => "required",
            "email" => "required",
            "address" => "required",
            "age" => "required|numeric",
            'city' => "required",
            'country' => "required",
            'telephone' => "required",
            'balance' => "required",

        ]);
        User::create($request->only(["name","user","password","email","address","age","city","country","telephone","balance"]));
    }

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

    public function getUser()
    {
        return $this->attributes['user'];
    }

    public function setUser($user)
    {
        $this->attributes['user'] = $user;
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
        $this->attributes['age'] = $country;
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

    public function setBlance($balance)
    {
        $this->attributes['balance'] = $balance;
    }
}