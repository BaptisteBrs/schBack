<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AssignedRole
 *
 * @property int $id
 * @property int $role_id
 * @property int $entity_id
 * @property string $entity_type
 * @property int|null $restricted_to_id
 * @property string|null $restricted_to_type
 * @property int|null $scope
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereRestrictedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereRestrictedToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignedRole whereScope($value)
 * @mixin \Eloquent
 */
class AssignedRole extends Model
{
    use HasFactory;
    protected $table = 'assigned_roles';

}
