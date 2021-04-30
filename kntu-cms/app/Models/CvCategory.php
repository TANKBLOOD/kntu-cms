<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvCategory extends Model
{
    use HasFactory;
    public function cv(){
        return $this->hasMany(Cv::class, 'category_id');
    }
}
