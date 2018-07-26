<?php

namespace App;

class GuestCart
{
    public $items = null;
    public $total_qty = 0;
    public $total_price = 0;
    public $total_price_delivery = 0;

    public function __construct($old_cart)
    {
        if ($old_cart) {
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
                if ($item_old['item']->id == $id) {
                    $this->items[$key]['qty'] += $qty;
                    $result = true;
                }
            }
            if (!$result) {
                array_push($this->items, $stored_item);
            }

        } else {
            array_push($this->items, $stored_item);
        }

        $this->total_qty += $qty;
        $this->total_price += $item['price'] * $qty;
        $this->total_price_delivery = $this->total_price;
    }

    public function qty_up($item, $id, $qty, $size)
    {
        $stored_item = ['qty' => $qty, 'price' => $item->price, 'item' => $item, 'size' => $size];

        if (!isset($this->items)) {
            $this->items = [];
        }
        $retQty =  0;
        if (count($this->items) > 0) {
            $result = false;
            $item_old_var = null;
            foreach ($this->items as $key => $item_old) {
                if ($item_old['item']->id == $id) {
                    $this->items[$key]['qty'] += $qty;
                    $retQty = $this->items[$key]['qty'];
                    $result = true;
                    break;
                }
            }
            if (!$result) {
                array_push($this->items, $stored_item);
            }

        } else {
            array_push($this->items, $stored_item);
        }

        $this->total_qty += $qty;
        $this->total_price += $item['price'] * $qty;
        $this->total_price_delivery = $this->total_price;
        return $retQty;
    }

    public function qty_down($item, $id, $qty, $size)
    {
        $stored_item = ['qty' => $qty, 'price' => $item->price, 'item' => $item, 'size' => $size];

        if (!isset($this->items)) {
            $this->items = [];
        }
        $retQty =  1;
        if (count($this->items) > 0) {
            $result = false;
            $notnull = false;
            $item_old_var = null;
            foreach ($this->items as $key => $item_old) {
                if ($item_old['item']->id == $id) {
                    if ($this->items[$key]['qty']-1 > 0) {
                        $this->items[$key]['qty'] -= $qty;
                        $retQty = $this->items[$key]['qty'];
                        $notnull = true;
                    } else {
                        $this->items[$key]['qty'] = 1;
                        $notnull = false;
                    }
                    $result = true;
                    break;
                }
            }
            if (!$result) {
                array_push($this->items, $stored_item);
            }

        } else {
            array_push($this->items, $stored_item);
        }

        if ($notnull) {
            $this->total_qty -= $qty;
            $this->total_price -= $item['price'] * $qty;
            $this->total_price_delivery = $this->total_price;
        }
        return $retQty;
    }

    public function item_delete($item, $id)
    {
        if (!isset($this->items)) {
            $this->items = [];
        }

        $item_old_var = null;
        $qty = 0;
        foreach ($this->items as $key => $item_old) {
            if ($item_old['item']->id == $id) {
                $qty = $this->items[$key]['qty'];

                unset($this->items[$key]);

                if ($this->items == null)
                {
                    request()->session()->forget('cart');
                }

                request()->session()->flash('cart-update', true);
                break;
            }
        }

        $this->total_qty -= $qty;
        $this->total_price -= $item['price'] * $qty;
        $this->total_price_delivery = $this->total_price;
    }
}
