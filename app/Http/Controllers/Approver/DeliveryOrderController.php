<?php

namespace App\Http\Controllers\Approver;

use App\Models\DeliveryOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    public function index()
    {
        $delivery_orders = DeliveryOrder::whereIn('do_status', ['Menunggu Persetujuan', 'REJECTED', 'APPROVED', 'REVISI','DIREVISI'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('pages.approver.dashboard', compact('delivery_orders'));
    }
    
    public function approveDeliveryOrder(Request $request, DeliveryOrder $delivery_order) {

        $delivery_order->update([
            'do_status' => 'APPROVED',
            'do_approved_by' => Auth::user()->email,
            'do_approved_date' => now(),
        ]);

        return redirect()->route('approver.index')->with('success', 'Berhasil menyetujui Delivery Order');
    }

    public function rejectDeliveryOrder(Request $request, DeliveryOrder $delivery_order) {
        $request->validate([
            'do_approver_reject_note' => 'required',
        ]);

        $delivery_order->update([
            'do_status' => 'REJECTED',
            'do_approver_reject_by' => Auth::user()->email,
            'do_approver_reject_date' => now(),
            'do_approver_reject_note' => $request->do_approver_reject_note,
        ]);

        return redirect()->route('approver.index')->with('success', 'Berhasil me-reject Delivery Order');
    }

    public function reviseDeliveryOrder(Request $request, DeliveryOrder $delivery_order) {
        $request->validate([
            'do_approver_revise_note' => 'required',
        ]);

        $delivery_order->update([
            'do_status' => 'REVISI',
            'do_approver_revise_by' => Auth::user()->email,
            'do_approver_revise_date' => now(),
            'do_approver_revise_note' => $request->do_approver_revise_note,
        ]);

        return redirect()->route('approver.index')->with('success', 'Berhasil meminta revisi Delivery Order');
    }

}
