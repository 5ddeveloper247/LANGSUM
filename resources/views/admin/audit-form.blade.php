@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')

<style>
  table{
    font-size: 10px;
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

  .export-btn:hover {
    background-color: #1f386e;
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

    .deleteSelectedTenantbtn {
        width: auto;
    }
    .deleteSelectedInquirybtn {
        width: auto;
    }


    .inquiry-btn-delete:hover {
        background-color: red;
        color: white;
        /* border: none; */
    }



  @media only screen and (max-width: 400px) {
    .export-btn {
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
        <div class="data-table mt-3">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab"
                    aria-selected="true">
                    <div class="d-flex align-items-center">
                      <div class="tab-icon"><i class="bi bi-files me-1"></i>
                      </div>
                      <div class="tab-title">Inquiry Table</div>
                    </div>
                  </a>
                </li>
                <li class="nav-item ms-2" role="presentation">
                  <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                    aria-selected="false">
                    <div class="d-flex align-items-center">
                      <div class="tab-icon"><i class="bi bi-file-earmark-zip me-1"></i>
                      </div>
                      <div class="tab-title">Tenant Inquiry Table</div>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                 
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                         
                          <div class="row">
                            <div class="col-sm-12">
                              <table id="inquiry-table" class="table table-striped table-bordered dataTable mt-4"
                              style="width:100%" role="grid" aria-describedby="example_info">
                                <thead>
                                <div class="float-start mb-5">
                                       <button class="btn deleteSelectedInquirybtn inquiry-btn-delete btn-sm editButton pe-3 text-center"
                                           id="delete_all_inquiry_btn"><i class="lni lni-trash"></i>Delete Selected</button>

                                        </div>
                                  <tr role="row"style="background-color: #e5e5e5;" >
                                  <th class="text-center"><input type="checkbox" name="select_all_inquiry_records"
                                        id="select_all_inquiry_records"></th>
                                    <th>Date</th>
                                    <th>Apt Address</th>
                                    <th>Apt No.</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>SS No</th>
                                    <th>Email</th>
                                    <th>Section 8 Share</th>
                                    <th>Updated By</th>
                                    <th>Deleted By</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inquiryData as $i => $inquiryData )
                                        
                                    <tr role="row" class="odd">
                                    @if($inquiryData->deletedByUser !== null)
                                            <td class="text-center">
                                                <input type="checkbox" name="inquiry_selected_ids" class="select_inquiry_id" value="{{ $inquiryData->id }}">
                                            </td>
                                            @else
                                            <td></td>
                                        @endif
                                      <td>{{ isset($inquiryData->date) && !empty($inquiryData->date) ? \Carbon\Carbon::parse($inquiryData->date)->format('d-F-Y') : '' }}</td>
                                      <td class="tooltip-for-table" data-address="{{ $inquiryData->apt_address }}">
    {{ Str::limit($inquiryData->apt_address, 10) }}
    <span class="tooltip-for-tabletext">{{ $inquiryData->apt_address }}</span>
</td>

                                      <td>{{ isset($inquiryData->apt_number) && !empty($inquiryData->apt_number) ? $inquiryData->apt_number : '' }}</td>
                                      <td class="tooltip-for-table" data-name="{{ isset($inquiryData->name) && !empty($inquiryData->name) ? $inquiryData->name : '' }}">
    {{ isset($inquiryData->name) && !empty($inquiryData->name) ? Str::limit($inquiryData->name, 20) : '' }}
    <span class="tooltip-for-tabletext">{{ isset($inquiryData->name) && !empty($inquiryData->name) ? $inquiryData->name : '' }}</span>
</td>

                                      <td>{{ isset($inquiryData->telephone) && !empty($inquiryData->telephone) ? $inquiryData->telephone : '' }}</td>
                                      <td>{{ isset($inquiryData->social_security_number) && !empty($inquiryData->social_security_number) ? $inquiryData->social_security_number : '' }}</td>
                                      <td>{{ isset($inquiryData->email) && !empty($inquiryData->email) ? $inquiryData->email : '' }}</td>
                                      <td>{{ isset($inquiryData->section_share) && !empty($inquiryData->section_share) ? Str::limit($inquiryData->section_share, 12) : '' }}</td>
                                      <td>{{ $inquiryData->updatedByUser->name ?? 'N/A' }}</td>
                                      <td>{{ $inquiryData->deletedByUser->name ?? 'N/A' }}</td>
                                  </tr>
                                  
                                    @endforeach
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                    <div class="card">
                        <div class="card-body p-0">
                          <div class="">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                             
                              <div class="row">
                                <div class="col-sm-12">
                                  <table id="tenant-table" class="table table-striped table-bordered dataTable mt-4"
                                     role="grid" aria-describedby="example_info">
                                    <div class="float-start mb-5">
                                       <button class="btn deleteSelectedTenantbtn inquiry-btn-delete btn-sm editButton pe-3 text-center"
                                           id="delete_all_tenant_btn"><i class="lni lni-trash"></i>Delete Selected</button>

                                        </div>
                                    <thead>
                                      <tr role="row" style="background-color: #e5e5e5;">
                                      <th class="text-center"><input type="checkbox" name="select_all_tenant_records"
                                        id="select_all_tenant_records"></th>
                                      <th class="col">Name</th>
                                      <th class="col-1">SS No</th>
                                      <th class="col-1">DOB</th>
                                      <th>Phone</th>
                                      <th>Co Applicant Name</th>
                                      <th>Present Address</th>
                                      <th>Updated By</th>
                                      <th>Deleted By</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tenantData as $i => $data2 )
                                            
                                        <tr role="row" class="odd">
                                          
                                        @if($data2->deletedByUser !== null)
                                            <td class="text-center">
                                                <input type="checkbox" name="tenant_selected_ids" class="select_tenant_id" value="{{ $data2->id }}">
                                            </td>
                                            @else
                                            <td></td>
                                        @endif

                                        <td class="tooltip-for-table" data-name="{{ 
    isset($data2->tenantPersonalInformation->first_name) && !empty($data2->tenantPersonalInformation->first_name) 
        ? $data2->tenantPersonalInformation->first_name . ' ' . $data2->tenantPersonalInformation->middle_name . ' ' . $data2->tenantPersonalInformation->last_name 
        : '' 
}}">
    {{ 
        isset($data2->tenantPersonalInformation->first_name) && !empty($data2->tenantPersonalInformation->first_name) 
            ? Str::limit($data2->tenantPersonalInformation->first_name . ' ' . $data2->tenantPersonalInformation->middle_name . ' ' . $data2->tenantPersonalInformation->last_name, 20) 
            : '' 
    }}
    <span class="tooltip-for-tabletext">{{ 
        isset($data2->tenantPersonalInformation->first_name) && !empty($data2->tenantPersonalInformation->first_name) 
            ? $data2->tenantPersonalInformation->first_name . ' ' . $data2->tenantPersonalInformation->middle_name . ' ' . $data2->tenantPersonalInformation->last_name 
            : '' 
    }}</span>
</td>

                                          <td>{{ isset($data2->tenantPersonalInformation->ss_no) && !empty($data2->tenantPersonalInformation->ss_no) ? $data2->tenantPersonalInformation->ss_no : '' }}</td>
                                          <td>{{ isset($data2->tenantPersonalInformation->date_of_birth) && !empty($data2->tenantPersonalInformation->date_of_birth) ? \Carbon\Carbon::parse($data2->tenantPersonalInformation->date_of_birth)->format('d-F-Y') : '' }}</td>
                                          <td>{{ isset($data2->tenantPersonalInformation->phone) && !empty($data2->tenantPersonalInformation->phone) ? $data2->tenantPersonalInformation->phone : '' }}</td>

                                          <td>{{ isset($data2->tenantPersonalInformation['co-applicant']) && !empty($data2->tenantPersonalInformation['co-applicant']) ? $data2->tenantPersonalInformation['co-applicant'] : '' }}</td>

                                          <td>{{isset($data2->tenantPersonalInformation->present_address) && !empty($data2->tenantPersonalInformation->present_address) ? $data2->tenantPersonalInformation->present_address : '' }}</td>



                                          <td>{{ $data2->updatedByUser->name ?? 'N/A' }}</td>
                                          <td>{{ $data2->deletedByUser->name ?? 'N/A' }}</td>
                                      </tr>
                                      
                                        @endforeach
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>


              </div>
            </div>
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

    </div>
    <!--end wrapper-->

    <script>

       $('#inquiry-table').DataTable({responsive: true,"lengthChange": true,
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
       $('#tenant-table').DataTable({responsive: true,"lengthChange": true,
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
      function exportFile() {
        var fileInput = document.getElementById('fileInput');
        fileInput.onchange = function (e) {
          var file = e.target.files[0];
          var fileName = file.name;
          document.getElementById('').textContent = fileName;
        };
        fileInput.click();
      }

      $('#select_all_tenant_records').click(function() {
            
            $('.select_tenant_id').prop('checked', $(this).prop('checked'));
        });
      $('#select_all_inquiry_records').click(function() {
            $('.select_inquiry_id').prop('checked', true);
        });
        

        $('.deleteSelectedInquirybtn').click(function() {
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
                    url: '{{ route('admin.permanantdeleteInquiries') }}',
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



        // to delete tenant records 
        $('.deleteSelectedTenantbtn').click(function() {
            if ($('input:checkbox[name=tenant_selected_ids]:checked').length === 0) {
                alert('Select at least one record before deleting.');
                return;
            }

            if (confirm('Are you sure you want to delete the records?')) {
                var all_selected_ids = [];
                $('input:checkbox[name=tenant_selected_ids]:checked').each(function() {
                    all_selected_ids.push($(this).val());
                })

                $.ajax({
                    url: '{{ route('admin.permanantdeleteTenants') }}',
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
 @include('layouts/admin/footer')