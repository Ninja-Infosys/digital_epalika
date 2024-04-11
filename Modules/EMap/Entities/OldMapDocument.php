<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OldMapDocument extends Model
{
    use HasFactory,SoftDeletes,EventObserveTrait;

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at'
   ];

   protected $fillable = [
    'old_map_id',
    'document_name',
    'document'
];



public function getDocumentUrlAttribute(): string
{
    return Storage::disk('public')->url($this->document);
}

public function setDocumentAttribute($value)
{
    if (!empty($value) && !is_string($value)) {
        $this->attributes['document'] = $value->store('emap/old_map_documents', 'public');
    }
}

public function getExtensionAttribute(): array|string
{
    return pathinfo($this->document, PATHINFO_EXTENSION)    ;
}

public function oldMap(): BelongsTo
{
    return $this->belongsTo(OldMap::class);
}
}
