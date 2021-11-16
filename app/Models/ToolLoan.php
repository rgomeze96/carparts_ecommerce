<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ToolLoan extends Model
{
    //attributes id, user_id, product_id, product_name, description, deposit_amount, cost, loan_date, return_date
    protected $fillable = ["user_id", "product_id", "description", "deposit_amount", "loan_date", "return_date"];

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "userId" => "required",
            "productId" => "required",
            "depositAmount" => "required|numeric|gt:0",
            "loanDate" => "required|date",
            "returnDate" => "required|date"
            ]
        );
    }

    public static function modifyValidate(Request $request)
    {
        $request->validate(
            [
            "userId" => "required",
            "productId" => "required",
            "description" => "required",
            "depositAmount" => "required",
            "loanDate" => "required|date",
            "returnDate" => "required|date"
            ]
        );
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
    
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }
    
    public function getProductId()
    {
        return $this->attributes['product_id'];
    }
    
    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
    }
    
    public function getDescription()
    {
        return $this->attributes['description'];
    }
    
    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }
    
    public function getDepositAmount()
    {
        return $this->attributes['deposit_amount'];
    }
    
    public function setDepositAmount($depositAmount)
    {
        $this->attributes['deposit_amount'] = $depositAmount;
    }
    
    public function getLoanDate()
    {
        return $this->attributes['loan_date'];
    }
    
    public function setLoanDate($loanDate)
    {
        $this->attributes['loan_date'] = $loanDate;
    }
    
    public function getReturnDate()
    {
        return $this->attributes['return_date'];
    }
    
    public function setReturnData($returnDate)
    {
        $this->attributes['return_date'] = $returnDate;
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
