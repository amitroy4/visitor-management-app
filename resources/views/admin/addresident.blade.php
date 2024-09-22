@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('resident')}}">Resident</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Resident</li>
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
        <h7 class="card-header bg-white">
            <div class="  justify-content-between pt-2 d-flex">
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <h2>Add Resident</h2>
                </div>
                <div class=" p-2">
                    <a href="{{ route('resident') }}"><button class="btn btn-info">Back</button></a>
                </div>
            </div>
        </h7>


        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <h5>Resident Information</h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter resident name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter resident phone number">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nid">NID:</label>
                                <input type="text" class="form-control" id="nid" name="nid"
                                    placeholder="Enter resident NID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    placeholder="Enter resident occupation">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="family-member">Family Member:</label>
                                <input type="text" class="form-control" id="family-member" name="family-member"
                                    placeholder="Enter number">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {{-- <label for="nid">NID:</label>
                                <input type="text" class="form-control" id="nid" name="nid"
                                    placeholder="Enter resident NID"> --}}
                            </div>
                        </div>
                    </div>
                    <h5>Emergency Information</h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="relative-name">Name:</label>
                                <input type="text" class="form-control" id="relative-name" name="relative-name"
                                    placeholder="Enter relative's name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="relative-number">Relation:</label>
                                <input type="text" class="form-control" id="relative-number" name="relative-number"
                                    placeholder="Enter relative's number">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="relative-number">Number:</label>
                                <input type="text" class="form-control" id="relative-number" name="relative-number"
                                    placeholder="Enter relative's number">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button at the End -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
@push('script')



@endpush
