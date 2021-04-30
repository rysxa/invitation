@extends('admin.layouts.app')
@section('title', 'Gallery User Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Gallery User Page</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.gallery.add') }}" class="nav-link">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                            Gallery</i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Picture</th>
                                <th>Caption</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ Storage::url('public/images/' . $d->picture) }}" alt="gallery" class="img-responsive" width="80"></td>
                                    <td>{{ $d->caption }}</td>
                                    <td><button type="button" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen" aria-hidden="true"></i></button></td>
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
