<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'service_category';

    protected $fillable = [
        'name',
        'slug',
        'image'
    ];


    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}