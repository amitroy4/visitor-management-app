<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ভিজিটরের তথ্য</title>


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css"
        integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

         <style>
        /* Custom CSS to remove underline from all anchor tags */
        a {
            text-decoration: none;
        }

        /* Optional: Styling for hover state */
        a:hover {
            text-decoration: underline;
        }
        .form-control{
            padding: .5rem 1rem;
            font-size: 14px;
            font-weight: 300;
            color: var(--bs-body-color);
        }

    </style>


</head>

<body>
    <div class='bg-info-subtle bg-body-secondary' style="height: 100vh;">

        <div class='position-absolute top-50 start-50 translate-middle' style='width:50%'>
            <div class=''>
                <div class="mb-3 text-secondary d-flex justify-content-end ">
                    <button type="button" class="btn btn-dark fw-semibold fs-8 shadow d-flex align-items-end "
                        style='margin-top:5%' data-bs-toggle="modal" data-bs-target="#exampleModal">চেক আউট</button>

                </div>
                <div class='rounded-4 shadow p-3 mb-5 bg-body-tertiary bg-light'>

                    <div class='d-flex justify-content-center text-secondary m-3 fw-semibold fs-5'>ভিজিটরের তথ্য দিন</div>
                    <form action="{{route('visitor.store')}}" method="POST">
                        @csrf

                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label for="exampleInputEmail1" class="form-label">তারিখঃ</label>
                                <input type="text" class="form-control" id="visit_date" aria-describedby="emailHelp"
                                    name='visit_date' readonly>
                            </div>
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">ভিজিটর সংখ্যাঃ</label>
                                <input type="text" class="form-control" id="visitor_number" name="visitor_number" placeholder="ভিজিটর নাম্বার">
                                @error('visitor_number')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">ভিজিটর নামঃ</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="ভিজিটর নাম">
                                @error('name')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">মোবাইল নাম্বারঃ</label>
                                <input type="text" class="form-control" id="mobileNumber" name="contact_number" placeholder="মোবাইল নাম্বার">
                                @error('contact_number')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-secondary">
                            <label class="form-label">পরিদর্শনের উদ্দেশ্য:</label>
                            <input type="text" class="form-control" id="purposseOfVisit" name="purposse_of_visit" placeholder="পরিদর্শনের উদ্দেশ্য">
                            @error('purposse_of_visit')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">অ্যাপার্টমেন্ট:</label>
                                <input type="text" class="form-control" id="appartment" name="appartment" placeholder="অ্যাপার্টমেন্ট">
                                @error('appartment')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">ইউনিট নাম্বার:</label>
                                <input type="text" class="form-control" id="unit_number" name="unit_number" placeholder="ইউনিট নাম্বার">
                                @error('unit_number')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">চেক ইন:</label>
                                <input type="time" min="09:00" max="18:00" class="form-control" id="checkin" placeholder=""
                                    name="checkin">
                                @error('checkin')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3 text-secondary col-6">
                                <label class="form-label">চেক আউট:</label>
                                <input type="time" min="09:00" max="18:00" class="form-control" id="checkout" placeholder=""
                                    name="checkout">
                                @error('checkout')
                                <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-20 " style="width: 20%;">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for Check Out Popup --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">চেক আউট</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="form-group mx-sm-3 d-flex justify-content-around">
                            <input type="text" class="form-control" id="searchNamePhoneNumber"
                                placeholder="নাম/মোবাইল নাম্বার">
                            <button type="submit" class="btn btn-primary ms-2" id="searchNamePhoneNumberBtn"> <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <table class="table table-striped table-to-convert" id="table-to-excel">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">তারিখ</th>
                                    <th scope="col">নাম</th>
                                    <th scope="col">মোবাইল নাম্বার</th>
                                    <th scope="col">অ্যাপার্টমেন্ট</th>
                                    <th scope="col">ইউনিট নাম্বার</th>
                                    <th scope="col">চেক ইন</th>
                                    <th scope="col">চেক আউট</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/fontawesome.min.js"
        integrity="sha512-NeFv3hB6XGV+0y96NVxoWIkhrs1eC3KXBJ9OJiTFktvbzJ/0Kk7Rmm9hJ2/c2wJjy6wG0a0lIgehHjCTDLRwWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Set the current date to the date input field
        window.onload = function () {
            // Get the date input element
            var dateInput = document.getElementById('visit_date');

            // Create a new date object for the current date
            var today = new Date();

            // Get day, month, and year individually
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed, so add 1
            var year = today.getFullYear();
            var formattedDate = year + '-' + month + '-' + day;

            // Set the value of the date input field to the current date
            dateInput.value = formattedDate;
        };


        // Mobile number Validation

        document.addEventListener('DOMContentLoaded', function () {
            var mobileInput = document.getElementById('mobileNumber');

            // Set the default value as '+88 0'
            mobileInput.value = '+88 0';

            // Restrict the input to 11 digits (excluding +88)
            mobileInput.addEventListener('input', function (e) {
                // Get the current value
                var value = e.target.value;

                // Ensure the prefix is always '+88 0'
                if (!value.startsWith('+88 0')) {
                    value = '+88 0' + value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
                }

                // Limit the total length to 14 characters ('+88 0' + 11 digits)
                if (value.length > 15) {
                    value = value.slice(0, 15);
                }

                // Set the formatted value back into the input
                e.target.value = value;
            });

            // Prevent the user from removing the '+88 0' prefix
            mobileInput.addEventListener('keydown', function (e) {
                // If the cursor is at the start (before or on '+88 0') and the user tries to delete
                if ((mobileInput.selectionStart <= 5) && (e.key === 'Backspace' || e.key ===
                        'Delete')) {
                    e.preventDefault(); // Prevent the action
                }
            });
        });

    $(document).ready(function() {
        $('#searchNamePhoneNumberBtn').click(function () {
            var query = $('#searchNamePhoneNumber').val();

            console.log('got namenumber:',query);


            // Perform AJAX request to the server
            $.ajax({
                url: "{{ route('visitor.checkout.search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function (response) {
                    // Clear previous results
                    $('#searchResults').empty();

                    // Display the search results
                    if (response.length > 0) {
                        response.reverse().forEach(function (visitor) {
                            $('#searchResults').append(`<tr>
                            <th >${ visitor.id }</th>
                            <td>${ visitor.visit_date }</td>
                            <td>${ visitor.name }</td>
                            <td>${ visitor.contact_number }</td>
                            <td>${ visitor.appartment }</td>
                            <td>${visitor.unit_number }</td>
                            <td>${ visitor.checkin }</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <!-- Button trigger modal -->
                                    <form action="{{route('visitor.checkout','')}}/${visitor.id}" method="POST">
                                        @csrf
                                        @method('Post')
                                        <button class="text-secondary delete-btn btn">
                                            <i class="fa-duotone fa-solid fa-calendar-check text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                                <td>${ visitor.checkout }</td>


                            </td>
                        </tr> `);
                        });
                    } else {
                        $('#searchResults').append('<p>No results found</p>');
                    }
                }
            });
        });
});

    </script>

</body>

</html>
