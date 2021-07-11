@extends('admin.layouts.app')
@section('title', 'Add Story Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Story</h1>

        <form action="{{ route('admin.story.create', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <?php $datas = App\Models\User::all('username'); ?>
            @if ($role == 'user')
                <input type="text" class="form-control" name="username_id" value="{{ Auth::user()->username }}" hidden>
            @else
                <div class="form-group row">
                    <label for="username_id" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <select name="username_id" class="form-control selectpicker" data-live-search="true"
                            data-max-options="5">
                            @foreach ($datas as $item)
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
                <label for="subject" class="col-sm-4 col-form-label">Subject</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                        value="{{ old('subject') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="picture" class="col-sm-4 col-form-label">Picture</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture"
                        value="{{ old('picture') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-4 col-form-label">Date</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                        value="{{ old('date') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-sm-4 col-form-label">Message</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message"
                        value="{{ old('message') }}" required></textarea>
                </div>
            </div>

            <a type="button" href="{{ route('admin.story.data', $user) }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
