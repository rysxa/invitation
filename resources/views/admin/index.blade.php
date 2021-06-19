@extends('admin.layouts.app')
@section('title', 'Admin Page')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> --}}

        <!-- Content Row -->
        <div class="row">

            <!-- Border Left Utilities -->
            <div class="col-lg-12">
                <marquee scrolldelay="50" title="Welcome">
                    <h3>Welcome to Wedding Invitation from <a href="http://sefviana.com/">sefviana.com</a></h3>
                </marquee>
                <img class="img-fluid" src="{{ asset('images/wedding-invitation.jpg') }}" alt="wedding-invitation">

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
