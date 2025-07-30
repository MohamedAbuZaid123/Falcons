<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property array $addresses
 * @property array $mobiles
 * @property array $social_links [facebook, linkedin, x, whatsapp]
 */
class contactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_infos';
    protected $fillable = ['addresses', 'mobiles', 'social_links', 'addresses_ar'];

    protected $casts = [
        'addresses' => 'array',
        'mobiles' => 'array',
        'social_links' => 'array',
        'addresses_ar' => 'array',
    ];
}
