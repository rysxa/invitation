@extends('admin.layouts.app')
@section('title', 'Story User Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Story User Page</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.story.add') }}" class="nav-link">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                            Event</i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Picture</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ Storage::url('public/images/' . $d->picture) }}" alt="story" class="img-responsive" width="80"></td>
                                    <td>{{ $d->subject }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($d->date)) }}</td>
                                    <td>{{ $d->message }}</td>
                                    <td><a type="button" class="btn btn-warning fa-circle"><i class="fa fa-pen"></i></a></td>
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
