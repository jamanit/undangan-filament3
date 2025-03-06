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
            if ($template->isDirty('image')) {
                $oldFile = $template->getOriginal('image');
                if ($oldFile) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
        });

        static::deleting(function ($template) {
            // delete files when deleted
            if ($template->image) {
                Storage::disk('public')->delete($template->image);
            }
        });
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
