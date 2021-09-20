<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use App\Http\Controllers\ProductController;

class Order extends Model
{
    use HasFactory;

    //attributes id, total, created_at, updated_at

    //methods validateOrder


    public static function validateOrder(Request $request)
    {
        $request->validate([
            "total" => "required|numeric|gt:0",
        ]);

        Product::create($request->only(["total"]));
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }
}
