@extends('admin.layouts.app')
@section('title', 'Contact Information Page')
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
                @can('create', App\Contact_info::class)
                    <a href="{{ route('admin.contactinfo.add') }}" class="nav-link">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                                Contact Information</i></button>
                    </a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>WA</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->wa }}</td>
                                    <td>{{ $d->twitter }}</td>
                                    <td>{{ $d->instagram }}</td>
                                    <td>{{ $d->facebook }}</td>
                                    <td>
                                        @can('update', App\Contact_info::class)
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-edit{{ $d->id }}"><i class="fa fa-pen"
                                                    aria-hidden="true"></i></button>
                                        @endcan
                                        @can('delete', App\Contact_info::class)
                                            <form action="{{ route('admin.contact-info.delete', $d->id) }}" method="post">
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
                        <h5 class="modal-title" id="modal-editLabel">Edit Contact Info Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('admin.contact-info.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                        name="address">{{ old('address', $item->address) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="phone"
                                        value="{{ old('phone', $d->phone) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $d->email) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="wa" class="col-sm-2 col-form-label">Whatsapp</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="wa" value="{{ old('wa', $d->wa) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{ old('twitter', $d->twitter) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ old('instagram', $d->instagram) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ old('facebook', $d->facebook) }}">
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
