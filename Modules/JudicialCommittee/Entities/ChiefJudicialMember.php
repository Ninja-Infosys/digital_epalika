<?php

namespace Modules\JudicialCommittee\Entities;

use App\Models\Settings\Designation;
use App\Traits\EventObserveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ChiefJudicialMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'photo',
        'position',
        'designation_id',
        'phone',
        'status',
    ];

    public function setPhotoAttribute($value)
    {
        if (! empty($value) && ! is_string($value)) {
            $this->attributes['photo'] = $value->store('judicial_committee/chief_members', 'public');
        }
    }

    public function getPhotoUrlAttribute(): string
    {
        return ! empty($this->attributes['photo'])
            ? Storage::disk('public')->url($this->attributes['photo'])
            : asset('images/user_icon.jpg');
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
}
