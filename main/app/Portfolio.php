<?php

namespace App;

use App\PortfolioImage;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded=['id'];
    public function images() {
        return $this->hasMany(PortfolioImage::class);
    }
}
