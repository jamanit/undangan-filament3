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
