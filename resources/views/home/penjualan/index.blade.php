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
                    <h5 class="card-title mb-9 fw-semibold">Data Penjualan</h5>
                    <a href="/penjualan/tambah" class="btn btn-outline-primary m-1">Tambah Penjualan</a>
                    <a href="/penjualan/laporan" class="btn btn-outline-dark m-1">Laporan Penjualan</a>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table class="table table-bordered text-nowrap mb- align-middle">
                          <thead class="text-dark fs-4">
                            <tr>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">NOBON</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Nama Pelanggan</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Nama Kasir</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Total</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Diskon</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Bayar</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Kembali</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Layanan Pemesanan</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Tanggal Pembayaran</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($penjualan as $penjualan )
                            <tr>
                              <td class="border">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration}}</h6>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $penjualan->pelanggan->nama_pelanggan}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $penjualan->user->name}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">Rp. {{number_format ($penjualan->total)}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">Rp. {{number_format ($penjualan->diskon)}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">Rp. {{number_format ($penjualan->bayar)}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">Rp. {{number_format ($penjualan->kembali)}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $penjualan->layanan}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $penjualan->created_at->format('Y-m-d')}}</p>
                              </td>
                              <td class="border">
                                @if ($penjualan->total == 0)
                                <a href="/penjualan/{{$penjualan->id}}/detail" class="btn btn-info m-1">Selesaikan Pesanan</a>
                                @else
                                <a href="/penjualan/{{$penjualan->id}}/struk" class="btn btn-secondary m-1">Cetak Struk</a>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
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
