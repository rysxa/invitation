@extends('admin.layouts.app')
@section('title', 'Add Contact Information Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Contact Information</h1>

        <form action="{{ route('admin.contactinfo.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="wa" class="col-sm-4 col-form-label">Whatsapp</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="wa" value="{{ old('wa') }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="twitter" class="col-sm-4 col-form-label">Twitter</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}"
                        placeholder="user twitter" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="instagram" class="col-sm-4 col-form-label">Instagram</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}"
                        placeholder="user instagram" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="facebook" class="col-sm-4 col-form-label">Facebook</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}"
                        placeholder="user facebook" required>
                </div>
            </div>

            <a type="button" href="{{ route('admin.gallery.head') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
