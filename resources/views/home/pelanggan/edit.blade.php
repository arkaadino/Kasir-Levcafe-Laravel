@extends('layouts.master')
@section('title', 'Pelanggan')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-12">
                    <h5 class="card-title mb-9 fw-semibold">Edit Data Pelanggan</h5>
                    <div class="card-body">
                        <form action="/pelanggan/{{$pelanggan->id}}/update" method="POST">
                          @csrf
                          <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" aria-describedby="emailHelp" placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan" value="{{$pelanggan->nama_pelanggan}}" required>
                          </div>
                          <div class="mb-3">
                            <label for="notelp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="notelp" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon" name="notelp" value="{{$pelanggan->notelp}}" required>
                          </div>
                          <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" rows="4" value="{{$pelanggan->alamat}}"></textarea>
                        </div>
                          <div class="mb-3">
                            <input type="text" value="Freshbie" class="form-control" id="level" aria-describedby="emailHelp" name="level" hidden>
                          </div>
                          <div class="mb-3">
                            <input type="number" value="0" class="form-control" id="jml" aria-describedby="emailHelp" name="jml" hidden>
                          </div>
                          <a href="/pelanggan" class="btn btn-outline-secondary m-1">Kembali</a>
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
