<?php

class Promo extends \Eloquent {

    protected $fillable = [];
    protected $table = 'promo';

    /*
     * Update Promo Status 
     * @function updatePromoStatus
     * @parem int promoId promo table autoincremental id
     * @param int status coupon status
     * @author Umair Majeed (mentordeveloper)
     */

    public static function updatePromoStatus($promoId, $status) {

        DB::table('promo')
                ->where('id', $promoId)
                ->update(array('status' => $status));
    }
    
    public static function updatePromoUsed($promoCode, $status , $randnumber,$count = 0) {

        DB::table('promo')
                ->where('code', $promoCode)
                ->update(
                        array(
                            'status' => $status,
                            'rand' => $randnumber,
                            'coupon_count' => $count
                            )
                        );
    }

}
