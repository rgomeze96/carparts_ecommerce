<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ToolLoan extends Model
{
    //attributes id, user_id, product_id, product_name, description, deposit_amount, cost, loan_date, return_date
    protected $fillable = ["user_id", "product_id", "description", "deposit_amount", "loan_date", "return_date"];

    // validate form to create a Tool Loan
    public static function validate(Request $request)
    {
        $request->validate([
            "userId" => "required",
            "productId" => "required",
            "description" => "required",
            "depositAmount" => "required|numeric|gt:0",
            "loanDate" => "required|date",
            "returnDate" => "required|date"
        ]);
    }
    public static function modifyValidate(Request $request)
    {
        $request->validate([
            "userId" => "required",
            "productId" => "required",
            "description" => "required",
            "depositAmount" => "required",
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
        return $this->attributes['user_id'];
    }
    // set the id of the user that loaned the tool
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }
    // get the id of the product that was loaned
    public function getProductId()
    {
        return $this->attributes['product_id'];
    }
    // set the id of the product that was loaned
    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
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
        return $this->attributes['deposit_amount'];
    }
    // set the deposit amount required to loan the tool
    public function setDepositAmount($depositAmount)
    {
        $this->attributes['deposit_amount'] = $depositAmount;
    }
    // get the date that the tool is being loaned
    public function getLoanDate()
    {
        return $this->attributes['loan_date'];
    }
    // set the date that the tool is is being loaned
    public function setLoanDate($loanDate)
    {
        $this->attributes['loan_date'] = $loanDate;
    }
    // get the date that the tool is to be returned
    public function getReturnDate()
    {
        return $this->attributes['return_date'];
    }
    // set the date that the tool is to be returned
    public function setReturnData($returnDate)
    {
        $this->attributes['return_date'] = $returnDate;
    }
}
