@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <!--  Header Start -->

    <!--  Header End -->
    <div class="container-fluid">
      <!--  Row 1 -->
      <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">History Penjualan</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">NOBON</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Pelanggan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Kasir</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Total</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Diskon</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Bayar</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kembali</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Layanan Pemesanan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal Pembayaran</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($historypenjualan as $penjualan)
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $penjualan->pelanggan->nama_pelanggan }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $penjualan->user->name }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rp. {{ number_format($penjualan->total) }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rp. {{ number_format($penjualan->diskon) }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rp. {{ number_format($penjualan->bayar) }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rp. {{ number_format($penjualan->kembali) }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $penjualan->layanan }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $penjualan->created_at->format('Y-m-d') }}</p>
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
      <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
          <div class="card w-100">
            <div class="card-body">
              <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                  <h4 class="card-title fw-semibold">Stok Barang</h4>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Produk</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Jenis Produk</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Stok</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produkstok as $ps)
                        <tr> <!-- Tambahkan baris baru di sini -->
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $ps->nama_produk }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $ps->jenis->nama_jenis }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $ps->stok }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                @if ($ps->stok >= 100)
                                    <span class="badge bg-success rounded-1 fw-semibold">Baik</span>
                                @else
                                    <span class="badge bg-danger rounded-1 fw-semibold">Buruk</span>
                                @endif
                            </td>
                        </tr> <!-- Tutup baris di sini -->
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

  @endsection
