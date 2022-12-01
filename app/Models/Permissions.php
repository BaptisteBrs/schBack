<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Permissions
 *
 * @property int $id
 * @property int $ability_id
 * @property int|null $entity_id
 * @property string|null $entity_type
 * @property bool $forbidden
 * @property int|null $scope
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereAbilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereForbidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permissions whereScope($value)
 * @mixin \Eloquent
 */
class Permissions extends Model
{
    use HasFactory;
    protected $table = 'permissions';

}
