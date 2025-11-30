<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assigned_manager_id',
        'status',
        'company',
        'note',
        'mashaar',
        'nationality',
        'center_number',
        'category',
        'total_area',
        'tent_area',
        'pilgrims_count',
        'contractor',
        'google_map_link',
        'map_file_name',
    ];

    protected $casts = [
        'total_area' => 'float',
        'tent_area' => 'float',
        'pilgrims_count' => 'integer',
    ];

    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'assigned_manager_id');
    }

    public function files()
    {
        return $this->hasMany(\App\Models\ProjectFile::class);
    }
}
