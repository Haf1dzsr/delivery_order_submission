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
            'do_purpose' => 'required',
            'do_origin' => 'required',
            'do_destination' => 'required',
            'origin_postal_code' => 'required',
            'destination_postal_code' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
            'item_length' => 'required',
            'item_width' => 'required',
            'item_height' => 'required',
            'item_weight' => 'required',
            'item_qty' => 'required',
            'item_price' => 'required',
            'shipment_fee' => 'required',
            'shipment_courier' => 'required',
        ]);

        DeliveryOrder::create([
            'do_number' => 'DO-' . now()->timestamp,
            'do_purpose' => $request->do_purpose,
            'do_origin' => $request->do_origin,
            'do_destination' => $request->do_destination,
            'origin_postal_code' => $request->origin_postal_code,
            'destination_postal_code' => $request->destination_postal_code,
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_length' => $request->item_length,
            'item_width' => $request->item_width,
            'item_height' => $request->item_height,
            'item_weight' => $request->item_weight,
            'item_qty' => $request->item_qty,
            'item_price' => $request->item_price,
            'shipment_fee' => $request->shipment_fee,
            'shipment_courier' => $request->shipment_courier,
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
            'do_purpose' => 'required',
            'do_origin' => 'required',
            'do_destination' => 'required',
            'origin_postal_code' => 'required',
            'destination_postal_code' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
            'item_length' => 'required',
            'item_width' => 'required',
            'item_height' => 'required',
            'item_weight' => 'required',
            'item_qty' => 'required',
            'item_price' => 'required',
            'shipment_fee' => 'required',
            'shipment_courier' => 'required',
        ]);

        $delivery_order->update([
            'do_purpose' => $request->do_purpose,
            'do_origin' => $request->do_origin,
            'do_destination' => $request->do_destination,
            'origin_postal_code' => $request->origin_postal_code,
            'destination_postal_code' => $request->destination_postal_code,
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_length' => $request->item_length,
            'item_width' => $request->item_width,
            'item_height' => $request->item_height,
            'item_weight' => $request->item_weight,
            'item_qty' => $request->item_qty,
            'item_price' => $request->item_price,
            'shipment_fee' => $request->shipment_fee,
            'shipment_courier' => $request->shipment_courier,
        ]);

        return redirect()->route('delivery-orders.index')->with('success', 'Delivery Order updated successfully');
    }

    public function updateApprovalStatus(Request $request, DeliveryOrder $delivery_order) {

        $request->validate([
            'do_status' => 'required',
        ]);

        $delivery_order->update([
            'do_status' => $request->do_status,
        ]);

        return redirect()->route('delivery-orders.index')->with('success', $request->do_status == 'DRAFT' ? 'Berhasil mengajukan delivery order' : 'Berhasil merevisi data delivery order');
    }

    public function destroy(DeliveryOrder $delivery_order)
    {
        $delivery_order->delete();
        return redirect()->route('delivery-orders.index')->with('success', 'Delivery Order deleted successfully');
    }
}
