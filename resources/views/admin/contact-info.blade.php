@extends('admin.layouts.app')
@section('title', 'Contact Information Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.contactinfo.add') }}" class="nav-link">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                            Contact Information</i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>WA</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->wa }}</td>
                                    <td>{{ $d->twitter }}</td>
                                    <td>{{ $d->instagram }}</td>
                                    <td>{{ $d->facebook }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
