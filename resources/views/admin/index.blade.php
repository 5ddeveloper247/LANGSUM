@include('layouts/admin/header')
@include('layouts/admin/sidebar')
@include('layouts/admin/top_nav')

<style>
    .dashboard-counters {
        min-height: 50px;
    }
    .widget-icon {
        cursor: auto !important;
    }
</style>
<!--start wrapper-->
<div class="wrapper">


    <!-- start page content wrapper-->
    <div class="page-content-wrapper"style="margin-left: 172px !important;">
        <!-- start page content-->
        <div class="page-content">

          


            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-5">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-files"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $inquiryCount }}</h3>
                                <p class="text-muted dashboard-counters">Total Inquiries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-files"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $inquiryActiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Active Inquiries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-files"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $inquiryInactiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Deleted Inquiries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-file-earmark-zip"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $tenantCount }}</h3>
                                <p class="text-muted dashboard-counters">Total Tenant Inquirirs</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-file-earmark-zip"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $tenantActiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Active Tenant Inquiries</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->

            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-5">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-file-earmark-zip"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $tenantInactiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Deleted Tenant Inquiries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $userCount }}</h3>
                                <p class="text-muted dashboard-counters">Total Users</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $contactCount }}</h3>
                                <p class="text-muted dashboard-counters">Total Get In Touch Queries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $contactActiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Replied Get In Touch Queries</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="mx-auto widget-icon bg-light-dark text-dark">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <div class="text-center mt-3">
                                <h3 class="text-dark mb-1">{{ $contactInactiveCount }}</h3>
                                <p class="text-muted dashboard-counters">Unread Get In Touch Queries</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->








        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
</div>
@include('layouts/admin/footer')
