<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($template) {
            // delete old files when updating
            $files = ['image'];
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
            $files = ['image'];
            foreach ($files as $file) {
                if ($template->$file) {
                    Storage::disk('public')->delete($template->$file);
                }
            }
        });
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
