@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Terima kasih sudah bergabung, Tinggal satu langkah lagi untuk dapat mengakses Wedding Invitation kamu,
                Silahkan isi semua data pada menu <b>Master</b> !.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Border Left Utilities -->
            <div class="col-lg-12">
                <marquee scrolldelay="50" title="Welcome">
                    <h3>Welcome to Wedding Invitation from <a href="http://sefviana.com/">sefviana.com</a></h3>
                </marquee>
                <img class="img-fluid" src="{{ asset('images/wedding-invitation.jpg') }}" alt="wedding-invitation">

            </div>
            <br>
            <h5>Cek Halaman kamu >> <a href="{{ route('front.data.wish', $user) }}" class="badge badge-primary">Web
                    Kamu</a>
                atau bisa juga
                di sidebar <b>Master -> Frontend Web</b></h5>

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
