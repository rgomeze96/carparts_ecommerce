<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //attributes id, name, user, password, email, address, age, created_at, updated_at
    protected $fillable = ['name','user','password','email','address','age'];

    public static function validateForm(Request $request)
    {
        $request->validate([
            "name" => "required",
            "user" => "required",
            "password" => "required",
            "email" => "required|numeric|gt:0",
            "address"=> "required",
            "age"=> "required|numeric|gt:0"

        ]);
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
}