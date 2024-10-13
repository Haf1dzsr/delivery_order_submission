@extends('layouts.app-creator')

@section('title', 'Delivery Orders')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Delivery Orders</h1>
                <div class="section-header-button">
                    <a href="{{ route('delivery-orders.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Delivery Orders</a></div>
                    <div class="breadcrumb-item">All Delivery Orders</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Delivery Orders</h2>
                <p class="section-lead">
                    You can manage Delivery Orders, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Delivery Orders</h4>
                            </div>
                            <div class="card-body">
                                
                               

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>DO Number</th>
                                            <th>Tempat Pengambilan</th>
                                            <th>Tempat Tujuan</th>
                                            <th>Biaya Perjalanan</th>
                                            <th class="text-center">Kurir</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($delivery_orders as $delivery_order)
                                            <tr>

                                                <td>
                                                    {{ $delivery_order->do_number }}
                                                </td>
                                                <td>
                                                    {{ $delivery_order->do_origin }}
                                                </td>
                                                <td>
                                                    {{ $delivery_order->do_destination }}
                                                </td>
                                                 <td>
                                                    {{ $delivery_order->shipment_fee }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        {{ $delivery_order->shipment_courier }}
                                                    </div>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        {{ $delivery_order->do_status }}
                                                        
                                                        @if ($delivery_order->do_status == 'DRAFT')

                                                        <form action="{{ route('delivery-orders.updateApprovalStatus', $delivery_order) }}" method="POST" class="mt-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="_method" value="PATCH" />
                                                            <input type="hidden" name="do_status" value="Menunggu Persetujuan" />
                                                            <button class="btn btn-sm btn-info btn-icon">
                                                                <i class="fa-regular fa-square-check"></i>
                                                                Ajukan Persetujuan
                                                            </button>
                                                        </form>
                                                        
                                                        @elseif ($delivery_order->do_status == 'REVISI')
                                                            <form action="{{ route('delivery-orders.updateApprovalStatus', $delivery_order) }}" method="POST" class="mt-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="_method" value="PATCH" />
                                                            <input type="hidden" name="do_status" value="DIREVISI" />
                                                            <button class="btn btn-sm btn-info btn-icon">
                                                                <i class="fa-regular fa-square-check"></i>
                                                                Selesai Revisi
                                                            </button>
                                                            </form>

                                                            <div class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-sm btn-warning btn-icon mt-2" data-toggle="modal" data-target="#detailModal{{ $delivery_order->id }}">
                                                                    <i class="fas fa-info"></i>
                                                                    Lihat Catatan Revisi
                                                                </button>
                                                                <div class="modal" id="detailModal{{ $delivery_order->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $delivery_order->id }}" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="detailModalLabel{{ $delivery_order->id }}">Delivery Order Details</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><strong>{{ $delivery_order->do_approver_revise_note }}</strong></p>
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @if ($delivery_order->do_status == 'DRAFT' || $delivery_order->do_status == 'REJECTED')
                                                           <form action="{{ route('delivery-orders.destroy', $delivery_order->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                            
                                                        @endif
                                                        
                                                    </div>
                                                        @endif
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($delivery_order->do_status !== 'Menunggu Persetujuan')
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-sm btn-info btn-icon mr-2" data-toggle="modal" data-target="#detailModal{{ $delivery_order->id }}">
                                                            <i class="fas fa-info"></i>
                                                            Detail
                                                        </button>
                                                        <div class="modal" id="detailModal{{ $delivery_order->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $delivery_order->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailModalLabel{{ $delivery_order->id }}">Delivery Order Details</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><strong>DO Number:</strong> {{ $delivery_order->do_number }}</p>
                                                                        <p><strong>Maksud Pengiriman:</strong> {{ $delivery_order->do_purpose }}</p>
                                                                        <p><strong>Tempat Pengambilan:</strong> {{ $delivery_order->do_origin }}</p>
                                                                        <p><strong>Kode Pos Tempat Pengambilan:</strong> {{ $delivery_order->origin_postal_code }}</p>
                                                                        <p><strong>Tempat Tujuan:</strong> {{ $delivery_order->do_destination }}</p>
                                                                        <p><strong>Kode Pos Tempat Tujuan:</strong> {{ $delivery_order->destination_postal_code }}</p>
                                                                        <p><strong>Biaya Perjalanan:</strong> {{ $delivery_order->shipment_fee }}</p>
                                                                        <p><strong>Kurir:</strong> {{ $delivery_order->shipment_courier }}</p>
                                                                        <p><strong>Nama Barang:</strong> {{ $delivery_order->item_name }}</p>
                                                                        <p><strong>Deskripsi Barang:</strong> {{ $delivery_order->item_description }}</p>
                                                                        <p><strong>Berat Barang:</strong> {{ $delivery_order->item_weight }} kg</p>
                                                                        <p><strong>Panjang Barang:</strong> {{ $delivery_order->item_length }}</p>
                                                                        <p><strong>Lebar Barang:</strong> {{ $delivery_order->item_width }}</p>
                                                                        <p><strong>Tinggi Barang:</strong> {{ $delivery_order->item_height }}</p>
                                                                        <p><strong>Jumlah Barang:</strong> {{ $delivery_order->item_qty }}</p>
                                                                        <p><strong>DO dibuat pada:</strong> {{ $delivery_order->do_created_date }}</p>
                                                                        @if ($delivery_order->do_approver_revise_date !== null)
                                                                            <p><strong>DO direvisi pada:</strong> {{ $delivery_order->do_approver_revise_date }}</p>
                                                                        @endif
                                                                        @if ($delivery_order->do_approver_reject_date !== null)
                                                                            <p><strong>DO ditolak pada:</strong> {{ $delivery_order->do_approver_reject_date }}</p>                                      
                                                                        @endif
                                                                        @if ($delivery_order->do_approved_date !== null)
                                                                            <p><strong>DO disetujui pada:</strong> {{ $delivery_order->do_approved_date }}</p>                                                                          
                                                                        @endif
                                                                        <p><strong>Status:</strong> {{ $delivery_order->do_status }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if ($delivery_order->do_status == 'DRAFT' || $delivery_order->do_status == 'REVISI')
                                                            <a href='{{ route('delivery-orders.edit', $delivery_order->id) }}'
                                                                class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>
                                                        @endif
                                                        
                                                        @if ($delivery_order->do_status == 'DRAFT' || $delivery_order->do_status == 'REJECTED')
                                                           <form action="{{ route('delivery-orders.destroy', $delivery_order->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                            
                                                        @endif
                                                        
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $delivery_orders->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    
@endpush