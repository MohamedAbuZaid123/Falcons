<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'message'];

    protected $casts = [
        'addresses' => 'array',
        'mobiles' => 'array',
        'social_links' => 'array',
    ];
}
