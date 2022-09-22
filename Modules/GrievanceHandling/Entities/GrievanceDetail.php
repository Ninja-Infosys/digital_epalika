<?php

namespace Modules\GrievanceHandling\Entities;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrievanceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'grievance_type_id',
        'grievance_office_id',
        'subject',
        'description',
        'complaint_severity'
    ];


    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'model');
    }
}
