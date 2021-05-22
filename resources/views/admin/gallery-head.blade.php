@extends('admin.layouts.app')
@section('title', 'Gallery Head Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Gallery Caption Gallery</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.gallery-head.add') }}" class="nav-link">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                            Caption Gallery</i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Caption Story</th>
                                <th>Caption Gallery</th>
                                <th>Caption Video</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->head_story }}</td>
                                    <td>{{ $d->head_gallery }}</td>
                                    <td>{{ $d->head_video }}</td>
                                    <td><button type="button" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"
                                                aria-hidden="true"></i></button></td>
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
