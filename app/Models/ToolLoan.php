<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ToolLoan extends Model
{
    //attributes id, userId, productId, productName, description, depositAmount, cost, startDate, returnDate
    protected $fillable = ["userId", "productId", "productName", "description", "depositAmount", "loanDate", "returnDate"];

    // validate form to create a Tool Loan
    public static function validate(Request $request)
    {
        $request->validate([
            "userId" => "required",
            "productId" => "required",
            "depositAmount" => "required|numeric|gt:0",
            "loanDate" => "required|date",
            "returnDate" => "required|date"
        ]);
    }

    // get the id of the tool loan
    public function getId()
    {
        return $this->attributes['id'];
    }
    // set the id of the tool loan
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    // get the id of the user that loaned the tool
    public function getUserId()
    {
        return $this->attributes['userId'];
    }
    // set the id of the user that loaned the tool
    public function setUserId($userId)
    {
        $this->attributes['userId'] = $userId;
    }
    // get the id of the product that was loaned
    public function getProductId()
    {
        return $this->attributes['productId'];
    }
    // set the id of the product that was loaned
    public function setProductId($productId)
    {
        $this->attributes['productId'] = $productId;
    }
    // get the description of the Tool Loan
    public function getDescription()
    {
        return $this->attributes['description'];
    }
    // set the description of the Tool Loan
    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }
    // get the deposit amount required to loan the tool
    public function getDepositAmount()
    {
        return $this->attributes['depositAmount'];
    }
    // set the deposit amount required to loan the tool
    public function setDepositAmount($depositAmount)
    {
        $this->attributes['depositAmount'] = $depositAmount;
    }
    // get the date that the tool is being loaned
    public function getLoanDate()
    {
        return $this->attributes['loanDate'];
    }
    // set the date that the tool is is being loaned
    public function setLoanDate($loanDate)
    {
        $this->attributes['loanDate'] = $loanDate;
    }
    // get the date that the tool is to be returned
    public function getReturnDate()
    {
        return $this->attributes['returnDate'];
    }
    // set the date that the tool is to be returned
    public function setReturnData($returnDate)
    {
        $this->attributes['returnDate'] = $returnDate;
    }
}
