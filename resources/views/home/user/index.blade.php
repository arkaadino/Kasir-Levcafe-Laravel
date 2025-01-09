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
                    <h5 class="card-title mb-9 fw-semibold">Data User</h5>
                    <a href="/user/tambah" class="btn btn-outline-primary m-1">Tambah Data</a>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table class="table table-bordered text-nowrap mb- align-middle">
                          <thead class="text-dark fs-4">
                            <tr>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">ID</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Username</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Email</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Password</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Role</h6>
                              </th>
                              <th class="border">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user as $user )
                            <tr>
                              <td class="border">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration}}</h6>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $user->name}}</p>
                              </td>
                              <td class="border">
                                <p class="mb-0 fw-normal">{{ $user->email}}</p>
                              </td>
                              <td class="border" >
                                <p class="mb-0 fw-normal">{{ $user->password}}</p>
                              </td>
                              <td class="border" >
                                <p class="mb-0 fw-normal">{{ $user->role}}</p>
                              </td>
                              <td class="border">
                                <a href="/user/{{$user->id}}/edit" class="btn btn-warning m-1">Edit</a>
                                <a href="/user/{{$user->id}}/delete" class="btn btn-danger m-1">Hapus</a>
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
