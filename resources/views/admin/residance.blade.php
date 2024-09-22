@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Residance</li>
            </ol>
          </nav>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Download Call log</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Downnload visitor log</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i>Search</a>
        </div>
    </div>


    <div class="card">
        <h7 class="card-header">
            <div class="row justify-content-end pt-2 d-flex">
                {{-- <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <input type="text" class="form-control" id="searchName" placeholder="নাম">
                    <button onclick="#" class="btn btn-info ml-1 searchNameBtn">Submit</button>
                </div>
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <input type="text" class="form-control" id="unitNumber" placeholder="ইউনিট নাম্বার">
                    <button onclick="#" class="btn btn-info ml-1">Submit</button>
                </div> --}}
                <div class=" p-2">
                    <a href="{{ route('addresidance') }}"><button class="btn btn-info">Add Residance</button></a>
                </div>
            </div>
        </h7>


        <div class="card-body">
            <!-- Content Row -->

        </div>
    </div>

</div>


@endsection
@push('script')



@endpush
