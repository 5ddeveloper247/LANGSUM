<script type="text/javascript" src="{{ asset('assets/website/js/bootstrap.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('assets/website/js/SmoothScroll.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/website/js/nivo-lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/website/js/jqBootstrapValidation.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('assets/website/js/contact_me.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/website/js/main.js') }}"></script>

<script>
    function toggleVisibility() {
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("readMoreBtn");

        if (moreText.style.display === "none" || moreText.style.display === "") {
            moreText.style.display = "block";
            btnText.textContent = "Read Less";
        } else {
            moreText.style.display = "none";
            btnText.textContent = "Read More";
        }
    }
</script>
</body>

</html>
