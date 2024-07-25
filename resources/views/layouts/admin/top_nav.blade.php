
    <!--start top header-->
    <header class="top-header" style="position:fixed; left:172px">
        <nav class="navbar navbar-expand gap-3">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
              {{-- <div class="breadcrumb-title pe-3">Dashboard</div> --}}
              <div class="ps-3">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb mb-0 p-0 align-items-center">
                          <li class="breadcrumb-item"><a href="javascript:;">
                            @if ($pageTitle == 'Dashboard')
                            <ion-icon name="home-outline"></ion-icon>
                            @endif
                            @if ($pageTitle == 'Users')
                            <i class="bi bi-person"></i>
                            @endif
                            @if ($pageTitle == 'Inquiries')
                            <i class="bi bi-files"></i>
                            @endif
                            @if ($pageTitle == 'Tenant Inquiries')
                            <i class="bi bi-file-earmark-zip"></i>
                            @endif
                            @if ($pageTitle == 'Audit')
                            <i class="bi bi-file-earmark-zip"></i>
                            @endif
                            @if ($pageTitle == 'Get In Touch')
                            <i class="material-icons" style="font-size: 18px;">chat</i>
                            @endif

                                
                              </a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                      </ol>
                  </nav>
              </div>
              <div class="ms-auto">
              </div>
          </div>
          <!--end breadcrumb-->
          <div class="mobile-menu-button">
            <i class="bi bi-list"></i>
          </div>
          <div class="hidden d-none">
          <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
              <i class="bi bi-search"></i>
            </div>
            <input class="form-control" type="text" placeholder="Search for anything">
            <div class="position-absolute top-50 translate-middle-y search-close-icon">
              <i class="bi bi-x-lg"></i>
            </div>
          </form>
        </div>
          <div class="top-navbar-right ms-auto">
  
            <ul class="navbar-nav align-items-center">
              <li class="nav-item mobile-search-button">
                <a class="nav-link" href="javascript:;">
                  <div class="">
                    <i class="bi bi-search"></i>
                  </div>
                </a>
              </li>
              
              <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <div class="user-setting">
                    <img src="{{asset('assets/admin/images/logo-icon-2.png')}}" class="user-img" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex flex-row align-items-center gap-2">
                        <img src="{{asset('assets/admin/images/logo-icon-2.png')}}" alt="" class="rounded-circle" width="54" height="54">
                        <div class="">
                          <h6 class="mb-0 dropdown-user-name">{{Auth::user()->name}}</h6>
                          @if (Auth::user()->is_super_admin == 1)
                          <small class="mb-0 dropdown-user-designation text-secondary">Super Admin</small>      
                          @endif
                          @if (Auth::user()->is_super_admin == 0)
                          <small class="mb-0 dropdown-user-designation text-secondary">Admin</small>
                          @endif
                          @if (Auth::user()->role == 'user')
                          <small class="mb-0 dropdown-user-designation text-secondary">User</small>
                          @endif
                         
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  {{-- <li>
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <div class="ms-3"><span>Profile</span></div>
                      </div>
                    </a>
                  </li> --}}



                  <li>
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <ion-icon name="log-out-outline"></ion-icon>
                        </div>
                        <div class="ms-3"><span><form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="text" style="border: none; background: transparent;">logout</button>
                      </form></span></div>
                      </div>
                    </a>
                  </li>

                  
                
                </ul>
              </li>
  
            </ul>
  
          </div>
        </nav>
      </header>
      <!--end top header-->
  
  
  