@extends('admin.layouts.app')
@section('title', 'Contact Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @can('view', App\Contact::class)
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Halaman ini untuk melihat siapa saja yang telah menghubungi kamu melalui website.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endcan

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Contact Page</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Sent Back by WA</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($contact as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->username_id }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->message }}</td>
                                    <td><a href="https://wa.me/62{{ $d->phone }}" type="button"
                                            class="btn btn-success btn-circle btn-sm"><i class="fa fa-paper-plane"></i></a>
                                    </td>
                                    <td>
                                        @can('update', App\Contact::class)
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-edit{{ $d->id }}"><i class="fa fa-pen"
                                                    aria-hidden="true"></i></button>
                                        @endcan
                                        @can('delete', App\Contact::class)
                                            <form action="{{ route('admin.contact.delete', $d->id) }}" method="post">
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

    @foreach ($contact as $item)
        {{-- Modal Edit --}}
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-labelledby="modal-editLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-editLabel">Edit Contact Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('admin.contact.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($role == 'user')
                                <input type="text" class="form-control" name="username_id"
                                    value="{{ old('username_id', $item->username_id) }}" hidden>
                            @else
                                <div class="form-group row">
                                    <label for="username_id" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username_id"
                                            value="{{ old('username_id', $item->username_id) }}" readonly>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $d->name) }}">
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
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="phone"
                                        value="{{ old('phone', $d->phone) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea type="number" class="form-control"
                                        name="message">{{ old('message', $d->message) }}</textarea>
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
@prepend('datatables')
    {{-- Datatables --}}
    <script src="{{ asset('admin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [
                    [2, "desc"]
                ]
            });
        });
    </script>
@endprepend
