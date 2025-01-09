@extends('layouts.master')
@section('title', 'User')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-12">
                    <h5 class="card-title mb-9 fw-semibold">Tambah Data User</h5>
                    <div class="card-body">
                        <form action="/user/simpan" method="POST">
                          @csrf
                          <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" aria-describedby="emailHelp" name="password" required>
                          </div>
                          <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                              <select class="form-control" name="role" id="role" required>
                                <option>Admin</option>
                                <option>Staff</option>
                              </select>
                          </div>
                          <a href="/user" class="btn btn-outline-secondary m-1">Kembali</a>
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
