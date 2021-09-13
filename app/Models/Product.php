<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, description, salePrice, loanPrice, category, brand, warranty, type, availableLoan, created_at, updated_at

    //methods validateProduct
    
    protected $fillable = ['id','name','description','salePrice','loanPrice','category','brand','warranty','type','availableLoan'];

    public static function validateProduct(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "salePrice" => "required|numeric|gt:0",
            "loanPrice" => "required|numeric|gt:0",
            "category" => "required",
            "brand" => "required",
            "warranty" => "required",
            "type" => "required",
            "availableLoan" => "required"
        ]);

        Product::create($request->only(["name","description","salePrice","loanPrice","category","brand","warranty","type","availableLoan"]));
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

    public function getLoanPrice()
    {
        return $this->attributes['loanPrice'];
    }

    public function setLoanPrice($loanPrice)
    {
        $this->attributes['loanPrice'] = $loanPrice;
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

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    public function getAvailableLoan()
    {
        return $this->attributes['availableLoan'];
    }

    public function setAvailableLoan($availableLoan)
    {
        $this->attributes['availableLoan'] = $availableLoan;
    }
}
