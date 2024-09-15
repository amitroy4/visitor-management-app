<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ভিজিটরের তথ্য</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS to remove underline from all anchor tags */
        a {
            text-decoration: none;
        }

        /* Optional: Styling for hover state */
        a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <div class='bg-info-subtle bg-body-secondary' style="height: 100vh;">

        <div class='position-absolute top-50 start-50 translate-middle' style='width:50%'>
            <div class=''>
                <div class="mb-3 text-secondary d-flex justify-content-end ">
                    <a href="{{route('dashboard')}}">
                        <button type="button" class="btn btn-dark fw-semibold fs-8 shadow d-flex align-items-end "
                            style='margin-top:5%'>Login</button>
                    </a>
                </div>
                <div class='rounded-4 shadow p-3 mb-5 bg-body-tertiary bg-light'>

                    <div class='d-flex justify-content-center text-secondary m-3 fw-semibold fs-5'>ভিজিটরের তথ্য দিন
                    </div>
                    <form action="{{route('visitor.store')}}" method="POST">
                        @csrf

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
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
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
                            <button type="submit" class="btn btn-primary w-20 " style="width: 20%;">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script>
        // Set the current date to the date input field
        window.onload = function () {
            // Get the date input element
            var dateInput = document.getElementById('visit_date');

            // Create a new date object for the current date
            var today = new Date();

            // Get day, month, and year individually
            var day = String(today.getDate()).padStart(2, '0');
            var month = today.getMonth(); // Get the month (zero-indexed)
            var year = today.getFullYear();

            // Convert the day and year into Bangla numerals
            var banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

            function convertToBanglaNumerals(number) {
                return number.toString().split('').map(function (digit) {
                    return banglaNumbers[digit];
                }).join('');
            }

            // Bangla month names
            var banglaMonths = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
                'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
            ];

            // Convert day and year to Bangla
            var banglaDay = convertToBanglaNumerals(day);
            var banglaYear = convertToBanglaNumerals(year);

            // Get the Bangla month name
            var banglaMonth = banglaMonths[month];

            // Format the date as Bangla DD-MM-YYYY
            var formattedDate = banglaDay + ' ' + banglaMonth + ',' + banglaYear;

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

    </script>
</body>

</html>
