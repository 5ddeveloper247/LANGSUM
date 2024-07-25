    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true" style="width: 172px !important;">
        <div class="sidebar-header"style="width: 172px !important;">
          <div>
            <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/admin/images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
          </a>
          </div>
          <div>
          <a href="{{route('dashboard')}}">  <h4 class="logo-text">Langsam</h4></a>
          </div>
          {{-- <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
          </div> --}}
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu" style="margin-bottom: 0px;">
          <li>
            <a href="{{route('dashboard')}}" class="">
              <div class="parent-icon">
                <i class="bi bi-house-door"></i>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>
          
          </li>
            </ul>
            @if (Auth::user()->is_super_admin == 1)
                
            <ul class="metismenu" id="menu" style="margin-top: 0px; padding-top: 0px;">
              <li>
                <a href="{{route('users')}}" class="">
                  <div class="parent-icon">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="menu-title">Users</div>
                </a>
                
              </li>
            </ul>
            @endif
  
            <ul class="metismenu" id="menu" style="margin-top: 0px; padding-top: 0px;">
              <li>
                <a href="{{url('admin/inquiry')}}" class="">
                  <div class="parent-icon">
                    <!-- <i class="bi bi-files"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="currentColor"><path d="M19 25.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-2.5 0a2 2 0 1 0-4 0a2 2 0 0 0 4 0M10 15.25c0-.69.56-1.25 1.25-1.25h20.5a1.25 1.25 0 1 1 0 2.5h-20.5c-.69 0-1.25-.56-1.25-1.25m12.25 9.25a1.25 1.25 0 1 0 0 2.5h9.5a1.25 1.25 0 1 0 0-2.5z"/><path d="M10.75 5A5.75 5.75 0 0 0 5 10.75v21.5A5.75 5.75 0 0 0 10.75 38h21.5A5.75 5.75 0 0 0 38 32.25v-21.5A5.75 5.75 0 0 0 32.25 5zM7.5 10.75a3.25 3.25 0 0 1 3.25-3.25h21.5a3.25 3.25 0 0 1 3.25 3.25v21.5c0 .456-.094.89-.264 1.285A3.24 3.24 0 0 1 32.25 35.5h-21.5a3.24 3.24 0 0 1-2.999-1.995A3.2 3.2 0 0 1 7.5 32.25z"/><path d="M15.25 42.5a5.74 5.74 0 0 1-4.747-2.504q.123.004.247.004h21.5A7.75 7.75 0 0 0 40 32.25v-21.5q0-.123-.004-.247A5.74 5.74 0 0 1 42.5 15.25v17c0 5.66-4.59 10.25-10.25 10.25z"/></g></svg>
                  </div>
                  <div class="menu-title">Inquiry Form</div>
                </a>
              
              </li>
            </ul>
  
            <ul class="metismenu" id="menu" style="margin-top: 0px; padding-top: 0px;">
              <li>
                <a href="{{route('tenantView')}}" class="">
                  <div class="parent-icon">
                    <!-- <i class="bi bi-file-earmark-zip"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><circle cx="24.5" cy="9.5" r="1.5" fill="currentColor"/><path fill="currentColor" d="M17.414 22H12v-5.414l6.03-6.03A5 5 0 0 1 18 10a6 6 0 1 1 6 6a5 5 0 0 1-.556-.03ZM14 20h2.586l6.17-6.17l.518.095A4 4 0 0 0 24 14a4.05 4.05 0 1 0-3.925-3.273l.095.517l-6.17 6.17Z"/><path fill="currentColor" d="M28 18v8H10V6h4V4H4a2.003 2.003 0 0 0-2 2v20a2.003 2.003 0 0 0 2 2h24a2.003 2.003 0 0 0 2-2v-8ZM4 6h4v20H4Z"/></svg>                  </div>
                  <div class="menu-title">Tenant Inquiry</div>
                </a>
              
              </li>
            </ul>
            
            <ul class="metismenu" id="menu" style="margin-top: 0px; padding-top: 0px;">
              <li>
                <a href="{{route('admin.audit')}}" class="">
                  <div class="parent-icon">
                    <!-- <i class="bi bi-file-earmark-zip"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="M296 250c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zm184 144H296c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8m-48 458H208V148h560v320c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8V108c0-17.7-14.3-32-32-32H168c-17.7 0-32 14.3-32 32v784c0 17.7 14.3 32 32 32h264c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8m440-88H728v-36.6c46.3-13.8 80-56.6 80-107.4c0-61.9-50.1-112-112-112s-112 50.1-112 112c0 50.7 33.7 93.6 80 107.4V764H520c-8.8 0-16 7.2-16 16v152c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V780c0-8.8-7.2-16-16-16M646 620c0-27.6 22.4-50 50-50s50 22.4 50 50s-22.4 50-50 50s-50-22.4-50-50m180 266H566v-60h260z"/></svg>
                  </div>
                  <div class="menu-title">Audit Form</div>
                </a>
              
              </li>
            </ul>
  
            <ul class="metismenu" id="menu" style="margin-top: 0px; padding-top: 0px;">
              <li>
                <a href="{{route('admin.contact')}}" class="">
                  <div class="parent-icon">
                    <i class="material-icons" style="font-size: 18px;">chat</i>
                  </div>
                  <div class="menu-title">Get In Touch</div>
                </a>
              
              </li>
            </ul>
        
        <!--end navigation-->
      </aside>
      <!--end sidebar -->