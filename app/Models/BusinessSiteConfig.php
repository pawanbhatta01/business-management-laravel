<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessSiteConfig extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['key', 'value', 'business_id'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
