@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')

<style>
    table {
        font-size: 10px !important;
    }

    .importexport i, .deleteSelectedbtn i{
        font-size: smaller !important;
    }
    /* .lni {
        font-size: smaller !important;
    } */

    #importInquiryPopup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        width: 100%;
        max-width: 500px;
        max-height: 80vh;
        /* Set maximum height to 80% of viewport height */
        overflow-y: auto;
        /* Enable vertical scrollbar when content exceeds max height */
    }

    /* .submitImportbtn {
        border-radius: 10px;
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        cursor: pointer;
        padding: 10px 5px;
    } */

    .submitImportbtn2 {
        width: 150px !important;
    }

    .sample-download-btn {
        width: 200px !important;
    }

    #cancelImportInquirybtn {
        cursor: pointer;
    }

    #cancelImportInquirybtn:hover {
        background: rgba(0, 0, 0, 0.11);
        scale: 1.3;

    }

    .inquiry-btn {
        border-radius: 20px;
        width: 85px;
        font-size: 12px;
        background: transparent;
        color: #1F386E;
        border: 1px solid #1F386E;
        cursor: pointer;
        padding: 5px 5px;

    }

    .inquiry-btn-delete {
        border-radius: 20px;
        width: 85px;
        font-size: 12px;
        background: transparent;
        color: #1F386E;
        border: 1px solid #1F386E;
        cursor: pointer;
        padding: 5px 5px;
    }

    .deleteSelectedbtn {
        width: auto;
    }

    .inquiry-btn:hover {
        background-color: #311B92;
        color: white;
    }

    .inquiry-btn-delete:hover {
        background-color: red;
        color: white;
        border: none;
    }

    .editEnqbtn{
        width: 60px !important;
        font-size: smaller !important;
    }
   
    .deleteEnqbtn{
        width: 60px !important;
        font-size: smaller !important;
    }
 
    @media only screen and (max-width: 400px) {
        .inquiry-btn {
            width: auto !important;
            font-size: 12px !important;
            margin-bottom: 10px !important;
        }

        .inquiry-btn-delete {
            width: auto !important;
            font-size: 12px !important;
            margin-bottom: 10px !important;
        }
    }
    .tooltip-for-table {
    position: relative;
    cursor: pointer;
}

.tooltip-for-table .tooltip-for-tabletext {
    visibility: hidden;
    width: auto;
    background-color: #555;
    color: #fff;
    text-align: center;
    padding: 5px 10px;
    border-radius: 6px;
    
    /* Position the tooltip-for-table text */
    position: absolute;
    z-index: 1;
    bottom: 100%; /* Place it above the text */
    left: 50%;
    margin-left: -60px; /* Center the tooltip-for-table text */
    
    /* Fade in tooltip-for-table */
    opacity: 1;
    transition: opacity 0.3s;
}

.tooltip-for-table:hover .tooltip-for-tabletext {
    visibility: visible;
    opacity: 1;
}
</style>


{{-- for edit form  --}}
<!--start wrapper-->
<div class="wrapper">


    <!-- start page content wrapper-->
    <div class="page-content-wrapper"style="margin-left: 172px !important;">
        <!-- start page content-->
        <div class="page-content">



            <!-- inquiry form -->
            <div id="InquiryList">
                <div class="float-md-end mb-2 importexport">
                 <a href="{{ route('admin.export.inquiries') }}" class=" btn inquiry-btn text-center" id="exportBtn"><i
                            class="lni lni-arrow-up-circle "></i>Export</a>
                    <button class="btn inquiry-btn importInquirybtn text-center" id="importBtn"><i
                            class="lni lni-arrow-down-circle "></i>Import</button>

                </div>
                <div class="float-md-start">
                    <button class="btn deleteSelectedbtn inquiry-btn-delete btn-sm editButton pe-3 text-center"
                        id="delete_all_btn"><i class="lni lni-trash"></i>Delete Selected</button>

                </div>


                <div class="data-table mt-3">
                    <table id="inquiryTable" class="table table-striped table-bordered dataTable no-footer" style="white-space: nowrap;overflow-x: auto;">
                        <thead>
                            <tr style="background-color: #e5e5e5;">
                                <th class="text-center"><input type="checkbox" name="select_all_records"
                                        id="select_all_records"></th>
                                <th>Date</th>
                                <th>Apt Address</th>
                                <th>Apt No.</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>SS No</th>
                                <th>Email</th>
                                <th>Section 8 Share</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($inquiryData))
                                <h5 class="text-center">No records available</h5>
                            @endif
                            @foreach ($inquiryData as $inquiryData)
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="inquiry_selected_ids"
                                            class="select_id" value="{{ $inquiryData->id }}"></td>
                                    <td>{{ $inquiryData->date ? \Carbon\Carbon::parse($inquiryData->date)->format('d-F-Y') : '' }}
                                    </td>
                                    <td class="tooltip-for-table" data-address="{{ $inquiryData->apt_address }}">
                {{ Str::limit($inquiryData->apt_address, 10) }}
                <span class="tooltip-for-tabletext">{{ $inquiryData->apt_address }}</span>
            </td>                                   
             <td>
                                        {{ $inquiryData->apt_number }}
                                    </td>
                                    <!-- <td >
                                        {{str::limit($inquiryData->name,20) }}
                                    </td> -->
                                    <td class="tooltip-for-table" data-address="{{ $inquiryData->name }}">
                                    {{str::limit($inquiryData->name,20) }}
                <span class="tooltip-for-tabletext">{{ $inquiryData->name }}</span>
            </td>
                                    
                                    <td>
                                        {{ $inquiryData->telephone }}
                                    </td>

                                    <td>{{ $inquiryData->social_security_number }}</td>
                                    <td>{{str::limit( $inquiryData->email,30) }}</td>
                                    <td class="tooltip-for-table" data-address="{{ $inquiryData->section_share }}">
    {{ Str::limit($inquiryData->section_share, 10) }}
    <span class="tooltip-for-tabletext">{{ $inquiryData->section_share }}</span>
</td>


                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('admin.inquiry.edit', $inquiryData->id) }}"
                                            class="editEnqbtn inquiry-btn btn-sm editButton mx-1"style="float: left; text-align: center;"><i
                                                class="lni lni-pencil pe-1"></i>Edit</a>

                                        <button class="deleteEnqbtn inquiry-btn-delete btn-sm editButton mx-1"
                                            onclick="deleteconfirm({{ $inquiryData->id }})"
                                            value="{{ $inquiryData->id }}"style="float: right; text-align: center;"><i
                                                class="lni lni-trash pe-1"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>










            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2021. All right reserved.
            </div>
        </footer>
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->



        <!-- import-popup -->
        <div id="importInquiryPopup">
            <h2 class="d-inline">Import Data</h2>
            <i class="fa fa-xmark float-end" id="cancelImportInquirybtn"></i>
            <form id="importInquiryForm" enctype="multipart/form-data">
                <div class="form-row my-4">

                    <div class="form-group col-md-12">
                        <div class="position-relative mt-4 text-center" style="margin-top: 5px;">
                            <a href="{{ asset('assets/admin/attachments/inquiry_sample.xlsx') }}" download="sample.xlsx"
                                class="btn inquiry-btn text-center sample-download-btn">Download Sample File</a>


                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <div class="position-relative mt-4" style="margin-top: 5px;">
                            <span class=""> Select File To Import</span>
                            <input id="import_file" name="import_file" type="file" class="outside form-control"
                                accept=".xlsx" />
                            <span class="text-danger" id="upload_errors"></span>

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn submitImportbtn inquiry-btn text-center">Import</button>
                    <button class="btn submitImportbtn2 inquiry-btn text-center" type="button" disabled=""> <span
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Importing...</button>
                </div>
            </form>
        </div>


    </div>
    <!--end wrapper-->
    <script>
        $('.submitImportbtn2').hide();
        $('#importInquiryPopup').fadeOut();
        $('.importInquirybtn').click(function() {
            $('#importInquiryPopup').fadeIn();
        });
        $('#cancelImportInquirybtn').click(function() {
            $('#importInquiryPopup').fadeOut();
        });

        $('#importInquiryForm').submit(function(e) {
            e.preventDefault();

            var fileInput = $('#import_file');
            var file = fileInput[0].files[0];

            if (!file) {
                $('#upload_errors').text('Please select a .xlsx file first.');
                return;
            } else {
                $('.submitImportbtn').hide();
                $('.submitImportbtn2').show();
                $('#upload_errors').text('');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '{{ route('admin.import.inquiries') }}',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processData: false,
                    contentType: false,
                    success: function(data1) {
                       
                        $('.submitImportbtn').show();
                        $('.submitImportbtn2').hide();
                        var data = JSON.parse(data1);
                        // console.log(data);
                        if (data.status === 'success') {

                            alert('Data imported successfully');
                            setTimeout(function() {
                                window.location.reload();
                            }, 500);
                        } 
                        if(data.status === 'file_error'){
                            var errorsHtml = '';
                            data.errors.forEach(function(error) {
                                errorsHtml +=   'Please select a .xlsx file';
                            });
                            $('#upload_errors').html(errorsHtml);
                        }
                        if(data.status === 'header_error'){
                            var errorsHtml = '';
                           
                                errorsHtml +=   'kindly use the given file format';
                           
                            $('#upload_errors').html(errorsHtml);
                        }
                        else {
                          
                            var errorsHtml = '';
                            data.errors.forEach(function(error) {
                                errorsHtml += "Row " + error.row +  ' - ' + error.errors +
                                    '<br>'; // Append each error with a line break
                            });
                            $('#upload_errors').html(errorsHtml);


                        }
                    },
                    error: function(xhr, status, error) {


                    }
                });
            }
        });
    </script>

    {{-- edit page script start  --}}
    <script>
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function() {
            current_fs = $(this).closest('fieldset');
            next_fs = current_fs.next();

            // Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            // Show the next fieldset
            next_fs.show();

            // Hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // For making fieldset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function() {
            current_fs = $(this).closest('fieldset');
            previous_fs = current_fs.prev();

            // Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            // Show the previous fieldset
            previous_fs.show();

            // Hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // For making fieldset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar").css("width", percent + "%");
        }

        $(".submit").click(function() {
            return false;
        });


        // signature
        const root = document.getElementById("root")
        const resetCanvas = document.getElementById("resetCanvas")
        const getImage = document.getElementById("getImage")
        const datepicker = document.getElementById("datepicker");
        const component = Signature(root, {
            width: 530,
            height: 130,

        });
        resetCanvas.addEventListener("click", () => {
            component.value = [];
        });

        getImage.addEventListener("click", () => {
            // getImage.nextElementSibling.src = component.getImage();
            $('#signature').val(component.getImage());
        });
        // window.addEventListener('resize', updateCanvasWidth);
    </script>


    <script>
        function updateInquiry() {
            $('#updateInquiryBtn').on('click', function(e) {
                e.preventDefault();

                var formData = $('#msform').serialize();

                $.ajax({
                    url: '{{ route('updateInquiry') }}',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status = 'success') {
                            alert('Updated Successfully');
                            window.location.reload();
                        } else {
                            alert('Failed to update the record');

                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            });

        }
    </script>
    {{-- edit page script end  --}}




    <script>
        $('#step1_datepicker').datepicker();


        function deleteconfirm(id) {
            if (confirm('Are you sure you want to delete this record?')) {

                $.ajax({
                    url: '{{ route('admin.delete.inquiry', ['id' => ':id']) }}'.replace(':id', id),
                    headers: {
                        type: 'get',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'deleted') {

                            alert('Record deleted');
                        } else {
                            alert(response.status)
                        }
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting user:', error);
                    }
                });
            }
        }


        // bulk delete 

        $('#select_all_records').click(function() {
            $('.select_id').prop('checked', $(this).prop('checked'))
        });

        $('#delete_all_btn').click(function() {
            if ($('input:checkbox[name=inquiry_selected_ids]:checked').length === 0) {
                alert('Select at least one record before deleting.');
                return;
            }

            if (confirm('Are you sure you want to delete the records?')) {
                var all_selected_ids = [];
                $('input:checkbox[name=inquiry_selected_ids]:checked').each(function() {
                    all_selected_ids.push($(this).val());
                })

                $.ajax({
                    url: '{{ route('admin.delete.selected.inquiry') }}',
                    data: {
                        all_selected_ids: all_selected_ids
                    },
                    headers: {
                        type: 'get',

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data1) {
                        var data = JSON.parse(data1);
                        console.log(data)
                        if (data.status == 'deleted') {

                            alert('Records deleted successfully');
                        } else {
                            alert('Records Not deleted');
                        }
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting user:', error);
                    }
                });
            }
        });
    </script>

    <script>
        var table = $('#inquiryTable').DataTable({responsive: true,"lengthChange": true,
						"lengthMenu": [10, 25, 50,75,100],
						"pageLength": 10, "info":true,"bSortCellsTop": true,dom: 'Bfrtip',
				        colReorder: true,
				        bDeferRender : true,
				        scrollCollapse: true,
				        paging:         true,
				        fixedHeader:           {
				            header: true,
				            footer: false
				        },
				        scrollX:        true,
				        sScrollXInner: "100%",
				         "bSort": false
        });
    </script>
    @include('layouts/admin/footer')
