<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
        'image',
        'icon',
        'dark_icon',
        'title_ar',
        'description_ar',
    ];

    protected $casts = [
        'icon' => 'string',
        'dark_icon' => 'string',
    ];

    public function projects()
    {
        return $this->belongsToMany(\App\Models\Admin\Project::class, 'project_service', 'service_id', 'project_id');
    }
}
