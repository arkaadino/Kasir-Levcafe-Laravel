@extends('layouts.master')
@section('title', 'Penjualan')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-12">
                                <h5 class="card-title mb-9 fw-semibold">Tambah Data Penjualan</h5>
                                <div class="card-body">
                                    <form action="/penjualan/simpan" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="id_pelanggan" class="form-label">Pelanggan</label>
                                            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                                                <option value="">Pilih Pelanggan</option>
                                                @foreach ($pelanggan as $pel)
                                                    <option value="{{ $pel->id }}">{{ $pel->nama_pelanggan }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="layanan" class="form-label">Layanan Pemesanan</label>
                                            <select class="form-control" id="layanan" name="layanan" required>
                                                <option value="">Pilih Layanan</option>
                                                <option value="dinein">Dine-in</option>
                                                <option value="takeaway">Take-away</option>
                                            </select>
                                        </div>

                                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                                        <a href="/penjualan" class="btn btn-outline-secondary m-1">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
