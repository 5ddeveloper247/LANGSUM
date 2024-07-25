@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')

</head>
<style>
    table {
        font-size: 10px;
    }

    .addbtn_loading {
        width: auto !important;
    }

    .editUserbtn {
        font-size: 10px;
    }

    .deleteUserbtn {
        font-size: 10px;
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

    #addUserPopup {
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
        max-width: 400px;
    }

    #editUserPopup {
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
        max-width: 400px;
    }

    #addUserBtn {
        float: right;
        border-radius: 20px;
        width: 85px;
        font-size: 12px;
        background: transparent;
        color: #1f386e;
        border: 1px solid #1f386e;
        cursor: pointer;
        padding: 5px 5px;

    }

    #addUserBtn:hover {
        background-color: #1f386e;
        color: white;
    }

    

    /* .submitAddUser,
    .cancelAddUser {
        border-radius: 10px;
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        cursor: pointer;
        padding: 10px 5px;
    }

    .submitAddUser:hover,
    .cancelAddUser:hover {
        background-color: #311B92;
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

    @media only screen and (max-width: 400px) {
        #addUserBtn {
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
</style>


<!--start wrapper-->
<div class="wrapper">


    <!-- start page content wrapper-->
    <div class="page-content-wrapper"style="margin-left: 172px !important;">
        <!-- start page content-->
        <div class="page-content">

            <!-- user-form -->
            <div id="addUserPopup">
                <h2>Add New User</h2>
                <form id="addUserForm">
                    <div class="form-row my-4">

                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="name" type="text" class="outside form-control" autocomplete="off"
                                     maxlength="60" />
                                <span class="floating-label-outside">Name</span>
                                <span class="text-danger" id="add_name_error"></span>

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="email" type="email" class="outside form-control" autocomplete="off"
                                     maxlength="60" />
                                <span class="floating-label-outside"> Email</span>
                                <span class="text-danger" id="add_email_error"></span>


                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <select name="role" id="role" class="outside form-select">
                                    <option value="admin">Admin</option>
                                    <option value="superadmin">Super Admin</option>
                                </select>
                                {{-- <span class="floating-label-outside"> Role</span> --}}

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="password" type="password" class="outside form-control" autocomplete="off"
                                     maxlength="25" />
                                <span class="floating-label-outside"> Password</span>
                                <span class="text-danger" id="add_password_error"></span>


                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="submitAddUser inquiry-btn btn-sm editButton  add_submit">Submit</button>
                        <button type="button" id="cancelAddUser"
                            class="cancelAddUser inquiry-btn-delete btn-sm editButton">Cancel</button>
                        <button class="btn inquiry-btn btn-sm addbtn_loading text-center" type="button" disabled="">
                            <span class="spinner-border spinner-border-sm me-1" role="status"
                                aria-hidden="true"></span>
                            Please wait...</button>

                    </div>
                </form>
            </div>

            {{-- edit user form  --}}
            <div id="editUserPopup">
                <h2>Edit User</h2>
                <form id="editUserForm">
                    <div class="form-row my-4">

                        <div class="form-group col-md-12">
                            <input type="hidden" name="user_id_edit" id="user_id_edit">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="name_edit" name="name_edit" type="text" class="outside form-control" maxlength="60"
                                    autocomplete="off" />
                                <span class="floating-label-outside">Name</span>
                                <span class="text-danger" id="edit_name_error"></span>

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="email_edit" name="email_edit" type="email" class="outside form-control"maxlength="60"
                                    autocomplete="off" />
                                <span class="floating-label-outside"> Email</span>
                                <span class="text-danger" id="edit_email_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <select name="role_edit" id="role_edit" class="outside form-select">
                                    <option value="admin">Admin</option>
                                    <option value="superadmin">Super Admin</option>
                                </select>
                                {{-- <span class="floating-label-outside"> Role</span> --}}

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                <input id="password_edit" name="password_edit" type="password"
                                    class="outside form-control" autocomplete="off" maxlength="25" />
                                <span class="floating-label-outside"> Enter New Password</span>
                                <span class="text-danger" id="edit_password_error"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="submitAddUser inquiry-btn btn-sm editButton">Submit</button>
                    <button type="button" id="canceleditUser"
                        class="cancelAddUser inquiry-btn-delete btn-sm editButton">Cancel</button>
                </form>
            </div>

            <button id="addUserBtn" class="d-flex align-items-center justify-content-center adduserbtn"><i
                    class="lni lni-circle-plus pe-2"></i> Add User</button>

            <table id="userTable" class="table table-striped table-bordered dataTable" role="grid"
                aria-describedby="example2_info">

                <thead>
                    <tr role="row" style="background-color: #e5e5e5;">
                        <th>S.No</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Role</th>

                        <th>Created at</th>

                        <th class="col-3">Action
                        </th>
                    </tr>
                </thead>
                <tbody>

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



<!-- user-form -->

<script>
    $('.addbtn_loading').hide();
    $(document).ready(function() {

        $('#userTable').DataTable({
            
            "processing": true,
            "serverSide": false,
            "searching": true,
            "ajax": {
                "url": "{{ route('getAllUsers') }}",
                "type": "GET",
                "dataSrc": "users"
            },
            "columns": [{
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        if (row.is_super_admin == 1) {
                            return 'Super Admin';
                        } else {
                            return 'Admin';
                        }
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                    if (type === 'display' && data !== null) {
                        var date = new Date(row.created_at);
                        var monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"];
                        var day = date.getDate();
                        var monthIndex = date.getMonth();
                        var year = date.getFullYear();
                        return day + ' ' + monthNames[monthIndex] + ' ' + year;
                    } else {
                        return data;
                    }
                }
                },

                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return '<div class="text-right">' +
                            '<button class="inquiry-btn btn-sm editButton editUserbtn me-2" value="' +
                            row.id +
                            '" style=" text-align: center;"><i class="lni lni-pencil pe-2"></i>Edit</button>' +
                            '<button class="deleteUserbtn inquiry-btn-delete btn-sm editButton"style="float: right; text-align: center;" value="' +
                            row.id + '"><i class="lni lni-trash pe-2"></i>Delete</button>' +
                            '</div>';

                    }
                },
            ]
        });





        $('.adduserbtn').click(function() {
            $('#addUserPopup').fadeIn();
        });
        $('#cancelAddUser').click(function() {
            $('#addUserPopup').fadeOut();
        });


        $('#editUserPopup').hide();
        $('#userTable').on('click', '.editUserbtn', function() {
            var userId = $(this).val();
            $.ajax({
                url: '/users/' + userId,
                type: 'GET',
                success: function(response) {
                    
                    $('#user_id_edit').val(response.id);
                    $('#name_edit').val(response.name);
                    $('#email_edit').val(response.email);
                    $('#role_edit').val(response.role);
                    $('#editUserPopup').fadeIn();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            var id = $('#user_id_edit').val();
            var name = $('#name_edit').val();
            var email = $('#email_edit').val();
            var password = $('#password_edit').val();
            var role = $('#role_edit').val();

            var error = false;
            if(name.length > 60){
                $('#edit_name_error').text('Name can not be greater than 60 characters');
                error = true;
            }else if(name.length == 0 || name.length == '0'){
                $('#edit_name_error').text('Name is required');
                error = true;
            }else{
                $('#edit_name_error').text('');
            }

            if(email.length > 60){
                $('#edit_email_error').text('Email can not be greater than 60 characters');
                error = true;
            }else if(email.length == 0 || email.length == '0'){
                $('#edit_email_error').text('Email is required');
                error = true;
            }else{
                $('#edit_email_error').text('');
            }
            if(password.length > 0){
                if(password.length < 5 || password.length > 25){
                $('#edit_password_error').text('Password must be between 7 and 25 characters');
                error = true;
            }else{
                $('#edit_password_error').text('');
            }
            }
            
            if(error){
                $('.addbtn_loading').hide();
                $('.add_submit').show();
                $('.cancelAddUser').show();
                return;
            }

            else{
            $.ajax({
                url: '{{ route('updateUser') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name,
                    email: email,
                    password: password,
                    role: role,
                    id: id,
                },
                success: function(response) {

                    $('#addUserPopup').fadeOut();
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }


        });


        // Cancel edit User
        $('#canceleditUser').click(function() {
            $('#editUserPopup').fadeOut();
            $('#user_id_edit').val();
            $('#name_edit').val();
            $('#email_edit').val();
            $('#password_edit').val();
        });


        // Add User
        $('#addUserForm').submit(function(e) {
            $('.addbtn_loading').show();
            $('.add_submit').hide();
            $('.cancelAddUser').hide();

            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var role = $('#role').val();
            var error = false;
            if(name.length > 60){
                $('#add_name_error').text('Name can not be greater than 60 characters');
                error = true;
            }else if(name.length == 0 || name.length == '0'){
                $('#add_name_error').text('Name is required');
                error = true;
            }else{
                $('#add_name_error').text('');
            }

            if(email.length > 60){
                $('#add_email_error').text('Email can not be greater than 60 characters');
                error = true;
            }else if(email.length == 0 || email.length == '0'){
                $('#add_email_error').text('Email is required');
                error = true;
            }else{
                $('#add_email_error').text('');
            }
            if(password.length < 5 || password.length > 25){
                $('#add_password_error').text('Password must be between 7 and 25 characters');
                error = true;
            }else if(password.length == 0 || password.length == '0'){
                $('#add_password_error').text('Password is required');
                error = true;
            }else{
                $('#add_password_error').text('');
            }

            if(error){
                $('.addbtn_loading').hide();
                $('.add_submit').show();
                $('.cancelAddUser').show();
                return;
            }
            else{
            $.ajax({
                url: '{{ route('addUser') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name,
                    email: email,
                    password: password,
                    role: role,
                },
                success: function(response) {
                    // console.log(response.email_error);
                    if(response.email_error == true || response.email_error == 'true'){
                        $('#add_email_error').text('User with this email already exists');
                        $('.addbtn_loading').hide();
                        $('.add_submit').show();
                        $('.cancelAddUser').show();
                        return;
                    }
                    $('.addbtn_loading').hide();
                    $('.add_submit').show();
                    $('.cancelAddUser').show();
                    $('#addUserPopup').fadeOut();
                    alert('User added successfully');
                    setTimeout(() => {
                        
                        window.location.reload();
                    }, 1000);
                    
                    
                },
                error: function(xhr, status, error) {
                        // console.log(error);
                        
                
                    
                }
            });
        }


        });

        // to delete user 
        $('#userTable').on('click', '.deleteUserbtn', function() {
            if (confirm('Are you sure you want to delete this user?')) {
                var userId = $(this).val();
                $.ajax({
                    url: '/users/' + userId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'deleted') {

                            alert('User deleted');
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
        });










    });
</script>
@include('layouts/admin/footer')
