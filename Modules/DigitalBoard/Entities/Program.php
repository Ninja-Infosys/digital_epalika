<?php

namespace Modules\DigitalBoard\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;
    use EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'image',
        'date',
        'ward'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get:fn (string $value) => Storage::disk('public')->url($value),
            set:fn ($value) => $value->store('program', 'public'),
        );
    }
}
