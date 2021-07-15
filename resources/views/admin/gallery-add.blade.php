@extends('admin.layouts.app')
@section('title', 'Add Gallery Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Gallery</h1>

        <form action="{{ route('admin.gallery.create', $user) }}" method="POST" enctype="multipart/form-data">
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

            <a type="button" href="{{ route('admin.gallery.data', $user) }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
