<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    
    public function index()
    {
        $delivery_orders = DeliveryOrder::where('do_creator', Auth::user()->email)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('pages.creator.delivery_orders.index', compact('delivery_orders'));
    }

    public function create()
    {
        return view('pages.creator.delivery_orders.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'do_destination_awal' => 'required',
            'do_destination_akhir' => 'required',
            'shipment_fee' => 'required',
        ]);

        DeliveryOrder::create([
            'do_number' => 'DO-' . now()->timestamp,
            'do_destination_awal' => $request->do_destination_awal,
            'do_destination_akhir' => $request->do_destination_akhir,
            'shipment_fee' => $request->shipment_fee,
            'do_status' => 'DRAFT',
            'do_creator' => Auth::user()->email,
            'do_created_date' => now(),
        ]);

        return redirect()->route('delivery-orders.index')->with('success', 'Delivery Order created successfully');
    }

    public function edit(DeliveryOrder $delivery_order)
    {
        return view('pages.creator.delivery_orders.edit', compact('delivery_order'));
    }

    public function update(Request $request, DeliveryOrder $delivery_order)
    {
        $request->validate([
            'do_destination_awal' => 'required',
            'do_destination_akhir' => 'required',
            'shipment_fee' => 'required',
        ]);

        $delivery_order->update([
            'do_destination_awal' => $request->do_destination_awal,
            'do_destination_akhir' => $request->do_destination_akhir,
            'shipment_fee' => $request->shipment_fee,
        ]);

        return redirect()->route('delivery-orders.index')->with('success', 'Delivery Order updated successfully');
    }

    public function updateApprovalStatus(Request $request, DeliveryOrder $delivery_order) {

        $request->validate([
            'do_status' => 'required',
        ]);

        $delivery_order->update([
            'do_status' => 'Menunggu Persetujuan',
        ]);

        return redirect()->route('delivery-orders.index')->with('success', 'Berhasil mengajukan pengiriman');
    }

    public function destroy(DeliveryOrder $delivery_order)
    {
        $delivery_order->delete();
        return redirect()->route('delivery-orders.index')->with('success', 'Delivery Order deleted successfully');
    }
}
