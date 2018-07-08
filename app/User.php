<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static $userStatuses = [
        'Активен',
        'Выключен',
        'Заблокирован'
    ];

    public static function getUserStatus()
    {
        return User::$userStatuses;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company', 'telephone', 'ip', 'status_id', 'is_subscribe'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getClientStatus($id)
    {
        return self::$userStatuses[--$id];
    }

    public function favorites()
    {
        return $this->belongsToMany(Item::class,'favorite_items', 'client_id', 'item_id');
    }

    public function address()
    {
        return $this->hasOne(ClientAddress::class, 'client_id', 'id')->where('type_id', '=', '1');
    }

    public function address_delivery()
    {
        return $this->hasOne(ClientAddress::class, 'client_id', 'id')->where('type_id', '=', '2');
    }

    public function getLatestOrdersByQty($qty)
    {
        return $this->hasMany(Order::class, 'client_id', 'id')->latest()->limit($qty)->get();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(ClientCart::class, 'client_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('role_id', $roles)->first();
    }

    public function hasRole($id_role)
    {
        return null !== $this->roles()->where('role_id', $id_role)->first();
    }

    public function updateRole($role_id)
    {
        \DB::table('role_user')->where('user_id', $this->id)->update(['role_id' => $role_id]);
        return $this;
    }
}
