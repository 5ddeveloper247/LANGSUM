
    <!--start footer-->
    <footer class="footer">
        <div class="footer-text">
          Copyright © 2024. All right reserved.
        </div>
      </footer>
      <!--end footer-->
  
  
      <!--Start Back To Top Button-->
      <a href="javaScript:;" class="back-to-top">
        <ion-icon name="arrow-up-outline"></ion-icon>
      </a>
      <!--End Back To Top Button-->
  
      <!--start switcher-->
      <div class="switcher-body">
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
          tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" >
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option1" checked>
              <label class="form-check-label" for="SemiDark">Semi Dark</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>
      <!--end switcher-->
  
  
      <!--start overlay-->
      <div class="overlay nav-toggle-icon"></div>
      <!--end overlay-->
  
    </div>
    <!--end wrapper-->
  
  
    <!-- JS Files-->
    {{-- <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('assets/admin/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{asset('assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/index.js')}}"></script>
    <!-- Main JS-->
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
  
  </body>
  
  </html>