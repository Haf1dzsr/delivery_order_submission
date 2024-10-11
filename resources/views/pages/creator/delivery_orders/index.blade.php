@extends('layouts.app-creator')

@section('title', 'Users')

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
                                            <th>Destinasi Awal</th>
                                            <th>Destinasi Akhir</th>
                                            <th>Biaya Perjalanan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($delivery_orders as $delivery_order)
                                            <tr>

                                                <td>
                                                    {{ $delivery_order->do_number }}
                                                </td>
                                                <td>
                                                    {{ $delivery_order->do_destination_awal }}
                                                </td>
                                                <td>
                                                    {{ $delivery_order->do_destination_akhir }}
                                                </td>
                                                 <td>
                                                    {{ $delivery_order->shipment_fee }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        {{ $delivery_order->do_status }}
                                                        
                                                        @if ($delivery_order->do_status !== 'Menunggu Persetujuan')

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
                                                           
                                                            
                                                        @endif
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($delivery_order->do_status !== 'Menunggu Persetujuan')
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('delivery-orders.edit', $delivery_order->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('delivery-orders.destroy', $delivery_order->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
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