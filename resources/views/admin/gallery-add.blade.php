@extends('admin.layouts.app')
@section('title', 'Add Gallery Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Gallery User</h1>

        <form action="{{ route('admin.gallery.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" class="form-control" name="title" value="username_id" hidden>
            <div class="form-group row">
                <label for="picture" class="col-sm-4 col-form-label">Picture</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture"
                        value="{{ old('picture') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-sm-4 col-form-label">Caption</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="caption" value="{{ old('caption') }}" required>
                </div>
            </div>

            <a type="button" href="{{ route('admin.gallery.data') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
