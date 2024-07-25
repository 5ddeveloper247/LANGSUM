@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')
<style>
    table {
        font-size: 10px !important;
    }

    /* .lni {
        font-size: small !important;
    } */

    .inquiry-btn {

        border-radius: 20px;
        width: 85px;
        font-size: 12px;
        background: transparent;
        color: #1f386e;
        border: 1px solid #1f386e;
        cursor: pointer;
        padding: 5px 5px;
    }
    .editEnqbtn{
        width: 60px !important;
        font-size: smaller !important;
    }
    .editEnqbtn i{
        font-size: smaller;
    }
    .deleteEnqbtn{
        width: 60px !important;
        font-size: smaller !important;
    }
 

    .inquiry-btn:hover {
        background-color: #1f386e;
        color: white;
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
    #del_all_btn{
        width:100px;
    }

    .inquiry-btn-delete:hover {
        background-color: red;
        color: white;
        border: none;
    }

    #importTenantPopup {
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
        width: 200px;
    }

    #cancelImportInquirybtn {
        cursor: pointer;
    }

    #cancelImportInquirybtn:hover {
        background: rgba(0, 0, 0, 0.11);
        scale: 1.3;

    }

    .export-btn {
        float: right;
        border-radius: 10px;
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        cursor: pointer;
        padding: 10px 5px;
    }

    /* .deleteSelectedbtn {
        border-radius: 10px;
        width: auto;
        border: 0 none;
        cursor: pointer;
        padding: 10px 10px;
        margin-bottom: 20px
    } */

    .export-btn:hover {
        background-color: #311B92;
    }

  

    @media only screen and (max-width: 400px) {
        .export-btn {
            width: auto !important;
            font-size: 12px !important;
            margin-bottom: 10px !important;
        }

        .inquiry-btn {
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

<body>


    <!--start wrapper-->
    <div class="wrapper">


        <!-- start page content wrapper-->
        <div class="page-content-wrapper"style="margin-left: 172px !important;">
            <!-- start page content-->
            <div class="page-content">


                <!-- audit -->
                <div class="d-md-flex justify-content-between align-items-center">

                    <div class="left float-md-start">

                        <button class="deleteSelectedbtn inquiry-btn-delete btn-sm editButton" id="del_all_btn"
                            onclick="deleteall()">Delete
                            Selected</button>
                    </div>
                    <div class="right float-md-end mt-md-0 mt-2">

                        <a href="{{ route('admin.export.tenant') }}" class="inquiry-btn btn-sm editButton text-center"
                            type="button"><i class="lni lni-arrow-up-circle pe-2"></i>Export</a>
                        <button class="inquiry-btn btn-sm editButton" onclick="showImportPopup()" type="button"><i
                                class="lni lni-arrow-down-circle pe-2"></i>Import</button>
                    </div>

                </div>
                <div class="data-table mt-3">

                    <table id="userTable" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr style="background-color: #e5e5e5;">
                                <th class="text-center"><input type="checkbox" name="select_all_records"
                                        id="select_all_records"></th>
                                
                                <th class="col">Name</th>
                                <th class="col-1">SS No</th>
                                <th class="col-1">DOB</th>
                                <th>Phone</th>
                                <th>Co Applicant Name</th>
                                <th>Present Address</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenantInquiries as $data)
                                <tr>  
                                    <td class="text-center"><input type="checkbox" name="inquiry_selected_ids"
                                            class="select_id" value="{{ $data->id }}"></td>
                                   
                                            <td class="tooltip-for-table" data-name="{{ 
    @$data->tenantPersonalInformation->first_name ? @$data->tenantPersonalInformation->first_name : '' 
}}{{ 
    @$data->tenantPersonalInformation->middle_name ? ' ' . @$data->tenantPersonalInformation->middle_name : '' 
}}{{ 
    @$data->tenantPersonalInformation->last_name ? ' ' . @$data->tenantPersonalInformation->last_name : '' 
}}">
    {{ Str::limit(
        (@$data->tenantPersonalInformation->first_name ? @$data->tenantPersonalInformation->first_name : '') . 
        (@$data->tenantPersonalInformation->middle_name ? ' ' . @$data->tenantPersonalInformation->middle_name : '') . 
        (@$data->tenantPersonalInformation->last_name ? ' ' . @$data->tenantPersonalInformation->last_name : ''),
        20
    ) }}
    <span class="tooltip-for-tabletext">{{ 
        @$data->tenantPersonalInformation->first_name ? @$data->tenantPersonalInformation->first_name : '' 
    }}{{ 
        @$data->tenantPersonalInformation->middle_name ? ' ' . @$data->tenantPersonalInformation->middle_name : '' 
    }}{{ 
        @$data->tenantPersonalInformation->last_name ? ' ' . @$data->tenantPersonalInformation->last_name : '' 
    }}</span>
</td>

                                    <td>{{ @$data->tenantPersonalInformation->ss_no }}</td>
                                    <td style="white-space:nowrap">{{ @$data->tenantPersonalInformation->date_of_birth ? \Carbon\Carbon::parse(@$data->tenantPersonalInformation->date_of_birth)->format('d-F-Y') : '' }}</td>
                                    <td>{{ @$data->tenantPersonalInformation->phone }}</td>
                                    <td>{{@$data->tenantPersonalInformation['co-applicant']}}</td>
                                    <td>{{Str::limit(@$data->tenantPersonalInformation->present_address, 20)}}</td>
                                    <!-- <td>{{@$data->tenantPersonalInformation->apartment_number}}</td> -->
                                    <td class="d-flex justify-content-center"><a href="{{ route('admin.tenant.edit', $data->id) }}"
                                            class="inquiry-btn btn-sm editButton text-center editEnqbtn me-1 btn">
                                            <i class="lni lni-pencil"></i>Edit
                                        </a>

                                        <button
                                            class="inquiry-btn-delete btn-sm editButton text-center deleteEnqbtn me-1"
                                            onclick="deleteconfirm({{ $data->id }})" value="{{ $data->id }}"><i
                                                class="lni lni-trash pe-1"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            <div id="importTenantPopup">
                <h2 class="d-inline">Import Data</h2>
                <i class="fa fa-xmark float-end" id="cancelImportInquirybtn" onclick="hideImportPopup()"></i>
                <form id="importTenantForm" enctype="multipart/form-data">
                    <div class="form-row my-4">

                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4 text-center" style="margin-top: 5px;">
                                <a href="{{ asset('assets/admin/attachments/tenant_sample.xlsx') }}"
                                    download="sample.xlsx"
                                    class="btn sample-download-btn inquiry-btn btn-sm editButton text-center">Download
                                    Sample File</a>


                            </div>
                        </div>


                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <span class=""> Select File To Import</span>
                                <input id="import_file" name="import_file" type="file" class="outside form-control"
                                    accept=".xlsx" />
                                <div class="text-danger" id="upload_errors"></div>

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="btn submitImportbtn inquiry-btn btn-sm editButton text-center">Import</button>
                        <button class="btn submitImportbtn2 inquiry-btn btn-sm editButton text-center" type="button"
                            disabled=""> <span class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            Importing...</button>
                    </div>
                </form>
            </div>





        </div>
        <!--end wrapper-->

        <script>
            $('.submitImportbtn2').hide();
            $('#importTenantPopup').fadeOut();

            function showImportPopup() {
                $('#importTenantPopup').fadeIn();
            }

            function hideImportPopup() {
                $('#importTenantPopup').fadeOut();
                $('#upload_errors').text('');
                $('#importTenantForm').reset();
            }

            $('#importTenantForm').submit(function(e) {
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
                        url: '{{ route('admin.import.tenant') }}',
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
                        else if(data.status === 'file_error'){
                            alert('hhghghgh')
                            var errorsHtml = '';
                            // data.errors.forEach(function(error) {
                                errorsHtml +=   'Please select a .xlsx file';
                            // });
                            $('#upload_errors').html(errorsHtml);
                        }
                        else if(data.status === 'header_error'){
                            var errorsHtml = '';
                           
                                errorsHtml +=   'Invalid number of columns';
                           
                            $('#upload_errors').html(errorsHtml);
                        }
                        else {
                          
                            var errorsHtml = '';
                            var errorArr = data.errors;
                            $.each(errorArr, function(index, error) {
                                
                                errorsHtml += "Row " + error['row'] +  ' - ' + error.errors +
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

        <script>
            function deleteconfirm(id) {
                if (confirm('Are you sure you want to delete this record?')) {

                    $.ajax({
                        url: '{{ route('admin.delete.tenant', ['id' => ':id']) }}'.replace(':id', id),
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

            $('#select_all_records').click(function() {
                $('.select_id').prop('checked', $(this).prop('checked'))
            });

            function deleteall() {
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
                        url: '{{ route('admin.delete.tenant.all') }}',
                        data: {
                            all_selected_ids: all_selected_ids
                        },
                        headers: {
                            type: 'get',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data1) {
                            var data = JSON.parse(data1);
                            if (data.status == 'deleted') {

                                alert('Records deleted Successfully');
                            } else {
                                alert('Records Not Deleted')
                            }
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {

                        }
                    });
                }
            }
        </script>
        <script>
            var table = $('#userTable').DataTable({responsive: true,"lengthChange": true,
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
