<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $guarded = [];

    public function findByCode($code)
    {
        return self::where('code',$code)->first();

    }

    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent'){
            // ? $total == Cart::subtotal() is string,so we have to convert it into a number. ex: $total = 124,35
            $OldCartSubtotal = str_replace(',','',$total); //// $total 10256.58
            //dd($OldCartSubtotal);
            $OldCartSubtotalNum = (float) $OldCartSubtotal; //// now ot is a number(float)
            return $OldCartSubtotalNum * ($this->percent_off / 100);
        } else {
            return 0;
        }
    }
}