<?php

namespace Mehnat\User\Entities;

use Mehnat\Core\Traits\StatusTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mehnat\Core\Interfaces\ResponsibleInterface;
use App\Models\Role;

class User extends Authenticatable implements ResponsibleInterface
{
    use Notifiable;
    use StatusTrait;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */

    protected static function boot()
    {
        parent::boot();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',  'password', 'fullname', 'status', 'age', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function transformer():array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'age' => $this->age,
            'status' => $this->status,
            'role_id' => $this->role_id,
            'role'    => $this->role
        ];
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }

}
