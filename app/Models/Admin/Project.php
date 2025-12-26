<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
        'images',
        'title_ar',
        'description_ar',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function services()
    {
        return $this->belongsToMany(\App\Models\Admin\Services::class, 'project_service', 'project_id', 'service_id');
    }
}
