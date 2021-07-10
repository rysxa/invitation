@extends('admin.layouts.app')
@section('title', 'Add Gallery Caption Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Gallery Caption</h1>

        <form action="{{ route('admin.gallery-head.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" class="form-control" name="title" value="username_id" hidden>
            <div class="form-group row">
                <label for="head_story" class="col-sm-4 col-form-label">Caption Story</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="head_story" value="{{ old('head_story') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="head_gallery" class="col-sm-4 col-form-label">Caption Gallery</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="head_gallery" value="{{ old('head_gallery') }}"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="head_video" class="col-sm-4 col-form-label">Caption Video</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="head_video" value="{{ old('head_video') }}" required>
                </div>
            </div>

            <a type="button" href="{{ route('admin.gallery.head') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
