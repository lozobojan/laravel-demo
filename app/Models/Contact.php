<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    const PER_PAGE = 10;
    const DEFAULT_PROFILE_PHOTO = "no-photo.jpeg";
    protected $guarded = ['id'];
    protected $appends = ['profile_photo_path'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    // accessor
    public function getProfilePhotoPathAttribute(){
        if($this->has_profile_photo)
            return $this->images()->where('order', 1)->first()->path;
        else
            return self::DEFAULT_PROFILE_PHOTO;
    }

    public function getOtherImagesAttribute(){
        return $this->images()->whereNot('order', 1)->orderBy('order')->get();
    }

    public function getHasProfilePhotoAttribute(){
        return $this->images()->where('order', 1)->count() > 0;
    }

    public function deleteImages(){
        foreach ($this->images as $image) {
            Storage::delete($image->path);
        }
        $this->images()->delete();
    }
}
