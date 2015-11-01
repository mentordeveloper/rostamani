<?php

class Orders extends \Eloquent {

    protected $fillable = [];
    protected $table = 'order';

    /**
     * Get the order Items.
     *
     * @return array
     */
    public function orderItems() {
        return $this->hasMany('order_item');
    }

}
