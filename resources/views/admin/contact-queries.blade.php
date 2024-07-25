@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')

<style>
    table{
        font-size:  10px;
    }
     .lni{
        font-size: small !important;
    }
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

    .inquiry-btn-delete:hover {
        background-color: red;
        color: white;
        border: none;
    }
    #replyPopup {
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
        max-width: 650px;
    }
    #viewreplyPopup {
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
        max-width: 650px;
    }
    .replied-btn{
        font-size: 10px;
    }
  
    .replybtn{
        font-size: 10px;
    }
    .replybtn2 {
        width: 150px;
    }

    #addUserBtn {
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

    #addUserBtn:hover {
        background-color: #311B92;
    }

   
    .submitReply {
        width: 100px;
    }

    .submitReply:hover {
        background-color: #311B92;
    }

    /* .replybtn {
        color: white;
        background: #673AB7;
    }

    .replybtn:hover {
        background-color: #311B92;
        color: white;
    } */

    input.outside,
    input[class=outside],
    [type=password].outside {
        color: #555;
        width: 100%;
        font-size: 1rem;
        line-height: normal;
        border: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        box-sizing: border-box;
        margin-bottom: -1px;
        padding: 5px 5px;
        position: relative;
        z-index: 1;
    }

    input:focus,
    select:focus {
        outline: 0 !important;
        color: #555 !important;
        border-color: #9e9e9e;
        z-index: 2
    }

    input:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside {
        top: 12px;
        left: 20px;
        font-size: 13px;
        opacity: 1;
        font-weight: 400
    }

    input:focus~.floating-label-outside,
    input:valid~.floating-label-outside {
        top: -10px;
        opacity: 1;
        font-size: 13px;
        color: #727272;
        background: #fff;
        padding: 0px 5px;
    }

    input:focus~.floating-label-outside,
    input:not(:focus):valid~.floating-label-outside {
        left: 20px
    }

    .form-control:focus {
        box-shadow: none !important;
        border-color: #ced4da;
    }

    .floating-label-outside {
        position: absolute;
        pointer-events: none;
        left: 15px;
        top: 9px;
        transition: .2s ease all;
        color: #777;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: .5px;
        z-index: 3;
        text-transform: uppercase
    }

    .cancelreply {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff3333;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    @media only screen and (max-width: 400px) {
        #addUserBtn {
            width: auto !important;
            font-size: 12px !important;
            margin-bottom: 10px !important;
        }
    }
</style>



<!--start wrapper-->
<div class="wrapper">
    <!-- start page content wrapper-->
    <div class="page-content-wrapper"style="margin-left: 172px !important;">
        <!-- start page content-->
        <div class="page-content">

         

            <!-- user-form -->
            <div id="replyPopup">
                <h2></h2>

                <form id="replyForm">

                    <div class="form-row my-4">
                        <input type="hidden" name="contact_query_id" id="contact_query_id">
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <span class=""style="font-weight:bold;">To</span>
                                <input id="from" class="outside form-control" disabled value=""></input>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <span class="" style="font-weight:bold;">Message</span>
                                <p id="user-msg"></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <span class=""style="font-weight:bold;">Reply</span>
                                <textarea id="reply" class="outside form-control" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submitReply inquiry-btn btn-sm editButton text-center">Reply</button>
                        <button class="btn replybtn2 inquiry-btn btn-sm editButton text-center" type="button" disabled=""> <span
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Replying...</button>
                    </div>
                </form>

                <button type="button" id="cancelreply" class="cancelreply"><span
                        aria-hidden="true">&times;</span></button>
            </div>


            {{-- view reply popup  --}}

            <div id="viewreplyPopup">
               

                    <div class="form-row my-4">
                       
                        <div class="media w-50 mb-3 d-flex"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                            <div class="media-body" style="margin-left: 8px; margin-top:7px;">
                              <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted" id="user-message"></p>
                              </div>
                           
                            </div>
                          </div>
                  
                          <!-- Reciever Message-->
                          <div class="media w-50 ml-auto mb-3 float-end d-flex align-items-center justify-content-end">
                           
                            <div class="media-body float-start" style="margin-right: 8px; margin-top:7px;">
                              <div class=" rounded py-2 px-3 mb-2" style="background: #1f386e;">
                                <p class="text-small mb-0 text-white" id="admin-reply"></p>
                              </div>
                              
                            </div>
                            <img src="{{asset('/assets/admin/images/logo-icon-2.png')}}" alt="user" width="40" style="height: fit-content;" class="rounded-circle float-end">
                          </div>
                  
                       
                    </div>
                   

                <button type="button" id="cancelviewreply" class="cancelreply"><span
                        aria-hidden="true">&times;</span></button>
            </div>



            <table id="userTable" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr class="col-12" style="background-color: #e5e5e5;">
                        <th class="col-1">S.No</th>
                        <th class="col-4">From</th>
                        <th class="col-5">Message</th>
                        <th>Status</th>
                        <th class="col-2">Replied By</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactQueries as $i => $data)
                        <tr class="col-12">
                            <td class="col-1">{{ $i + 1 }}</td>
                            <td class="col-4">{{ $data->email }}</td>
                            <td>{{ Str::limit($data->message, 50) }}</td>
                            <td class="text-center">
                                @if ($data->reply_status == 1)
                                    <span class="badge rounded-pill bg-success">Replied</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">New</span>
                                @endif
                            </td>
                            @if (!empty($data->repliedBy->name))
                                
                            <td class="text-center">
                                <span>{{$data->repliedBy->name}}</span>
                            </td>
                            @else
                            <td class="text-center">
                            <span >---</span>
                        </td>
                            @endif
                            @if ($data->reply_status == 0)
                                
                            <td class="col-1"><button class="inquiry-btn btn-sm editButton text-center replybtn"
                                value="{{ $data->id }}">Reply</button>
                                @else
                                <td><p class="inquiry-btn btn-sm editButton text-center replied-btn"  data-id="{{ $data->id }}">Replied</p></td>
                                @endif
                                   
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

</div>
<!--end wrapper-->
<script>
 $('#userTable').DataTable({
    "searching": true,
});
    $('.replybtn2').hide();
    // Show reply Popup
    $('.replybtn').click(function() {
      
        var enqId = $(this).attr('value');

        $.ajax({
            url: '{{ route('admin.contactQueryDetail') }}',
            data: {
                enqId: enqId
            },
            headers: {
                type: 'get',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data1) {
                var data = JSON.parse(data1);
                $('#contact_query_id').val(data.id);
                $('#from').val(data.email);
                $('#user-msg').text(data.message);

            },
            error: function(xhr, status, error) {

            }
        });

        $('#replyPopup').fadeIn();
    });

    // Cancel reply
    $('#cancelreply').click(function() {
        $('#replyPopup').fadeOut();
        $('#contact_query_id').val('');
        $('#from').val('');
        $('#user-msg').text('');
    });
   


    $('#replyForm').submit(function(e) {
        e.preventDefault();
        $('.submitReply').hide();
        $('.replybtn2').show();
        var userEmail = $('#from').val();
        var reply = $('#reply').val();
        var contact_query_id = $('#contact_query_id').val();
        $.ajax({
            url: '{{ route('admin.contactQuery.reply') }}',
            data: {
                userEmail: userEmail,
                reply:reply,
                contact_query_id:contact_query_id,
                
            },
            headers: {
                type: 'get',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data1) {
                var data = JSON.parse(data1);
               if(data.status == 'replied'){
                $('.submitReply').show();
                $('.replybtn2').hide();
                alert('replied Successfully');
                window.location.reload();
               }

            },
            error: function(xhr, status, error) {

            }
        });

       
        // Clear form fields
       
    });
</script>
<script>
    // to get replied message 
    $('.replied-btn').click(function(){
        
        var query_id = $(this).attr('data-id');
        $.ajax({
            url: '{{ route('admin.contactQuery.getReply') }}',
            data: {
              
                query_id:query_id,
                
            },
            headers: {
                type: 'get',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data1) {
                var data = JSON.parse(data1);
                // console.log(data.query);
                $('#user-message').text(data.query.message);
                $('#admin-reply').text(data.reply.reply);
                $('#viewreplyPopup').fadeIn();
            },
            error: function(xhr, status, error) {

            }
        });
    });
    $('#cancelviewreply').click(function() {
        $('#viewreplyPopup').fadeOut();
    
    });
</script>

@include('layouts/admin/footer')
