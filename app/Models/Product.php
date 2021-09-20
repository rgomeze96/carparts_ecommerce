<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, description, salePrice, category, brand, warranty, image, created_at, updated_at

    //methods validateProduct

    protected $fillable = ['id','name','description','salePrice','category','brand','warranty', 'image'];

    public static function validateProduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "salePrice" => "required|numeric|gt:0",
            "category" => "required",
            "brand" => "required",
            "warranty" => "required",
            "image" => "required",
        ]);

        Product::create($request->only(["name","description","salePrice","category","brand","warranty", "image"]));
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

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
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
