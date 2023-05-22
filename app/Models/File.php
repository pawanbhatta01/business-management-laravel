<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'link', 'type', 'business_id'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
