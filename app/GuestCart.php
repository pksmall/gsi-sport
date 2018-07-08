<?php

namespace App;

class GuestCart
{
    public $items = null;
    public $total_qty = 0;
    public $total_price = 0;

    public function __construct($old_cart)
    {
        if ($old_cart)
        {
            $this->items = $old_cart->items;
            $this->total_qty = $old_cart->total_qty;
            $this->total_price = $old_cart->total_price;
        }
    }

    public function add_item($item, $id, $qty, $size)
    {
        $stored_item = ['qty' => $qty, 'price' => $item->price, 'item' => $item, 'size' => $size];

        if (!isset($this->items)) {
            $this->items = [];
        }

        if (count($this->items) > 0) {

            $result = false;
            $item_old_var = null;
            foreach ($this->items as $key => $item_old) {
                if ($item_old['item']->id == $id && $item_old['size'] == $size) {
                    //dd(123);
                    $this->items[$key]['qty'] += $qty;
                    $result = true;
                }
                if ($item_old['item']->id == $id && !isset($item_old['size']) && !isset($size)) {
                    $item_old['qty'] += $qty;
                    $result = true;
                }
            }
            if (!$result)
            {
                array_push($this->items, $stored_item);
            }

        } else {
            array_push($this->items, $stored_item);
        }

        $this->total_qty += $qty;
        $this->total_price += $item['price'] * $qty;

    }
}
