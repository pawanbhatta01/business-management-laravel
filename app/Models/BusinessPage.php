<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'featured_image', 'content', 'business_id'];

    public function business()
    {
        $this->belongsTo(Business::class, 'business_id');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'page_id');
    }
}
