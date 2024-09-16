@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">তারিখ</th>
                <th scope="col">নাম</th>
                <th scope="col">মোবাইল নাম্বার</th>
                <th scope="col">পরিদর্শনের উদ্দেশ্য</th>
                <th scope="col">অ্যাপার্টমেন্ট</th>
                <th scope="col">ইউনিট নাম্বার</th>
                <th scope="col">চেক ইন</th>
                <th scope="col">চেক আউট</th>
                <th scope="col">ভিজিটর নাম্বার</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitors as $visitor)
            <tr>
                <th scope="row">{{ $visitor->id }}</th>
                <td>{{ $visitor->visit_date }}</td>
                <td>{{ $visitor->name }}</td>
                <td>{{ $visitor->contact_number }}</td>
                <td>{{ $visitor->purposse_of_visit }}</td>
                <td>{{ $visitor->appartment }}</td>
                <td>{{ $visitor->unit_number }}</td>
                <td>{{ $visitor->checkin }}</td>
                <td>{{ $visitor->checkout }}</td>
                <td>{{ $visitor->visitor_number }}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <!-- Button trigger modal -->

                        <button class="text-primary border-0 bg-transparent p-0 delete-btn editModal"
                            data-toggle="modal" data-target="#exampleModal" data-visitor-id="{{$visitor->id}}">
                            Edit
                        </button>
                        <form action="{{route('visitor.destroy',$visitor->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-danger border-0 bg-transparent p-0 delete-btn">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $visitors->links('pagination::bootstrap-4') }}
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ভিজিটরের তথ্য আপডেট</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='rounded-4 shadow p-3 mb-5 bg-body-tertiary bg-light'>
                    <form id="visitorForm" method="POST">
                        @csrf
                        <input type="hidden" name="visitiorId" id="visitorId">
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label for="exampleInputEmail1" class="form-label">তারিখ:</label>
                                <input type="text" class="form-control" id="visit_date" aria-describedby="emailHelp"
                                    name='visit_date' readonly>
                            </div>
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">ভিজিটর নাম্বার:</label>
                                <input type="text" class="form-control" id="visitor_number" name="visitor_number">
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">নাম:</label>
                                <input type="text" class="form-control" id="visitorName" name="name">
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">মোবাইল নাম্বার:</label>
                                <input type="text" class="form-control" id="mobileNumber" name="contact_number">
                            </div>
                        </div>
                        <div class="mb-3 text-secondary">
                            <label class="form-label">পরিদর্শনের উদ্দেশ্য:</label>
                            <input type="text" class="form-control" id="purposseOfVisit" name="purposse_of_visit">
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">অ্যাপার্টমেন্ট:</label>
                                <input type="text" class="form-control" id="appartment" name="appartment">
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">ইউনিট নাম্বার:</label>
                                <input type="text" class="form-control" id="unit_number" name="unit_number">
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">চেক ইন:</label>
                                <input type="time" min="09:00" max="18:00" class="form-control" id="checkin"
                                    name="checkin">
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">চেক আউট:</label>
                                <input type="time" min="09:00" max="18:00" class="form-control" id="checkout"
                                    name="checkout">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-20 updateModal"
                                style="width: 20%;">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')

<script>
    $(document).ready(function () {
        let idpass;

        $('.editModal').on('click', function (event) {
            event.preventDefault();
            var visitorId = $(this).data('visitor-id');
            $.ajax({
                url: '{{ route("visitor.edit") }}',
                type: 'get',
                data: {
                    id: visitorId
                },
                success: function (response) {
                    $('#visitorId').val(response.data.id);
                    $('#visit_date').val(response.data.visit_date);
                    $('#visitor_number').val(response.data.visitor_number);
                    $('#visitorName').val(response.data.name);
                    $('#mobileNumber').val(response.data.contact_number);
                    $('#purposseOfVisit').val(response.data.purposse_of_visit);
                    $('#appartment').val(response.data.appartment);
                    $('#unit_number').val(response.data.unit_number);
                    $('#checkin').val(response.data.checkin);
                    $('#checkout').val(response.data.checkout);
                },
                error: function (xhr) {
                    console.error('Error: ' + xhr.status + ' ' + xhr.statusText);
                }
            });
        });
        $('#visitorForm').on('submit', function (event) {
            event.preventDefault(); // Prevent traditional form submission

            var formData = $(this).serialize(); // Serialize the form data
            // console.log(formData);

            $.ajax({
                url: '{{ route("visitor.update") }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('.editModal').modal('hide');
                    // Show a success message or close the modal
                    // alert('Visitor data updated successfully!');
                    location.reload(); // Optionally reload the page to see the updated data
                },
                error: function (xhr) {
                    // Handle errors
                    console.error('Error: ' + xhr.status + ' ' + xhr.statusText);
                    alert('An error occurred while updating data.');
                }
            });
        });

    });

</script>
@endpush
