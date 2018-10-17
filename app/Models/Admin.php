<?php

namespace App\Models;

use App\Models\Repo\Package;
use App\Models\Social\Review;
use App\Notifications\Admin\AdminResetPasswordNotification;
use App\Notifications\Admin\AdminVerifyEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;

use Backpack\CRUD\CrudTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use CrudTrait;
    use Notifiable;
    use HasRoles;
    use HasStatuses;
    use LogsActivity;
    use HasMediaTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line([
                trans('backpack.base.password_reset.line_1'),
                trans('backpack.base.password_reset.line_2'),
            ])
            ->action(trans('backpack.base.password_reset.button'), route('admin.password.reset', $this->token))
            ->line(trans('backpack.base.password_reset.notice'));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification() {
        $this->notify(new AdminVerifyEmailNotification());
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    /**
     * @param Request $request
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function uploadImage(Request $request) {
        $this->addMediaFromBase64($request->input("image"))->toMediaCollection('media', 'avatar_disk');
    }

    /**
     * @param string $name
     * @param string $reason
     * @return bool
     */
    public function isValidStatus(string $name, string $reason = '')
    {
        if ($name === 'active'
            || $name === 'not active'
            || $name === 'blocked'
            || $name === 'suspended'
            || $name === 'in review') {
            return true;
        }
        return false;
    }

    /**
     * Return reviewed reviews by admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'admin_id');
    }

    /**
     * Return admin's packages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany(Package::class, 'admin_id');
    }
}
