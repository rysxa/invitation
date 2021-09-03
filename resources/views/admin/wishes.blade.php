@extends('admin.layouts.app')
@section('title', 'Friends Wishes')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @can('view', App\Wish::class)
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Halaman ini untuk melihat siapa saja yang telah memberi salam melalui website.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endcan

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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>WA</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($wish as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->m_slug->slug }}</td>
                                    <td>{{ $d->name }}</td>
                                    @if ($d->status == 1)
                                        <td>Hadir</td>
                                    @else
                                        <td>Tidak Hadir</td>
                                    @endif
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->message }}</td>
                                    <td><a target="_blank" href="https://wa.me/62{{ $d->phone }}" type="button"
                                            class="btn btn-success btn-circle btn-sm"><i class="fa fa-paper-plane"></i></a>
                                    </td>
                                    <td>
                                        @can('update', App\Wish::class)
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-edit{{ $d->id }}"><i class="fa fa-pen"
                                                    aria-hidden="true"></i></button>
                                        @endcan
                                        @can('delete', App\Wish::class)
                                            <form action="{{ route('admin.message.delete', $d->id) }}" method="post">
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

    @foreach ($wish as $item)
        {{-- Modal Edit --}}
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-labelledby="modal-editLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-editLabel">Edit Attandance Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('admin.message.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($role == 2)
                                <input type="text" class="form-control" name="slug_id"
                                    value="{{ old('slug_id', $item->slug_id) }}" hidden>
                            @else
                                <div class="form-group row">
                                    <label for="slug_id" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="slug_id"
                                            value="{{ old('slug_id', $item->slug_id) }}" hidden>
                                        <p class="pt-2">{{ $item->m_slug->slug }}</p>
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
                                    <textarea type="text" class="form-control"
                                        name="message">{{ old('message', $d->message) }}</textarea>
                                </div>
                            </div>
                            @if ($role == 1)
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="status"
                                            value="{{ old('status', $d->status) }}">
                                        <span>1: Aktif 0: Nonaktif</span>
                                    </div>
                                </div>
                            @endif

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
