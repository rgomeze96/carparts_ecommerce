<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //attributes id, product_id, user_id, review_text, rating
    protected $fillable = ["review_text", "rating"];

    // validate form to createa review
    public static function validate(Request $request)
    {
        $request->validate([
            "newReviewRating" => "required|numeric",
            "newReviewText" => "required"
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
    // get the id of the product with a review
    public function getProductId()
    {
        return $this->attributes['product_id'];
    }
    // set the id of the product with a review
    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
    }
    // get the id of the user that wrote the review
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    // set the id of the user that wrote the review
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    // get the text of the review
    public function getReviewText()
    {
        return $this->attributes['review_text'];
    }
    // set the text of the review
    public function setReviewText($reviewText)
    {
        $this->attributes['review_text'] = $reviewText;
    }
    // get the rating of the review
    public function getRating()
    {
        return $this->attributes['rating'];
    }
    // set the rating of the review
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
