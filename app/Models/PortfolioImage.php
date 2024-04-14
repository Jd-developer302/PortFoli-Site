<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PortfolioCatagory;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $table = 'portfolio_image';

    protected $fillable = [
        'port_id',
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_by'
    ];

    public function PortfolioCatagory(){
        return $this->belongsTo(PortfolioCatagory::class,'port_id','id');
    }
    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class,'port_id');
    }
}
