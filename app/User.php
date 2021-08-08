<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commenter;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, LogsActivity, HasRoles, HasMediaTrait, Commenter;

    protected $exportColumns = [
        ['data' => 'name', 'title' => 'Name'],
        ['data' => 'email', 'title' => 'Registered Email'],
    ];

    protected $printColumns = [
        ['data' => 'name', 'title' => 'Name'],
        ['data' => 'email', 'title' => 'Registered Email'],
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $recordEvents = ['created', 'deleted', 'updated'];

    protected static $logAttributes = ['name', 'email', 'updated_at'];
    protected static $logName = 'user';
//    protected static $ignoreChangedAttributes = ['name', 'updated_at'];
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function scopeGetAdmin($builder, $isAdmin = true){
        return $builder->where('is_admin', $isAdmin);
    }
    public function scopeIsAdmin($builder){
        return $builder->where('is_admin', true);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
             ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
        ->registerMediaConversions(function (){
            $this->addMediaConversion('thumb')
                ->fit(Manipulations::FIT_CROP, 30, 30);

            $this->addMediaConversion('card')
                ->fit(Manipulations::FIT_CROP, 368, 232);

            $this->addMediaConversion('portrait')
                ->fit(Manipulations::FIT_CROP, 1920, 1080);
        });

    }

//    public function registerMediaConversions(Media $media = null)
//    {
//
//    }
    public function currentAvatar(){
        return $this->belongsTo(Media::class, 'current_using_avatar_id');
    }

    public function getAvatarAttribute(){
        return optional($this->currentAvatar)->getFullUrl('thumb');
    }

}
