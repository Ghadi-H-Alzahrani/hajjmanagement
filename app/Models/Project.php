<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assigned_manager_id',
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
        'status',
        'ac_capacity',
        'transformer_numbers',
        'pre_allocation_received',
        'pre_allocation_reason',
        'site_received_from_kdana',
        'site_received_reason',
        'reschedule_date',
        'license_received',
        'license_reason',
        'pre_execution_files',
    ];

    protected $casts = [
        'total_area' => 'float',
        'tent_area' => 'float',
        'pilgrims_count' => 'integer',
        'pre_execution_files' => 'array',
        'reschedule_date' => 'date',
    ];

    public function assigned_manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'assigned_manager_id');
    }

    public function files()
    {
        return $this->hasMany(\App\Models\ProjectFile::class);
    }

}
