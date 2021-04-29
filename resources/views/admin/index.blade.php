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
        <div class="col-lg-6">

            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <a href="#">Title</a>
                </div>
            </div>
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <a href="#">Hello</a>
                </div>
            </div>
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <a href="#">Event</a>
                </div>
            </div>

        </div>

      </div>

  </div>
  <!-- /.container-fluid -->
@endsection