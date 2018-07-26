<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['client_id', 'status_id', 'total', 'pay_id', 'guest_name', 'guest_city', 'guest_email', 'guest_telephone', 'delivery_id', 'more', 'mail_number'];

    protected $orderStatuses = [
        'В обработке',
        'Ожидаем оплаты',
        'Оплачено',
        'Возврат',
        'Возмещенный',
        'Доставлено',
        'Завершено',
        'Истекло',
        'Неудавшийся',
        'Обработано',
        'Ожидание',
        'Отмена и аннулирование',
        'Отменено',
        'Отправлен',
        'Полностью измененный'
    ];

    public static function getAllOrderStatuses()
    {
        $order = new Order();
        return $order->orderStatuses;
    }

    public function getOrderStatus($id)
    {
        return $this->orderStatuses[--$id];
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function type_pay_ru()
    {
        return $this->hasOne(TypePaysTranslation::class, 'pay_id', 'pay_id')->where('locale', 'ru');
    }

    public function type_delivery_ru()
    {
        return $this->hasOne(TypeDeliveriesTranslation::class, 'delivery_id', 'delivery_id')->where('locale', 'ru');
    }
}
