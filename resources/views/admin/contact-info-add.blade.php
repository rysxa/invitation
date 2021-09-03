@extends('admin.layouts.app')
@section('title', 'Add Contact Information Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Contact Information</h1>

        <form action="{{ route('admin.contactinfo.create') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="title" value="username_id" hidden>
            <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="wa" class="col-sm-4 col-form-label">Whatsapp</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('wa') is-invalid @enderror" name="wa"
                        value="{{ old('wa') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="twitter" class="col-sm-4 col-form-label">Twitter</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}"
                        placeholder="user twitter">
                </div>
            </div>
            <div class="form-group row">
                <label for="instagram" class="col-sm-4 col-form-label">Instagram</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}"
                        placeholder="user instagram">
                </div>
            </div>
            <div class="form-group row">
                <label for="facebook" class="col-sm-4 col-form-label">Facebook</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}"
                        placeholder="user facebook">
                </div>
            </div>

            <a type="button" href="{{ route('admin.contactinfo.data') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
