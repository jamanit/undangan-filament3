<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    protected static function booted()
    {
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
}
