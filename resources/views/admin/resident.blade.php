@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resident</li>
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
            <div class="row justify-content-between pt-2 d-flex">
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <h2>Resident List</h2>
                </div>
                <div class=" p-2">
                    <a href="{{ route('addresident') }}"><button class="btn btn-info">Add Resident</button></a>
                </div>
            </div>
        </h7>


        <div class="card-body">
            <div class="d-flex justify-content-around">
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Go</button>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Go</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>NID</th>
                        <th>Occupation</th>
                        <th>Family Member</th>
                        <th>Relative Name</th>
                        <th>Relative Relation</th>
                        <th>Relative Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Amit</td>
                        <td>0152485</td>
                        <td>22885566</td>
                        <td>Student</td>
                        <td>6</td>
                        <td>Arif</td>
                        <td>Friend</td>
                        <td>123123123</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>


@endsection
@push('script')



@endpush
