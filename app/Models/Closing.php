<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}
