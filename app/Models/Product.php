<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, description, price, category, brand, warranty, created_at, updated_at
    protected $fillable = ['id','name','description','price','category','brand','warranty'];

    public static function validateProduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "brand" => "required",
            "warranty" => "required"
        ]);

        Product::create($request->only(["name","description","price","category","brand","warranty"]));
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getWarranty()
    {
        return $this->attributes['warranty'];
    }

    public function setWarranty($warranty)
    {
        $this->attributes['warranty'] = $warranty;
    }
}
