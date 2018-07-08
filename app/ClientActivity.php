<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientActivity extends Model
{

    protected $actions = [
        'выполнил вход',
        'вышел из аккаунта',
        'зарегистрировался',
        'оформил новый заказ',
        'добавил товар в корзину',
        'очистил корзину'
    ];

    protected $fillable = [
        'user_id', 'action_id', 'order_id', 'ip'
    ];

    public function getActionById($id)
    {
        return $this->actions[--$id];
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
