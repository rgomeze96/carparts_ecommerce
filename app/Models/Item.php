<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{

    //attributes id, subtotal, order_id, product_id, created_at, updated_at

    protected $fillable = ['id','subtotal'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
