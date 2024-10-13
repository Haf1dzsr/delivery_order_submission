<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $delivery_orders = DeliveryOrder::whereIn('do_status', ['Menunggu Persetujuan', 'Rejected', 'Disetujui', 'Direvisi'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('pages.approver.dashboard', compact('delivery_orders'));
    }
}
