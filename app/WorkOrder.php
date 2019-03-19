<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    /**
     * Specify model's table binding
     * @var string
     */
    protected $table = 'work_orders';

    /**
     * Specify fillable attribute
     * @var array
     */
    protected $fillable = [
        'order_date',
        'customer_name',
        'customer_address',
        'phone_number',
        'sto',
        'source',
        'ref_id'
    ];
}
