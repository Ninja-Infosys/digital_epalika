<?php

namespace Modules\EMap\Entities;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\EventObserveTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class NecessaryDocument extends Model
{
    use HasFactory, SoftDeletes, EventObserveTrait;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [

        'title',
        'description',
       
    ];

    public function files():MorphMany
    {
        return $this->MorphMany(File::class,'model');
    }


    // public function setAttribute($key, $value)
    // {
    //     if ($key === 'files' && is_array($value)) {
    //         // Store file paths as JSON string
    //         $value = json_encode($this->uploadFiles($value));
    //     }

    //     parent::setAttribute($key, $value);
    // }

    // // Method to handle file upload and return file paths
    // private function uploadFiles(array $files): array
    // {
    //     $filePaths = [];

    //     foreach ($files as $file) {
    //         $filePaths[] = $file->store('public/necessaryDocument');
    //     }

    //     return $filePaths;
    // }

    // // Accessor to retrieve file URLs
    // public function getFilesAttribute($value): array
    // {
    //     return json_decode($value, true) ?? [];
    // }
}
