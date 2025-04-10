<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Card
 *
 * @property int $id
 * @property string $name
 * @property string $queue
 * @property integer $fail_percent_chance
 * @property integer $delay_min
 * @property integer $delay_max
 * @property string $tags
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class JobModel extends Model
{

    public $amount;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'queue',
        'fail_percent_chance',
        'delay_min',
        'delay_max',
        'tags',
    ];
}
