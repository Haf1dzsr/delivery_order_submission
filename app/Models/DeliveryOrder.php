<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'do_number',
        'do_destination_awal',
        'do_destination_akhir',
        'shipment_fee',
        'do_status',
        'do_creator',
        'do_created_date',
        'do_approved_by',
        'do_approved_date',
        'do_approver_reject_note',
        'do_approver_reject_date',
        'do_approver_reject_by',
    ];
}
