<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Silber\Bouncer\Database\HasRolesAndAbilities;




/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $phone
 * @property bool $is_actif
 * @property bool $is_bureau
 * @property bool $is_coach
 * @property bool $is_benevole
 * @property bool $is_player
 * @property string|null $bureau_fonction
 * @property string|null $picture
 * @property string|null $birthday
 * @property int|null $coach_category
 * @property int|null $player_category
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBureauFonction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCoachCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBenevole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBureau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsCoach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsPlayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlayerCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsNot($role)
 * @property string $firstname
 * @property string $login
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @property string|null $code_first_connexion
 * @property string|null $code_created_at
 * @property string|null $code_expired_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodeCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodeExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodeFirstConnexion($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndAbilities;
    use SoftDeletes;
    protected $table = 'users';
    public $timestamps = true;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function coach_category()
    {
        return $this->belongsTo(Category::class, 'coach_category');
    }

    public function player_category()
    {
        return $this->belongsTo(Category::class, 'player_category');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles', 'entity_id', 'role_id');
    }
}
