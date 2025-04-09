<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveStory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    protected static function booted()
    {
        static::creating(function ($loveStory) {
            if (!$loveStory->order) {
                $loveStory->order = LoveStory::max('order') + 1;
            }
        });
    }
}
