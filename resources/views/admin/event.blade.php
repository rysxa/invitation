@extends('admin.layouts.app')
@section('title', 'Wedding Event Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @can('view', App\Event::class)
            @if ($event->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Perhatikan!</strong> Pastikan halaman ini sudah ada data, jika belum silahkan Add New!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif ($event[0]->status == 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Perhatikan!</strong> Jika Status kamu Nonaktif berarti akun kamu ditangguhkan silahkan hubungi <a
                        href="/">admin</a> ! Terima kasih.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                {{ '' }}
            @endif
        @endcan

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Wedding User Page</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @can('create', App\Event::class)
                    @if ($event->isEmpty() && $role == 'user')
                        <a href="{{ route('admin.event.add', $user) }}" class="nav-link">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add
                                    New</i></button>
                        </a>
                    @elseif ($role == 'admin')
                        <a href="{{ route('admin.event.add', $user) }}" class="nav-link">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Add
                                    New</i></button>
                        </a>
                    @elseif (($event[0]->title) && $role == 'user')
                        {{ '' }}
                    @endif
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date Event</th>
                                <th>Username</th>
                                <th>Name Man</th>
                                <th>Name Woman</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($event as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($d->created_at)) }}</td>
                                    <td>{{ $d->username_id }}</td>
                                    <td>{{ $d->man_first . ' ' . $d->man_last }}</td>
                                    <td>{{ $d->women_first . ' ' . $d->women_last }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->city }}</td>

                                    <td>
                                        @if ($d->status == 1)
                                            {{ 'Aktif' }}
                                        @else
                                            {{ 'Nonaktif' }}
                                        @endif
                                    </td>
                                    <td>
                                        @can('viewAny', App\Event::class)
                                            <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-detail{{ $d->id }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal"
                                                data-target="#modal-edit{{ $d->id }}"><i class="fa fa-pen"
                                                    aria-hidden="true"></i></button>
                                        @endcan
                                        @can('delete', App\Event::class)
                                            <form action="{{ route('admin.event.delete', $d->id) }}" method="post">
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

    {{-- Modal Detail --}}
    @foreach ($event as $item)
        <div class="modal fade col-12" id="modal-detail{{ $item->id }}" tabindex="-1"
            aria-labelledby="modal-detailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-detailLabel">Detail Event Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label"><b>Title</b></label>
                                <div class="col-sm-10">
                                    {{ $item->title }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_wedding" class="col-sm-2 col-form-label"><b>Date Wedding</b></label>
                                <div class="col-sm-10">
                                    {{ date('F j, Y', strtotime($item->date_wedding)) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-form-label"><b>City</b></label>
                                <div class="col-sm-8">
                                    {{ $item->city }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="caption" class="col-sm-4 col-form-label"><b>Caption</b></label>
                                <div class="col-sm-8">
                                    {{ $item->caption }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="user_man"><b>Name Man</b></label>
                                    {{ $item->man_first . ' ' . $item->man_last }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_women"><b>Name Woman</b></label>
                                    {{ $item->women_first . ' ' . $item->women_last }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="pic_man"><b>Picture Man</b></label>
                                    <img style="width: 90px" src="{{ Storage::url('public/images/' . $item->pic_man) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_women"><b>Picture Woman</b></label>
                                    <img style="width: 90px"
                                        src="{{ Storage::url('public/images/' . $item->pic_women) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="caption_man"><b>Caption Man</b></label>
                                    {{ $item->caption_man }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="caption_women"><b>Caption Woman</b></label>
                                    {{ $item->caption_women }}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="form-group col-md-4">
                                    <label for="ceremony_date"><b>Ceremony Date</b></label>
                                    {{ $item->ceremony_date }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ceremony_time_start"><b>Start Ceremony Time</b></label>
                                    {{ $item->ceremony_time_start }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ceremony_time_end"><b>End Ceremony Time</b></label>
                                    {{ $item->ceremony_time_end }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ceremony_caption" class="col-sm-4 col-form-label"><b>Ceremony
                                        Caption</b></label>
                                <div class="col-sm-8">
                                    {{ $item->ceremony_caption }}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="form-group col-md-4">
                                    <label for="party_date"><b>Party Date---</b></label>
                                    {{ $item->party_date }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="party_time_start"><b>Start Party Time</b></label>
                                    {{ $item->party_time_start }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="party_time_end"><b>End Party Time</b></label>
                                    {{ $item->party_time_end }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="party_caption" class="col-sm-4 col-form-label"><b>Party Caption</b></label>
                                <div class="col-sm-8">
                                    {{ $item->party_caption }}
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-labelledby="modal-editLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-editLabel">Edit Event Wedding</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('admin.event.update', $item->id) }}" method="POST"
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
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $item->title) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_wedding" class="col-sm-2 col-form-label">Date Wedding</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date_wedding"
                                        value="{{ old('date_wedding', $item->date_wedding) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                        name="address">{{ old('address', $item->address) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-form-label">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city"
                                        value="{{ old('city', $item->city) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="caption" class="col-sm-4 col-form-label">Caption</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control"
                                        name="caption">{{ old('caption', $item->caption) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="man_first">Name Man</label>
                                    <input type="text" class="form-control" name="man_first"
                                        value="{{ old('man_first', $item->man_first) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="women_first">Name Woman</label>
                                    <input type="text" class="form-control" name="women_first"
                                        value="{{ old('women_first', $item->women_first) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="man_last">Name Man</label>
                                    <input type="text" class="form-control" name="man_last"
                                        value="{{ old('man_last', $item->man_last) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="women_last">Name Woman</label>
                                    <input type="text" class="form-control" name="women_last"
                                        value="{{ old('women_last', $item->women_last) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="pic_man">Picture Man</label>
                                    <input type="file" class="form-control @error('pic_man') is-invalid @enderror"
                                        name="pic_man" value="{{ old('pic_man', $item->pic_man) }}">
                                    <img style="width: 90px" src="{{ Storage::url('public/images/' . $item->pic_man) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_women">Picture Woman</label>
                                    <input type="file" class="form-control @error('pic_women') is-invalid @enderror"
                                        name="pic_women" value="{{ old('pic_women', $item->pic_women) }}">
                                    <img style="width: 90px"
                                        src="{{ Storage::url('public/images/' . $item->pic_women) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="caption_man">Caption Man</label>
                                    <textarea type="text" class="form-control"
                                        name="caption_man">{{ old('caption_man', $item->caption_man) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="caption_women">Caption Woman</label>
                                    <textarea type="text" class="form-control"
                                        name="caption_women">{{ old('caption_women', $item->caption_women) }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="form-group col-md-4">
                                    <label for="ceremony_date">Ceremony Date</label>
                                    <input type="date" class="form-control" name="ceremony_date"
                                        value="{{ old('ceremony_date', $item->ceremony_date) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ceremony_time_start">Start Ceremony Time</label>
                                    <input type="time" class="form-control" name="ceremony_time_start"
                                        value="{{ old('ceremony_time_start', $item->ceremony_time_start) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ceremony_time_end">End Ceremony Time</label>
                                    <input type="time" class="form-control" name="ceremony_time_end"
                                        value="{{ old('ceremony_time_end', $item->ceremony_time_end) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ceremony_caption" class="col-sm-4 col-form-label">Ceremony Caption</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control"
                                        name="ceremony_caption">{{ old('ceremony_caption', $item->ceremony_caption) }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="form-group col-md-4">
                                    <label for="party_date">Party Date</label>
                                    <input type="date" class="form-control" name="party_date"
                                        value="{{ old('party_date', $item->party_date) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="party_time_start">Start Party Time</label>
                                    <input type="time" class="form-control" name="party_time_start"
                                        value="{{ old('party_time_start', $item->party_time_start) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="party_time_end">End Party Time</label>
                                    <input type="time" class="form-control" name="party_time_end"
                                        value="{{ old('party_time_end', $item->party_time_end) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="party_caption" class="col-sm-4 col-form-label">Party Caption</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control"
                                        name="party_caption">{{ old('party_caption', $item->party_caption) }}</textarea>
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
