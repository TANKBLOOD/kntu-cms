<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    public function categories() {
        return $this->hasMany(CvCategory::class, 'parent_id');
    }
}
