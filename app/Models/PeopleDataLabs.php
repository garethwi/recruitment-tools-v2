<?php

namespace App\Models;

use App\Traits\Uuid;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PeopleDataLabs
 *
 * @property string $id
 * @property string $linkedin_url
 * @property string|null $data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PeopleDataLabs newModelQuery()
 * @method static Builder|PeopleDataLabs newQuery()
 * @method static Builder|PeopleDataLabs query()
 * @method static Builder|PeopleDataLabs whereCreatedAt($value)
 * @method static Builder|PeopleDataLabs whereData($value)
 * @method static Builder|PeopleDataLabs whereId($value)
 * @method static Builder|PeopleDataLabs whereLinkedinUrl($value)
 * @method static Builder|PeopleDataLabs whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $status
 * @method static Builder|PeopleDataLabs whereStatus($value)
 */
class PeopleDataLabs extends Model
{
    use Uuid;
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'uuid';

    /** @var array */
    protected $fillable = [
        'linkedin_url',
        'data',
    ];
}
