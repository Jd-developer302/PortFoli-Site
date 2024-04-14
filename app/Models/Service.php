<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;
class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'description'
    ];
    public function ServiceCategory(){

        return $this->belongsTo(ServiceCategory::class, 'category_id','id');
    }
    public function category(){

        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
