<?php
/**
 * Created by PhpStorm.
 * User: sierraf
 * Date: 2/19/2019
 * Time: 9:56 AM
 */

namespace App\Models\OSM;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Models\OSM\Way
 *
 * @property int $id
 * @property int $changeset_id
 * @property int $visible
 * @property string $timestamp
 * @property int $version
 * @property int $uid
 * @property string $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OSM\Node[] $nodes
 * @property-read int|null $nodes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereChangesetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OSM\Way whereVisible($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OSM\WayTag[] $tags
 * @property-read int|null $tags_count
 */
class Way extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'osm_streets';
    }

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'changeset_id',
        'visible',
        'timestamp',
        'version',
        'user'
    ];

    public function nodes()
    {
        return $this->hasManyThrough(Node::class, WayNode::class);
    }

    public function tags()
    {
        return $this->hasMany(WayTag::class);
    }
}
