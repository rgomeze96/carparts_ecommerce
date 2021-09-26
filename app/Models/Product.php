<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//use App\Http\Controllers\ProductController;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, description, salePrice, cost, category, brand, warranty, image, created_at, updated_at

    //methods validateProduct

    protected $fillable = ['name','description','salePrice','cost','category','brand','warranty', 'quantity', 'imagePath'];

    public static function validateProduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "salePrice" => "required|numeric|gt:0",
            "cost" => "required|numeric|gt:0",
            "category" => "required",
            "brand" => "required",
            "warranty" => "required",
            "quantity" => "required|numeric|gt:0",
            "image" => "required",
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getSalePrice()
    {
        return $this->attributes['salePrice'];
    }

    public function setSalePrice($salePrice)
    {
        $this->attributes['salePrice'] = $salePrice;
    }

    public function getCost()
    {
        return $this->attributes['cost'];
    }

    public function setCost($cost)
    {
        $this->attributes['cost'] = $cost;
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
    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getImagePath()
    {
        return $this->attributes['imagePath'];
    }

    public function setImagePath($imagePath)
    {
        $this->attributes['imagePath'] = $imagePath;
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    /*
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }*/
    
}
