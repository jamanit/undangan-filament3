<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    protected static function booted()
    {
        static::creating(function ($gift) {
            if (!$gift->order) {
                $gift->order = Gift::max('order') + 1;
            }
        });

        static::saving(function ($model) {
            if ($model->type === 'Rekening') {
                $model->recipient_name = null;
                $model->recipient_address = null;
                $model->recipient_phone_number = null;
            } elseif ($model->type === 'Paket') {
                $model->account_name = null;
                $model->account_number = null;
                $model->account_holder = null;
            }
        });
    }
}
