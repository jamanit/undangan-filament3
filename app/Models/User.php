<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'whatsapp_number',
        'photo',
        'avatar_url',
        'custom_fields',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'custom_fields' => 'array',
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
        return $this->$avatarColumn ? Storage::url("$this->$avatarColumn") : null;
    }

    protected static function booted()
    {
        static::saving(function ($user) {
            // delete old files when updating
            if ($user->isDirty('photo')) {
                $oldFile = $user->getOriginal('photo');
                if ($oldFile) {
                    Storage::disk('public')->delete($oldFile);
                }
            }
        });

        static::deleting(function ($user) {
            // delete files when deleted
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // foreach ($user->projects as $project) {
            //     if ($project->image) {
            //         Storage::disk('public')->delete($project->image);
            //     }
            // } 

            // delete relations when deleted
            // $user->skills()->delete(); 
        });
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
