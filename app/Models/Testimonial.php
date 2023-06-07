<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['business_id', 'name', 'post', 'description'];


    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
