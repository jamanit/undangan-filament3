<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            // create code otomatis when created  
            $code = 'KD' . date('Ymd') . rand(10, 99);
            $counter = 1;
            while (self::where('code', $code)->exists()) {
                $code = 'KD' . date('Ymd') . rand(10, 99);
                $counter++;
                if ($counter > 10) {
                    throw new \Exception('Unable to generate a unique code');
                }
            }
            $model->code = $code;
        });

        static::deleting(function ($invitation) {
            // delete files when deleted   
            if ($invitation->weddingCouple->bride_photo) {
                Storage::disk('public')->delete($invitation->weddingCouple->bride_photo);
            }
            if ($invitation->weddingCouple->groom_photo) {
                Storage::disk('public')->delete($invitation->weddingCouple->groom_photo);
            }

            if ($invitation->quote->image_1) {
                Storage::disk('public')->delete($invitation->quote->image_1);
            }
            if ($invitation->quote->image_2) {
                Storage::disk('public')->delete($invitation->quote->image_2);
            }
            if ($invitation->quote->image_3) {
                Storage::disk('public')->delete($invitation->quote->image_3);
            }
            if ($invitation->quote->image_4) {
                Storage::disk('public')->delete($invitation->quote->image_4);
            }

            foreach ($invitation->galleries as $gallery) {
                if ($gallery->photo) {
                    Storage::disk('public')->delete($gallery->photo);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function weddingCouple()
    {
        return $this->hasOne(WeddingCouple::class);
    }

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function loveStories()
    {
        return $this->hasMany(LoveStory::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function streamings()
    {
        return $this->hasMany(Streaming::class);
    }

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
