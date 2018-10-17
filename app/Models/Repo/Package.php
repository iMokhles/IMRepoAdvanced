<?php

namespace App\Models\Repo;

use App\Models\Social\Review;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStatus\HasStatuses;

class Package extends Model
{
    use CrudTrait;
    use HasStatuses;
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packages';

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
        'user_id', 'package_id', 'package_version', 'comment', 'rate',
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
        if ($name === 'active'
            || $name === 'not active'
            || $name === 'in review') {
            return true;
        }
        return false;
    }

    /**
     * Return packages's review list
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'package_id');
    }
}
