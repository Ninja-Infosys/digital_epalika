<?php

namespace Modules\EMap\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Modules\EMap\Enums\DocumentStatusEnum;

class FormStoreStatus extends Model
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
        "form_store_id",
        "status",
        "comment",
        "data",
        "fields",
    ];

    protected $casts = [
        'status' => DocumentStatusEnum::class,
        "data" => 'json',
        "fields" => 'json',
    ];

    public function formStore(): BelongsTo
    {
        return $this->belongsTo(FormStore::class);
    }
}
