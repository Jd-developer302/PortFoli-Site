<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCatagory extends Model
{
    use HasFactory;

    protected $table = 'portfolio_catagories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_by'
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class, 'port_id');
    }
}
