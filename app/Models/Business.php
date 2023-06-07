<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'creator_id', 'slug', 'owner_name', 'category_id', 'description', 'image', 'status'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function businessCategory()
    {
        return $this->belongsTo(Business::class, 'category_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'business_id');
    }

    public function contact()
    {
        return $this->hasOne(Contact::class, 'business_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'business_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'business_id');
    }

    public function pages()
    {
        return $this->hasMany(BusinessPage::class, 'business_id');
    }
    public function menus()
    {
        return $this->hasMany(Menu::class, 'business_id');
    }

    public function files()
    {
        return $this->hasMany(FileManager::class, 'business_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'business_id');
    }

    public function contacts()
    {
        return $this->hasMany(BusinessContact::class, 'business_id');
    }
    public function settings()
    {
        return $this->hasMany(BusinessSiteConfig::class, 'business_id');
    }
    public function about()
    {
        return $this->hasOne(BusinessAbout::class, 'business_id');
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'business_id');
    }
}
