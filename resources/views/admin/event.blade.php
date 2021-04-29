@extends('admin.layouts.app')
@section('title', 'Wedding User Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Wedding User Page</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.event.add') }}" class="nav-link">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add New
                            Event</i></button>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date Event</th>
                                <th>Name Man</th>
                                <th>Name Woman</th>
                                <th>Address</th>
                                <th>City</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($d->created_at)) }}</td>
                                    <td>{{ $d->user_man }}</td>
                                    <td>{{ $d->user_women }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->city }}</td>
                                    <td><button type="button" class="btn btn-success fa-circle"><i class="fa fa-eye"
                                                aria-hidden="true"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-addLabel">Add New Event Wedding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_wedding" class="col-sm-2 col-form-label">Date Wedding</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control-plaintext" name="date_wedding">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" name="address">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
