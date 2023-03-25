<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile',
        'landline',
        'notes',
        'image',
        'views'
    ];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
