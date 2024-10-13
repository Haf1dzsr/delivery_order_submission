<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'do_number',
        'do_purpose',
        'do_origin',
        'do_destination',
        'origin_postal_code',
        'destination_postal_code',
        'item_name',
        'item_description',
        'item_length',
        'item_width',
        'item_height',
        'item_weight',
        'item_qty',
        'item_price',
        'shipment_fee',
        'shipment_courier',
        'do_status',
        'do_creator',
        'do_created_date',
        'do_approved_by',
        'do_approved_date',
        'do_approver_reject_note',
        'do_approver_reject_date',
        'do_approver_reject_by',
        'do_approver_revise_note',
        'do_approver_revise_date',
        'do_approver_revise_by',
    ];
}
