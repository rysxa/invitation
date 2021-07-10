@extends('admin.layouts.app')
@section('title', 'Add Event Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Wedding</h1>

        <form action="{{ route('admin.event.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" class="form-control" name="title" value="username_id" hidden>
            <div class="form-group row">
                <label for="title" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="date_wedding" class="col-sm-4 col-form-label">Date Wedding</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="date_wedding" value="{{ old('date_wedding') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="address" value="{{ old('address') }}"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-4 col-form-label">City</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-sm-4 col-form-label">Caption</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="caption" value="{{ old('caption') }}"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="man_first">First Name Man</label>
                    <input type="text" class="form-control" name="man_first" value="{{ old('man_first') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="women_first">First Name Woman</label>
                    <input type="text" class="form-control" name="women_first" value="{{ old('women_first') }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="man_last">Last Name Man</label>
                    <input type="text" class="form-control" name="man_last" value="{{ old('man_last') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="women_last">Last Name Woman</label>
                    <input type="text" class="form-control" name="women_last" value="{{ old('women_last') }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="pic_man">Picture Man</label>
                    <input type="file" class="form-control @error('pic_man') is-invalid @enderror" name="pic_man"
                        value="{{ old('pic_man') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="pic_women">Picture Woman</label>
                    <input type="file" class="form-control @error('pic_women') is-invalid @enderror" name="pic_women"
                        value="{{ old('pic_women') }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="caption_man">Caption Man</label>
                    <textarea type="text" class="form-control" name="caption_man"
                        value="{{ old('caption_man') }}"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="caption_women">Caption Woman</label>
                    <textarea type="text" class="form-control" name="caption_women"
                        value="{{ old('caption_women') }}"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="form-group col-md-4">
                    <label for="ceremony_date">Ceremony Date</label>
                    <input type="date" class="form-control" name="ceremony_date" value="{{ old('ceremony_date') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="ceremony_time_start">Start Ceremony Time</label>
                    <input type="time" class="form-control" name="ceremony_time_start"
                        value="{{ old('ceremony_time_start') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="ceremony_time_end">End Ceremony Time</label>
                    <input type="time" class="form-control" name="ceremony_time_end"
                        value="{{ old('ceremony_time_end') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="ceremony_caption" class="col-sm-4 col-form-label">Ceremony Caption</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="ceremony_caption"
                        value="{{ old('ceremony_caption') }}"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="form-group col-md-4">
                    <label for="party_date">Party Date</label>
                    <input type="date" class="form-control" name="party_date" value="{{ old('party_date') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="party_time_start">Start Party Time</label>
                    <input type="time" class="form-control" name="party_time_start"
                        value="{{ old('party_time_start') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="party_time_end">End Party Time</label>
                    <input type="time" class="form-control" name="party_time_end" value="{{ old('party_time_end') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="party_caption" class="col-sm-4 col-form-label">Party Caption</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="party_caption"
                        value="{{ old('party_caption') }}"></textarea>
                </div>
            </div>
            <a type="button" href="{{ route('admin.data.event') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
