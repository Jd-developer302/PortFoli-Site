<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'cv', 'image', 'name', 'title', 'sub_title', 'email',
        'phone_number', 'address', 'description', 'mobile_number'
    ];
    
    use HasFactory;
}
