<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    public function cvComponent() {
        return $this->hasMany(CvComponent::class, 'cv_id');
    }
    public function cat() {
        return $this->belongsTo(CvCategory::class, 'category_id');
    }
}
