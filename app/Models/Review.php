<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //attributes id, product_id, user_id, review_text, rating
    protected $fillable = ["review_text", "rating"];

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "newReviewRating" => "required|numeric",
            "newReviewText" => "required"
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

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getReviewText()
    {
        return $this->attributes['review_text'];
    }

    public function setReviewText($reviewText)
    {
        $this->attributes['review_text'] = $reviewText;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
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
