<?php

namespace App\Models;

use App\Traits\Uuid;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Prospect
 *
 * @property string $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $linkedin_urls
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Prospect find($value)
 * @method static Builder|Prospect newModelQuery()
 * @method static Builder|Prospect newQuery()
 * @method static Builder|Prospect query()
 * @method static Builder|Prospect whereCreatedAt($value)
 * @method static Builder|Prospect whereId($value)
 * @method static Builder|Prospect whereLinkedinUrls($value)
 * @method static Builder|Prospect whereName($value)
 * @method static Builder|Prospect whereUpdatedAt($value)
 * @method static Builder|Prospect whereUserId($value)
 * @mixin Eloquent
 */
class Prospect extends Model
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
}
