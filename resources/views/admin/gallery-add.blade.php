@extends('admin.layouts.app')
@section('title', 'Add Gallery Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Gallery</h1>

        <form action="{{ route('admin.gallery.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($role == 2)
                <input type="text" class="form-control" name="slug_id" value="{{ Auth::user()->id }}" hidden>
            @else
                <div class="form-group row">
                    <label for="slug_id" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <select name="slug_id" class="form-control selectpicker" data-live-search="true"
                            data-max-options="5">
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{ old('slug_id') == "$item->id" ? selected : '' }}>
                                    {{ $item->slug }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
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
                    <input type="text" class="form-control @error('picture') is-invalid @enderror" name="caption"
                        value="{{ old('caption') }}" required>
                </div>
            </div>

            <a type="button" href="{{ route('admin.gallery.data') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
