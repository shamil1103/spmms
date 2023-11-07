<?php

namespace App\Models;

use App\Enums\MediaDirectoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_number',
        'email',
        'address',
        'photo',
        'favicon',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'           => 'string',
        'contact_number' => 'string',
        'email'          => 'string',
        'address'        => 'string',
        'photo'          => 'string',
        'favicon'        => 'string',
        'user_id'        => 'integer',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo_path',
        'favicon_path',
    ];

    /**
     * Photo Path Attribute
     *
     * @return string|null
     */
    public function getPhotoPathAttribute(): string | null
    {
        return $this->photo ? file_url($this->photo, MediaDirectoryEnum::APPLICATION->value) : null;
    }

    /**
     * Favicon Path Attribute
     *
     * @return string|null
     */
    public function getFaviconPathAttribute(): string | null
    {
        return $this->favicon ? file_url($this->favicon, MediaDirectoryEnum::APPLICATION->value) : null;
    }

    /**
     * User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'User']);
    }
}
