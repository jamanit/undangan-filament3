<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'photo' => 'array',
    ];

    protected static function booted()
    {
        static::saving(function ($template) {
            // delete old files when updating
            $files = ['photo'];
            foreach ($files as $file) {
                if ($template->isDirty($file)) {
                    $oldFile = $template->getOriginal($file);
                    if ($oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }
            }
        });

        static::deleting(function ($template) {
            // delete files when deleted
            $files = ['photo'];
            foreach ($files as $file) {
                if ($template->$file) {
                    Storage::disk('public')->delete($template->$file);
                }
            }
        });
    }

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}
