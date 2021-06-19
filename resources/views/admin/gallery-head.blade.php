@extends('admin.layouts.app')
@section('title', 'Gallery Head Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @can('create', App\Gallery_caption::class)
                    <a href="{{ route('admin.gallery-head.add') }}" class="nav-link">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                                Caption Gallery</i></button>
                    </a>
                @endcan
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
                                    <td>
                                        @can('update', App\Gallery_caption::class)
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-edit{{ $d->id }}"><i class="fa fa-pen"
                                                    aria-hidden="true"></i></button>
                                        @endcan
                                        @can('delete', App\Gallery_caption::class)
                                            <form action="{{ route('admin.gallery-head.delete', $d->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-circle btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    @foreach ($data as $item)
        {{-- Modal Edit --}}
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-labelledby="modal-editLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-editLabel">Edit Gallery Head Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('admin.gallery-head.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="head_story" class="col-sm-2 col-form-label">Head Story</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                        name="head_story">{{ old('head_story', $item->head_story) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="head_gallery" class="col-sm-2 col-form-label">Head Gallery</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                        name="head_gallery">{{ old('head_gallery', $item->head_gallery) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="head_video" class="col-sm-2 col-form-label">Head Video</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                        name="head_video">{{ old('head_video', $item->head_video) }}</textarea>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
