<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingCouple extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($wedding_couple) {
            // delete files when deleted
            $files = ['bride_photo', 'groom_photo'];
            foreach ($files as $file) {
                if ($wedding_couple->$file) {
                    Storage::disk('public')->delete($wedding_couple->$file);
                }
            }
        });
    }

    public function invitation()
    {
        return $this->hasOne(Invitation::class);
    }
}
