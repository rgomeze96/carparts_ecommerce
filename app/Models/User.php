<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //attributes id, name, email, password, user, address, age, city, country, telephone, balance, created_at, updated_at
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
    ];
    public static function validateUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "password" => "required",
            "email" => "required",
            "address" => "required",
            "age" => "required|numeric",
            'city' => "required",
            'country' => "required",
            'telephone' => "required",
            'balance' => "required",

        ]);
        User::create($request->only(["name","password","email","address","age","city","country","telephone","balance"]));
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

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
