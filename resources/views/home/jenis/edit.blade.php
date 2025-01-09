@extends('layouts.master')
@section('title', 'Jenis')
@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-12">
                    <h5 class="card-title mb-9 fw-semibold">Edit Data Jenis</h5>
                    <div class="card-body">
                        <form action="/jenis/{{$jenis->id}}/update" method="POST">
                          @csrf
                          <div class="mb-3">
                            <label for="nama_jenis" class="form-label">Nama Jenis</label>
                            <input type="text" class="form-control" id="nama_jenis" aria-describedby="emailHelp" name="nama_jenis" value="{{$jenis->nama_jenis}}">
                          </div>

                          <a href="/jenis" class="btn btn-outline-secondary m-1">Kembali</a>
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
