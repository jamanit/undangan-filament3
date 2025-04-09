<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    protected static function booted()
    {
        static::deleting(function ($audio) {
            // delete files when deleted
            $files = ['file'];
            foreach ($files as $file) {
                if ($audio->$file) {
                    Storage::disk('public')->delete($audio->$file);
                }
            }
        });
    }
}
