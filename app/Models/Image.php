<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function getStoragePathAttribute(){
        return Storage::url($this->path);
    }
}
