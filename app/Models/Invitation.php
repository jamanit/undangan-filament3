<?php

namespace App\Models;

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
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
