<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\CommonStatusEnum;
use App\Enums\MediaDirectoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name'              => 'string',
        'email'             => 'string',
        'image'             => 'string',
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'status'            => CommonStatusEnum::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_path',
    ];

    /**
     * Image Path Attribute
     *
     * @return string|null
     */
    public function getImagePathAttribute(): string | null
    {
        return $this->image ? file_url($this->image, MediaDirectoryEnum::USER->value) : null;
    }

}
