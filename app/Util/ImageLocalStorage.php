<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($request){
        if($request->hasFile('image')) {
            $image = $request->image;
            Storage::disk('public')->put($request->name.".".$image->getClientOriginalExtension(),file_get_contents($request->file('image')->getRealPath()));
        }
    }
}
