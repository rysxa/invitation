@extends('admin.layouts.app')
@section('title', 'Add Gallery Caption Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Gallery Caption</h1>

        <form action="{{ route('admin.gallery-head.create', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <?php $data = App\Models\User::all('username'); ?>
            @if ($role == 'user')
                <input type="text" class="form-control" name="username_id" value="{{ Auth::user()->username }}" hidden>
            @else
                <div class="form-group row">
                    <label for="username_id" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <select name="username_id" class="form-control selectpicker" data-live-search="true"
                            data-max-options="5">
                            @foreach ($data as $item)
                                <option value="{{ $item->username }}"
                                    {{ old('username_id') == "$item->username" ? selected : '' }}>
                                    {{ $item->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label for="head_picture" class="col-sm-4 col-form-label">Picture Dashboard</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('head_picture') is-invalid @enderror" name="head_picture"
                        value="{{ old('head_picture') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="head_story" class="col-sm-4 col-form-label">Caption Story</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('head_story') is-invalid @enderror" name="head_story"
                        value="{{ old('head_story') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="head_gallery" class="col-sm-4 col-form-label">Caption Gallery</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('head_gallery') is-invalid @enderror" name="head_gallery"
                        value="{{ old('head_gallery') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="head_video" class="col-sm-4 col-form-label">Caption Video</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('head_video') is-invalid @enderror" name="head_video"
                        value="{{ old('head_video') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="url_video" class="col-sm-4 col-form-label">URL Video Youtube</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('url_video') is-invalid @enderror" name="url_video"
                        value="{{ old('url_video') }}" placeholder="Disini kode akhir saja URL pada Youtube">
                </div>
            </div>
            <img src="{{ asset('images/url.png') }}" alt="url_video"><br><br>

            <a type="button" href="{{ route('admin.gallery.head', $user) }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
