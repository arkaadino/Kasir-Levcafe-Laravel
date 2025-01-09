@extends('layouts.master')
@section('title', 'Produk')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-12">
                    <h5 class="card-title mb-9 fw-semibold">Tambah Data Produk</h5>
                    <div class="card-body">
                        <form action="/produk/simpan" method="POST">
                          @csrf
                          <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" aria-describedby="emailHelp" name="nama_produk" required>
                          </div>
                          <div class="mb-3">
                            <label for="id_jenis" class="form-label">Jenis Produk</label>
                            <select class="form-control" name="id_jenis" id="id_jenis">
                                @foreach ( $jenis as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis ->nama_jenis }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" aria-describedby="emailHelp" name="harga" oninput="formatRupiah(this)" onblur="removeRp(this)" required>
                          </div>

                          <script>
                            function formatRupiah(angka) {
                                // Hapus karakter non-numeric
                                let value = angka.value.replace(/[^0-9]/g, '');

                                // Format menjadi rupiah
                                if (value) {
                                    angka.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".").replace(/^/, 'Rp ');
                                } else {
                                    angka.value = '';
                                }
                            }

                            function removeRp(angka) {
                                // Menghapus 'Rp ' sebelum menyimpan ke server
                                let value = angka.value.replace(/[^0-9]/g, ''); // Mengambil hanya angka
                                angka.dataset.numericValue = value; // Simpan nilai numerik dalam data attribute
                            }
                            </script>

                          <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" aria-describedby="emailHelp" name="stok" required>
                          </div>

                          <a href="/produk" class="btn btn-outline-secondary m-1">Kembali</a>
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
</div>

  @endsection
