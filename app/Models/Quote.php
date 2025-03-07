<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($quote) {
            // delete old files when updating
            $files = ['image_1', 'image_2', 'image_3', 'image_4'];

            foreach ($files as $file) {
                if ($quote->isDirty($file)) {
                    $oldFile = $quote->getOriginal($file);
                    if ($oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }
                }
            }
        });

        static::deleting(function ($quote) {
            // delete files when deleted
            $files = ['image_1', 'image_2', 'image_3', 'image_4'];

            foreach ($files as $file) {
                if ($quote->$file) {
                    Storage::disk('public')->delete($quote->$file);
                }
            }
        });
    }

    public function invitation()
    {
        return $this->hasOne(Invitation::class);
    }
}
