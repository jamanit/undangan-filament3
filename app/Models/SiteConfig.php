<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($side_config) {
            // delete old files when updating
            $files = ['file'];
            foreach ($files as $file) {
                if ($side_config->isDirty($file)) {
                    $oldFile = $side_config->getOriginal($file);
                    if ($oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }
            }
        });

        static::deleting(function ($side_config) {
            // delete files when deleted
            $files = ['file'];
            foreach ($files as $file) {
                if ($side_config->$file) {
                    Storage::disk('public')->delete($side_config->$file);
                }
            }
        });
    }
}
