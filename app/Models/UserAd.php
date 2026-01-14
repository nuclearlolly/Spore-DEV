<?php

namespace App\Models\User;

use App\Models\Model;
use App\Traits\Commentable;

class UserAd extends Model {
    use Commentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'parsed_text',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_ads';

    /**
     * The primary key of the model.
     *
     * @var string
     */
    public $primaryKey = 'user_id';

    /**********************************************************************************************

        RELATIONS

    **********************************************************************************************/

    /**
     * Get the user this ad belongs to.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}