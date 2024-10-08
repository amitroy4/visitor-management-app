@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
        <h5 class="card-header">
            <div class="row justify-content-between pt-2 d-flex">
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <label class="form-label mt-2 mr-2">নাম:</label>
                    <input type="text" class="form-control" id="searchName" placeholder="নাম">
                </div>
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <label class="form-label mt-2 mr-2" style="width: 190px;">ইউনিট নাম্বার:</label>
                    <input type="text" class="form-control" id="unitNumber" placeholder="ইউনিট নাম্বার">
                </div>
                <div class="form-group mx-sm-3 d-flex justify-content-around p-2">
                    <label class="form-labe mt-2 mr-2">ডেট:</label>
                    <input type="date" class="form-control " id="searchDate" placeholder="ডেট">
                </div>
                <div class=" p-2">
                    <button onclick="exportToPDF()" class="btn btn-info">Export to PDF</button> <button
                        onclick="exportToExcel()" class="btn btn-secondary">Export to Excel</button>
                </div>
            </div>
        </h5>


        <div class="card-body">
            <!-- Content Row -->
            <table class="table table-striped table-to-convert" id="table-to-excel">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="font-family: 'nikosh';">তারিখ</th>
                        <th scope="col" style="font-family: 'nikosh';">নাম</th>
                        <th scope="col" style="font-family: 'nikosh';">মোবাইল নাম্বার</th>
                        <th scope="col" style="font-family: 'nikosh';">পরিদর্শনের উদ্দেশ্য</th>
                        <th scope="col" style="font-family: 'nikosh';">অ্যাপার্টমেন্ট</th>
                        <th scope="col" style="font-family: 'nikosh';">ইউনিট নাম্বার</th>
                        <th scope="col" style="font-family: 'nikosh';">চেক ইন</th>
                        <th scope="col" style="font-family: 'nikosh';">চেক আউট</th>
                        <th scope="col" style="font-family: 'nikosh';">ভিজিটর নাম্বার</th>
                        <th scope="col" style="font-family: 'nikosh';">Action</th>
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
                        <td>{{ Carbon\Carbon::parse($visitor->checkin)->format('g:i A') }}</td>
                        <td>{{ $visitor->checkout ? Carbon\Carbon::parse($visitor->checkout)->format('g:i A'): 'N/A' }}
                        </td>
                        <td>{{ $visitor->visitor_number }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <!-- Button trigger modal -->

                                <button class="text-primary editModal btn" data-toggle="modal"
                                    data-target="#exampleModal" data-visitor-id="{{$visitor->id}}">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </button>
                                <form action="{{route('visitor.destroy',$visitor->id)}}" method="POST"
                                    onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-secondary delete-btn btn">
                                        <i class="fa-solid fa-trash-can text-danger"></i>
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
    function handleTable(data) {
        let rows = '';
        console.log(data);

        $.each(data.reverse(), function (index, visitor) {
            // Convert checkin and checkout times to 12-hour format with AM/PM
            const checkinTime = new Date(
                    `1970-01-01T${visitor.checkin}Z`)
                .toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });
            const checkoutTime = new Date(
                    `1970-01-01T${visitor.checkout}Z`)
                .toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });
            rows += `
                            <tr>
                            <th scope="row">${ visitor.id }</th>
                            <td>${ visitor.visit_date }</td>
                            <td>${ visitor.name }</td>
                            <td>${ visitor.contact_number }</td>
                            <td>${visitor.purposse_of_visit }</td>
                            <td>${ visitor.appartment }</td>
                            <td>${visitor.unit_number }</td>
                            <td>${ checkinTime }</td>
                            <td>${ (checkoutTime=="Invalid Date")?"N/A": checkoutTime}</td>
                            <td>${ visitor.visitor_number }</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <!-- Button trigger modal -->

                                    <button class="text-primary editModal btn" data-toggle="modal" type="button"
                                        data-target="#exampleModal" data-visitor-id="${visitor.id}">
                                        <i class="fa-solid fa-pen-to-square text-primary"></i>
                                    </button>
                                    <form action="{{route('visitor.destroy','')}}/${visitor.id}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-secondary delete-btn btn notifyBtnToaster">
                                            <i class="fa-solid fa-trash-can text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr> `;
        });
        $('.table-to-convert tbody').html(rows);
    }

    function confirmDelete() {
        return confirm('Are you sure you want to delete this Visitor?');
    }
    $(document).ready(function () {
        $('#searchName').on('keyup', function () {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('visitor.search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function (data) {
                    handleTable(data)
                }
            });
        });
        $('#unitNumber').on('keyup', function () {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('visitor.search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function (data) {
                    handleTable(data)
                }
            });
        });
        $('#searchDate').on('change', function () {
            let query = $(this).val();
            console.log(query);


            $.ajax({
                url: "{{ route('visitor.search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function (data) {
                    handleTable(data)
                }
            });
        });

        $('.editModal').on('click', function (event) {
            event.preventDefault();
            console.log('clicked');

            var visitorId = $(this).data('visitor-id');
            console.log(visitorId);
            // window.alert(visitorId);
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
            console.log(formData);

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

    function exportToExcel() {
        var table = document.getElementById('table-to-excel');
        var wb = XLSX.utils.table_to_book(table, {
            sheet: "Sheet1"
        });

        // Get the worksheet
        var ws = wb.Sheets['Sheet1'];

        // Get the range of the sheet
        var range = XLSX.utils.decode_range(ws['!ref']);

        // Iterate through each row and remove the last column
        for (var row = range.s.r; row <= range.e.r; row++) {
            // Construct the cell address of the last column
            var cell_address = XLSX.utils.encode_cell({
                r: row,
                c: range.e.c
            });
            // Delete the last cell
            delete ws[cell_address];
        }

        // Update the sheet's range (remove the last column from the range)
        range.e.c--;
        ws['!ref'] = XLSX.utils.encode_range(range);

        // Write the modified workbook to a file
        XLSX.writeFile(wb, 'TableData.xlsx');
    }

    // async function exportToPDF() {
    //     const {
    //         jsPDF
    //     } = window.jspdf;
    //     const doc = new jsPDF();

    //     // Get table data
    //     const table = document.querySelector('.table-to-convert');
    //     const rows = Array.from(table.querySelectorAll('tbody tr'));

    //     // Extract data, excluding the last column
    //     const data = rows.map(row => {
    //         const cells = Array.from(row.querySelectorAll('td, th'));
    //         return cells.slice(0, -1).map(cell => cell.textContent.trim());
    //     });

    //     // Get header data
    //     const headers = Array.from(table.querySelectorAll('thead th'))
    //     .slice(0, -1)
    //     .map(header => header.textContent.trim());


    //     // Add the custom Bangla font (base64-encoded font string)
    //     const base64Font = await fetchFont("/admin/TiroBangla-Regular.ttf"); // Path to the TTF file
    //     doc.addFileToVFS("Nikosh.ttf", base64Font);
    //     doc.addFont("Nikosh.ttf", "Nikosh", "normal");

    //     // Set the font for Bangla text
    //     doc.setFont("Nikosh");

    //     // Render the table to the PDF
    //     doc.autoTable({
    //         head: [
    //             headers
    //         ],
    //         body: data,
    //         styles: {
    //             font: 'Nikosh'
    //         }
    //     });

    //     // Save the generated PDF
    //     doc.save('TableData.pdf');
    // }


    function exportToPDF() {
        // Get the table element
        var table = document.getElementById('table-to-excel');

        // Loop through each row of the table
        for (var i = 0; i < table.rows.length; i++) {
            var row = table.rows[i];
            // Remove the last cell from each row
            row.deleteCell(-1);
        }


        for (var i = 0; i < table.rows.length; i++) {
            var row = table.rows[i];

            // Apply different background colors for odd and even rows
            if (i % 2 === 0) {
                // Even row - apply color 1
                row.style.backgroundColor = "#e8e9eb"; // Light gray, you can change the color
            } else {
                // Odd row - apply color 2
                row.style.backgroundColor = "#ffffff"; // White, you can change the color
            }
        }

        // Now get the updated outer HTML without the last column
        var tableHtml = table.outerHTML;

        // Send HTML to the server via AJAX
        fetch('/dashboard/visitor/generatePdf', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    html: tableHtml
                })
            })
            .then(response => response.blob())
            .then(blob => {
                // Create a link element and click it to download the PDF
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'General_report.pdf';
                link.click();
            })
            .catch(error => console.error('Error:', error));
    }

    // Helper function to load the TTF file and convert it to base64
    async function fetchFont(url) {
        const response = await fetch(url);
        const buffer = await response.arrayBuffer();
        let binary = '';
        const bytes = new Uint8Array(buffer);
        for (let i = 0; i < bytes.byteLength; i++) {
            binary += String.fromCharCode(bytes[i]);
        }
        return window.btoa(binary); // Convert to base64
    }

</script>


@endpush
