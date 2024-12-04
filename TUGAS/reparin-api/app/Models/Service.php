<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Service extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image_url',      // Kolom untuk URL gambar
        'name',           // Nama layanan
        'description',    // Deskripsi layanan
        'category',       // Kategori layanan
        'price_range',    // Rentang harga
    ];

    /**
     * Accessor for the image attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image_url) => url('/storage/services/' . $image_url),
        );
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
