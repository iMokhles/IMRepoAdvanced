<?php

namespace App\Models\Social;

use App\Models\Admin;
use App\Models\Repo\Package;
use App\Models\User;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStatus\HasStatuses;

class Review extends Model
{
    use CrudTrait;
    use HasStatuses;
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
        'user_id', 'admin_id', 'package_id', 'package_version', 'comment', 'rate',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @param string $name
     * @param string $reason
     * @return bool
     */
    public function isValidStatus(string $name, string $reason = '')
    {
        if ($name === 'approved'
            || $name === 'not approved'
            || $name === 'in review') {
            return true;
        }
        return false;
    }

    /**
     * Return the author of this review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the moderator of this review ( review )
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function moderator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     * Return the author of this review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

}
