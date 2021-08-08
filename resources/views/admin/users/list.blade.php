@extends('admin.master')
@section('title', 'User List')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-table bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>User List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Basic Table</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">
                <!-- Hover table card start -->
                <div class="card">

                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key => $user)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td><img src="{{asset('storage/'.$user->image)}}" style="width: 100px;height: 100px" alt=""></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{$user->role->name}}
                                    </td>
                                    <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit</a></td>
                                    <td><a href="{{route('users.delete', $user->id)}}" class="btn btn-danger" onclick="return confirm('Ban co muon xoa user nay')">Delete</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">No data</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
                <!-- Hover table card end -->

            </div>
            <!-- Page-body end -->
        </div>
    </div>
@endsection
