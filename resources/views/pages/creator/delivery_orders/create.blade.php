@extends('layouts.app-creator')

@section('title', 'Add Delivery Order')

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
                <h1>Draft Delivery Order</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Delivery Orders</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Delivery Order</h2>
                <div class="card">
                    <form action="{{ route('delivery-orders.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label>Maksud Pengiriman</label>
                                <input type="text"
                                    class="form-control @error('do_purpose')
                                is-invalid
                            @enderror"
                                    name="do_purpose">
                                @error('do_purpose')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Pengambilan</label>
                                <input type="text"
                                    class="form-control @error('do_origin')
                                is-invalid
                            @enderror"
                                    name="do_origin">
                                @error('do_origin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kode Pos Alamat Pengambilan</label>
                                <input type="text"
                                    class="form-control @error('origin_postal_code')
                                is-invalid
                            @enderror"
                                    name="origin_postal_code">
                                @error('origin_postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Tujuan</label>
                                <input type="text"
                                    class="form-control @error('do_destination')
                                is-invalid
                            @enderror"
                                    name="do_destination">
                                @error('do_destination')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kode Pos Alamat Tujuan</label>
                                <input type="text"
                                    class="form-control @error('destination_postal_code')
                                is-invalid
                            @enderror"
                                    name="destination_postal_code">
                                @error('destination_postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text"
                                    class="form-control @error('item_name')
                                is-invalid
                            @enderror"
                                    name="item_name">
                                @error('item_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <input type="text"
                                    class="form-control @error('item_description')
                                is-invalid
                            @enderror"
                                    name="item_description">
                                @error('item_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Panjang Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_length')
                                        is-invalid
                                    @enderror"
                                            name="item_length">
                                        @error('item_length')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lebar Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_width')
                                        is-invalid
                                    @enderror"
                                            name="item_width">
                                        @error('item_width')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tinggi Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_height')
                                        is-invalid
                                    @enderror"
                                            name="item_height">
                                        @error('item_height')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Berat Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_weight')
                                        is-invalid
                                    @enderror"
                                            name="item_weight">
                                        @error('item_weight')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_qty')
                                        is-invalid
                                    @enderror"
                                            name="item_qty">
                                        @error('item_qty')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Harga Barang</label>
                                        <input type="number"
                                            class="form-control @error('item_price')
                                        is-invalid
                                    @enderror"
                                            name="item_price">
                                        @error('item_price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <label for="shipment_courier"></label>
                                <select class="form-select" aria-label="select" name="shipment_courier">
                                    <option selected>Pilihan kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="ninja">Ninja</option>
                                    <option value="lion">Lion</option>
                                    <option value="sicepat">SiCepat</option>
                                    <option value="sentralcargo">Sentral Cargo</option>
                                    <option value="jnt">J&T</option>
                                    <option value="idexpress">IDexpress</option>
                                    <option value="rpx">RPX</option>
                                    <option value="wahana">Wahana</option>
                                    <option value="pos">Pos Indonesia</option>
                                    <option value="anteraja">Anteraja</option>
                                    <option value="paxel">Paxel</option>
                                    <option value="borzo">Borzo</option>
                                    <option value="lalamove">Lalamove</option>
                                    <option value="deliveree">Deliveree</option>
                                    <option value="grab">Grab</option>
                                    <option value="gojek">Gojek</option>
                                </select>
                            </div>
                            <div class="card-footer text-center">
                                    <button id="check-shipment-fee" class="btn btn-primary">Dapatkan Biaya Pengiriman Termurah</button>
                            </div>
                            <div class="form-group">
                                <label>Biaya Pengiriman</label>
                                <input type="number" id="shipment_fee"
                                    class="form-control" 
                                    @error('shipment_fee')
                                    is-invalid
                                    @enderror"
                                    name="shipment_fee"
                                    readonly>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function() {
            $('#check-shipment-fee').on('click', function(event) {
                event.preventDefault();
            
                let originPostalCode = $('input[name="origin_postal_code"]').val();
                let destinationPostalCode = $('input[name="destination_postal_code"]').val();
                let couriers = $('select[name="shipment_courier"]').val();
                let itemName = $('input[name="item_name"]').val();
                let itemDescription = $('input[name="item_description"]').val();
                let itemPrice = $('input[name="item_price"]').val();
                let itemLength = $('input[name="item_length"]').val();
                let itemWidth = $('input[name="item_width"]').val();
                let itemHeight = $('input[name="item_height"]').val();
                let itemWeight = $('input[name="item_weight"]').val();
                let itemQty = $('input[name="item_qty"]').val();
                
                $.ajax({
                    url: "https://api.biteship.com/v1/rates/couriers",
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'content-type': 'application/json',
                        'authorization': 'biteship_test.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiYml0ZXNoaXBfdGVzdGluZyIsInVzZXJJZCI6IjY3MDk4NjRhN2UyNmNkMDAxMjNjNzk2ZiIsImlhdCI6MTcyODY3ODIzOH0.bSy1ZhyDb864qXHGYj7oh_IC5zQWBIFEIiWTjWPLH6Q'
                    },
                    data: JSON.stringify({
                        origin_postal_code: originPostalCode,
                        destination_postal_code: destinationPostalCode,
                        couriers: couriers,
                        items: [
                            {
                                name: itemName,
                                description: itemDescription,
                                value: itemPrice,
                                length: itemLength,
                                width: itemWidth,
                                height: itemHeight,
                                weight: itemWeight,
                                quantity: itemQty
                            }
                        ]
                    }),
                    success: function(response) {
                        if (response.success) {
                            let shipmentOptions = response.pricing;
                            
                            let lowestPrice = shipmentOptions.reduce((min, option) => option.price < min.price ? option : min, shipmentOptions[0]);

                            let shipmentFee = $('#shipment_fee').val(lowestPrice.price);
                            let shipmentCourier = $('#shipment_courier').val(lowestPrice.courier_name);

                            alert('Shipment fee: ' + lowestPrice.price + ' by ' + lowestPrice.courier_name);
                        } else {
                            alert('Failed to get shipment fee');
                        }
                    },
                    error: function(error) {
                        if (error.code == 40001010) {
                            alert('Unauthorized');
                        } else {
                            alert('Tidak ada kurir yang tersedia, silahkan pilih kurir lain');
                        }
                    }
                });
            });
        });
    </script>
@endpush

