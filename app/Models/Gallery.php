<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    protected static function booted()
    {
        static::creating(function ($gallery) {
            if (!$gallery->order) {
                $gallery->order = Gallery::max('order') + 1;
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
}
