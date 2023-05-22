<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['page_id', 'business_id', 'order'];


    public function page()
    {
        return $this->belongsTo(BusinessPage::class, 'page_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
