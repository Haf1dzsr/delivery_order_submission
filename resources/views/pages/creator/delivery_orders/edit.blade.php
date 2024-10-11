@extends('layouts.app-creator')

@section('title', 'Edit Delivery Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Delivery Orders</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Delivery Orders</h2>

                <div class="card">
                    <form action="{{ route('delivery-orders.update', $delivery_order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Destinasi Awal</label>
                                <input type="text"
                                    class="form-control @error('do_destination_awal')
                                is-invalid
                            @enderror"
                                    name="do_destination_awal" value="{{ $delivery_order->do_destination_awal }}"> 
                                @error('do_destination_awal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Destinasi Akhir</label>
                                <input type="text"
                                    class="form-control @error('do_destination_akhir')
                                is-invalid
                            @enderror"
                                    name="do_destination_akhir" value="{{ $delivery_order->do_destination_akhir }}">
                                @error('do_destination_akhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Biaya Perjalanan</label>
                                <input type="number"
                                    class="form-control @error('shipment_fee')
                                is-invalid
                            @enderror"
                                    name="shipment_fee" value="{{ $delivery_order->shipment_fee }}">
                                @error('shipment_fee')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan Draft</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush