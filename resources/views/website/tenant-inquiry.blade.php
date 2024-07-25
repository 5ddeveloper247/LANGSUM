@include('layouts/website/header')
<script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    p {
        color: grey
    }

    .row {
        display: flex;
    }

    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform .action-button {
        border-radius: 10px;
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        /* float: right */
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        cursor: pointer;
        border-radius: 10px;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        /* float: right */
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
        display: flex;
        justify-content: center;
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f0d6"
    }

    #progressbar #terms::before {
        font-family: FontAwesome;
        content: "\f15b";
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover;
        height: 40px;
        ;
    }

    .mt_180 {
        margin-top: 180px;
    }

    /* signatur */
    .signature {
        /* border-bottom: 1px solid rgb(26, 26, 26); */
        height: 135px;
        width: 100%;
    }

    #root {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }

    canvas {
        width: 100%;
    }

    .date-btn {
        border: 0;
    }

    .sign-btn {
        position: absolute;
        bottom: 1px;
        right: 16px;
    }

    .reset-btn,
    .save-btn {
        background-color: #e9ecef;
        color: #555;
        padding: 12px;
        cursor: pointer;
        border: none;
        font-size: 12px;
    }

    .reset-btn:focus,
    .save-btn:focus {
        outline: none !important;
    }
    .datee .floating-label-outside {
    position: absolute;
    pointer-events: none;
    left: 30px;
    top: -11px;
    transition: .2s ease all;
    color: #777;
    font-weight: 600;
    font-size: 12px;
    letter-spacing: .5px;
    z-index: 3;
    text-transform: uppercase;
}
.datee-2 .floating-label-outside {
    position: absolute;
    pointer-events: none;
    left: 45px;
    top: -8px;
    background-color: white;
    transition: .2s ease all;
    color: #777;
    font-weight: 600;
    font-size: 12px;
    letter-spacing: .5px;
    z-index: 3;
    text-transform: uppercase;
}
.hasDatepicker{
    background-color: white !important;
}
</style>

<div id="add_page">
<div class="container mt_180">
    <div class="row" style="justify-content: center;">
        <div class="col-12 text-center">
            <div class="card">
                <h2 class="text-center text-capitalize heading-login">Langsam Property Services </h2>
                <h4> 1601 Bronxdale Ave suite 201 Bronx NY 10462 </h4>
                <h4> 718-518-8000 </h4>
                <h4> TENANT INQUIRY FORM</h4>

                <form id="msform" action="{{ route('SubmitTenant') }}" class="tenant_form" method="POST">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <!-- <li class="hidden" id="personal"><strong>Tentant Information</strong></li> -->
                        <li id="account" class="active"><strong>Personal Information</strong></li>
                        <li id="payment"><strong>Landlord</strong></li>
                        <li id="personal"><strong>Personal History</strong></li>
                        <li id="terms"><strong>Acknowledge</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>

                    <br>


                   
                    <!-- <fieldset>
                        <div class="form-card">

                            <div class="container">
                                <div class="" style="margin-top: 30px;">

                                    <div class="form-row">
                                        <div class="form-group col-md-12" style="display: flex; align-items: start; justify-content: start; padding: 0px;">
                                            <div class="form-group col-md-3">
                                                <div class="position-relative datee" style="margin-top: 5px;">
                                                    <input type="text" class="outside form-control" name="step1_date" readonly id="step1_date" />
                                                    <span class="floating-label-outside">Date<span class="text-danger">*</span></span>

                                                </div>
                                            </div>

                                            </p>
                                        </div>
                                    </div>


                                    <div class="form-row" style="margin-top: 5px;">

                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" class="outside form-control" name="step1_contact" maxlength="18" id="step1_contact" />
                                                <span class="floating-label-outside">Contact<span class="text-danger">*</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" class="outside form-control" name="step1_telephone" maxlength="18" id="step1_telephone" />
                                                <span class="floating-label-outside">Tel.No<span class="text-danger">*</span></span>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" class="outside" name="step1_building_address" maxlength="100" id="step1_building_address" />
                                                <span class="floating-label-outside">Building Address<span class="text-danger">*</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" class="outside" maxlength="10" name="step1_apt_no" id="step1_apt_no" />
                                                <span class="floating-label-outside">Apt#<span class="text-danger">*</span> </span>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" maxlength="10" class="outside" name="step1_zip" id="step1_zip" />
                                                <span class="floating-label-outside">Zip code<span class="text-danger">*</span> </span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">

                                        <a href="#msform" class="hidden"> <button type="button" class="btn btn-custom next action-button tostep2_real" value="Next" name="tostep2" id="next-button" style="margin: 20px 0px;">Next
                                                Page</button></a>
                                        <a href="#msform" class=""> <button type="button" class="btn btn-custom action-button tostep2_tovalidate" name="tostep2_tovalidate" onclick="validateStep1()" style="margin: 20px 0px;">Next
                                                Page</button></a>
                                        <input type="button" name="next" class="next action-button" value="Next" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset> -->

                    <fieldset>
                        <div class="container">
                            <div id="account" style="margin-top: 30px;">
                                <h4>Tenant Performance, Credit, Employment and Criminal Check</h4>
                                <p class="" style="padding: 0px 13px;">Applicant Information (Please complete a
                                    separate inquiry form for each
                                    applicant) </p>
                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step2_lname" maxlength="20" id="step2_lname" />
                                            <span class="floating-label-outside">Last Name<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step2_fname" maxlength="20" id="step2_fname" />
                                            <span class="floating-label-outside"> First Name<span class="text-danger">*</span></span>

                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step2_mname" maxlength="20" id="step2_mname" />
                                            <span class="floating-label-outside"> Middle<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside" name="step2_ss" maxlength="18" id="step2_ss" />
                                            <span class="floating-label-outside">SS#<span class="text-danger">*</span></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4 datee-2" style="margin-top: 5px;">
                                            <input type="text" class="outside" name="step2_dob" id="step2_dob" readonly />
                                            <span class="floating-label-outside">DOB<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside" name="step2_phone" id="step2_phone" maxlength="18" minlength="7" />
                                            <span class="floating-label-outside">Phone<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" maxlength="50" name="step2_co-applicant" id="step2_co-applicant" />
                                            <span class="floating-label-outside">Co-Applicant's Name<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside" name="step2_present_address" maxlength="100" id="step2_present_address" />
                                            <span class="floating-label-outside">Present Address<span class="text-danger">*</span></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside" name="step2_apt_no" id="step2_apt_no" maxlength="10" />
                                            <span class="floating-label-outside"> Apt#<span class="text-danger">*</span> </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside" name="step2_city" id="step2_city" maxlength="20" />
                                            <span class="floating-label-outside"> City<span class="text-danger">*</span> </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside" name="step2_state" id="step2_state" maxlength="20" />
                                            <span class="floating-label-outside"> State<span class="text-danger">*</span> </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside" name="step2_zip" id="step2_zip" maxlength="10" />
                                            <span class="floating-label-outside"> Zip<span class="text-danger">*</span> </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <!-- <a href="#msform" class=""> <button type="button" name="previous" class="previous action-button-previous" value="Previous" style="margin: 20px 10px;">Previous </button></a> -->
                                    <a href="#msform" class="hidden"> <button type="button" class="btn btn-custom next action-button tostep3_real" name="tostep3" value="Next" id="next-button " style="margin: 20px 10px;">Next
                                        </button></a>
                                    <a href="#msform" class=""> <button type="button" class="btn btn-custom action-button tostep3_tovalidate" name="tostep3_tovalidate" onclick="validateStep2()" style="margin: 20px 0px;">Next
                                            Page</button></a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>

                        <div class="container">

                            <div id="credit" style="margin-top: 30px;">

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_landlord" maxlength="50" id="step3_landlord" />
                                            <span class="floating-label-outside">Name<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside form-control" maxlength="18" minlength="7" name="step3_landlord_tel" id="step3_landlord_tel" />
                                            <span class="floating-label-outside">Tel#<span class="text-danger">*</span></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">
                                    <h4>Employer Information </h4>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_employer" maxlength="50" id="step3_employer" />
                                            <span class="floating-label-outside">Name<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside form-control" maxlength="18" minlength="7" name="step3_employer_tel" id="step3_employer_tel" />
                                            <span class="floating-label-outside">Tel#<span class="text-danger">*</span></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_employer_address" maxlength="100" id="step3_employer_address" />
                                            <span class="floating-label-outside">Address<span class="text-danger">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_employer_contact" maxlength="18" id="step3_employer_contact" />
                                            <span class="floating-label-outside">Contact<span class="text-danger">*</span></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_employer_position" maxlength="20" id="step3_employer_position" />
                                            <span class="floating-label-outside">Position</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4 datee-2" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control" name="step3_employer_sdate" readonly id="step3_employer_sdate" />
                                            <span class="floating-label-outside">Start Date</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside form-control" name="step3_employer_salary" maxlength="7" id="step3_employer_salary" />
                                            <span class="floating-label-outside">Salary $</span>

                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous" class="previous action-button-previous" value="Previous" style="margin: 20px 10px;">Previous </button></a>
                                    <a href="#msform" class="hidden"><button type="button" class="btn btn-custom next action-button tostep4_real" name="tostep4_real" value="Next" id="next-button " style="margin: 20px 10px;">Next</button></a>

                                    <a href="#msform" class=""> <button type="button" class="btn btn-custom action-button tostep4_tovalidate" name="tostep4_tovalidate" onclick="validateStep3()" style="margin: 20px 0px;">Next
                                            Page</button></a>

                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>

                        <div class="container">

                            <div id="reference" style="margin-top: 30px;">
                                <div class="col-md-12" style="margin: 20px 0px; padding: 0px;">
                                    
                                </div>
                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-check larger-checkbox form-check-inline col-md-6 checkboxdata step4_move_check" style="display: flex;
                                    justify-content: start;
                                    gap: 12px;
                                    align-items: center; margin: 10px 0px;">
                                        <h6>Have you ever been asked to move or evicted?<span class="text-danger">*</span> </h6>
                                        <input type="checkbox" class="form-check-input increae step4_move_check1" name="step4_move_check" value="1" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1"> Yes</label>
                                        <input type="checkbox" class="form-check-input increae step4_move_check0" name="step4_move_check" value="0" id="checkbox2">
                                        <label class="form-check-label" for="checkbox2">No</label>
                                    </div>
                                    <div class="form-check larger-checkbox form-check-inline col-md-6 checkboxdata step4_bankrupt_check" style="display: flex;
                                    justify-content: start;
                                    gap: 12px;
                                    align-items: center;margin: 10px 0px;">
                                        <h6>Declared bankruptcy?<span class="text-danger">*</span></h6>

                                        <input type="checkbox" class="form-check-input increae step4_bankrupt_check1" name="step4_bankrupt_check" value="1" id="checkbox3">
                                        <label class="form-check-label" for="checkbox3"> Yes</label>
                                        <input type="checkbox" class="form-check-input increae step4_bankrupt_check0" name="step4_bankrupt_check" value="0" id="checkbox4">
                                        <label class="form-check-label" for="checkbox4">No</label>
                                    </div>
                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">
                                    <div class="form-check larger-checkbox form-check-inline col-md-6 checkboxdata step4_rental_agreement_check" style="display: flex;
                                        justify-content:flex-start;
                                        gap: 12px;
                                        align-items: center;margin: 10px 0px;">
                                        <h6>Broken a rental agreement or lease?<span class="text-danger">*</span></h6>
                                        <input type="checkbox" class="form-check-input increae step4_rental_agreement_check1" name="step4_rental_agreement_check" value="1" id="checkbox5">
                                        <label class="form-check-label" for="checkbox5"> Yes</label>
                                        <input type="checkbox" class="form-check-input increae step4_rental_agreement_check0" name="step4_rental_agreement_check" value="0" id="checkbox6">
                                        <label class="form-check-label" for="checkbox6">No</label>
                                    </div>
                                    <div class="form-check larger-checkbox form-check-inline col-md-6 checkboxdata step4_sued_check" style="display: flex;
                                        justify-content: start;
                                        gap: 12px;
                                        align-items: center; margin: 10px 0px;">
                                        <h6>Been sued for damaged to rental unit?<span class="text-danger">*</span> </h6>
                                        <input type="checkbox" class="form-check-input increae step4_sued_check1" name="step4_sued_check" value="1" id="checkbox7">
                                        <label class="form-check-label" for="checkbox7"> Yes</label>
                                        <input type="checkbox" class="form-check-input increae step4_sued_check0" name="step4_sued_check" value="0" id="checkbox8">
                                        <label class="form-check-label" for="checkbox8">No</label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous" class="previous action-button-previous" value="Previous" style="margin: 20px 10px;">Previous </button></a>
                                    <a href="#msform" class="hidden"> <button type="button" class="btn btn-custom next action-button tostep5_real" name="tostep5_real" value="Next" id="next-button " style="margin: 20px 10px;">Next</button></a>

                                    <a href="#msform" class=""> <button type="button" class="btn btn-custom action-button tostep4_tovalidate" name="tostep5_tovalidate" onclick="validateStep4()" style="margin: 20px 0px;">Next
                                            Page</button></a>

                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>

                        <div class="container">

                            <div id="terms" style="margin-top: 30px;">

                                <div class="form-row">
                                    <div class="form-group col-12" style="padding: 0px 13px;">
                                        <h4 class="font-w-bold">Please read carefully</h4>
                                        <p style="text-align: justify;" style="padding: 0px 13px;">I hereby state and
                                            present that all of my personal information contained in the landlord's
                                            rental application is complete, true, and accurate. I
                                            understand that in the event that I am issued a lease based upon materially
                                            false and inaccurate information supplied by me in the said
                                            application, the landlord may have the right to cancel said lease. I hereby
                                            authorize the landlord/and or the landlord's agents the right to verify
                                            the information contained in the application. I hereby authorize Langsam
                                            Property Services the right to obtain any information relating to and
                                            about me, including but not limited to my credit status, tenant history,
                                            check writing history, court records and criminal records. I hereby
                                            authorize and instruct any person or entity contacted by Langsam Property
                                            Services, the landlord, or the landlord's agents to cooperate with,
                                            and to release any requested information or records relating to me to them.
                                            I acknowledge and fully understand that Langsam Property Services
                                            will gather such information about me from various sources both public and
                                            private, and relate said information to the landlord. I will hold
                                            Langsam Property Services harmless and not responsible for any inaccuracies
                                            that may be contained in said information. Upon written request
                                            to Langsam Property Services I will be provided with the nature of the
                                            information obtained as well as its source and origin. I shall be afforded
                                            the opportunity to correct any material inaccuracies.
                                        </p>
                                    </div>
                                </div>

                                {{-- <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <h6 style="display: flex;">PLEASE NOTE CREDIT CHECk FEE IS NON-REFUNDABLE </h6>
                                        <div class="signature">
                                            <input type="hidden" name="signature" id="signature">
                                            <div id='root'></div>
                                            <div class="" style="position: absolute; bottom: 0; padding: 5px;">
                                                <input class="date-btn"name="sign_date" type="date" id="datepicker"
                                                    value="<%= new Date().toISOString().split('T')[0] %>" />
                                            </div>
                                            <div class="sign-btn" style="position: absolute;">
                                                <input type="button" value="Reset" id="resetCanvas"
                                                    class="reset-btn" />
                                                <input type="button" value="Save as image" id="getImage"
                                                    class="save-btn" />

                                            </div>
                                            <img id="image" class="image full-width" />
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="form-row" style="padding: 0px 13px;">

                                    <input type="hidden" name="signature" id="signature">

                                    <h5 style="text-align: left;
                                    border-bottom: 2px solid black;
                                    width: fit-content;">
                                        Please Signature below the field or attach your signature
                                        (PLEASE NOTE CREDIT CHECk FEE IS NON-REFUNDABLE)<span class="text-danger">*</span></h5>

                                    <div class="form-group signature-group">

                                        <div class="col-xs-12 col-sm-8" style="padding: 0px 15px 0px 0px; border:1px solid #ced4da;">

                                            <div class="signature">
                                                <div id='root'></div>
                                                <div class="" style="position: absolute; bottom: 0; padding: 5px;">
                                                    <input class="date-btn outside sign_date" name="sign_date" type="text" readonly id="datepicker" placeholder="Select signature date" />
                                                </div>
                                                <div class="sign-btn" style="position: absolute;">
                                                    <input type="button" value="Reset" id="resetCanvas" class="reset-btn" />
                                                    <input type="button" value="Save" id="getImage" class="save-btn" />

                                                </div>
                                                <img id="image" class="image full-width" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 signature-export" style="padding: 0px;display:flex; align-items:end;  border:1px solid #ced4da;height:137px; ">
                                            <input type="file" id="fileInput" style="display: none;">
                                            <button class="export-btn save-btn" type="button" onclick="exportFile()">Attach</button>
                                            <span id="fileNameDisplay"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous" class="previous action-button-previous" value="Previous" style="margin: 20px 10px;">Previous </button></a>
                                    {{-- <button type="submit" value="Submit" class="btn btn-custom  action-button hidden submit_real" id="submit" style="margin: 20px 0px;">Submit</button> --}}
                                    <button type="button" value="Submit" class="btn btn-custom  action-button submit_validate" id="" style="margin: 20px 0px;" onclick="validateStep5()">Submit</button>



                                </div>
                            </div>

                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</div>

</div>

<div id="success_page"class="hidden">
    <div class="container" style="margin-top: 120px;">
        <div class="row" style="justify-content: center;">
            <div class="col-12 text-center"style="width:100% !important">
                <div class="card">
                   
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="personal"><strong>Tentant Information</strong></li>
                            <li id="account" class="active"><strong>Personal Information</strong></li>
                            <li id="payment" class="active"><strong>Landlord</strong></li>
                            <li id="personal" class="active"><strong>Personal History</strong></li>
                            <li id="terms" class="active"><strong>Acknowledge</strong></li>
                            <li id="confirm" class="active"><strong>Finish</strong></li>
                        </ul>
    
                        <br>
                  
                        <fieldset>
                            <div class="form-card" style="display: flex; align-items: center; flex-direction: column;">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
    
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row " style="justify-content: center;">
                                    <div class="col-3"> <img src="{{asset('assets/website/img/tick.webp')}}" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row" style="justify-content: center;">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Form Submitted Successfully</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                   
                </div>
            </div>
        </div>
    </div>
    
    
</div>

<script>
    $(document).on('keyup', "[type=number], [type=email], [type=text]", function(e) {
        if (this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
        }
    });
    var isValid = false;
    $(document).ready(function() {
        $('input').on('keyup',function(){
            $(this).removeClass('is-invalid');
        });
        var today_date = new Date().toLocaleDateString('en-US', { month: '2-digit', year: 'numeric', day: '2-digit' });
        $("#step1_date").datepicker();
        $("#step1_date").val(today_date);
        $("#step2_dob").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            yearRange: "-100:+0"
        });
        $("#step3_employer_sdate").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
        });
        $("#datepicker").datepicker();
        $("#datepicker").val(today_date);
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;


        setProgressBar(current);

        $(".next").click(function() {
            // var current_step = $(this).attr('name');
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
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            previous_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
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


    });

    // signature
    const root = document.getElementById("root")
    const resetCanvas = document.getElementById("resetCanvas")
    const getImage = document.getElementById("getImage")
    const component = Signature(root, {
        width: 1050,
        height: 130,

    });

    resetCanvas.addEventListener("click", () => {
        component.value = [];
    });

    getImage.addEventListener("click", () => {
        $('#fileNameDisplay').text('');
        $('#signature').val('');
        $('#signature').val(component.getImage());
        Lobibox.notify('success', {

            size: 'mini',
            rounded: true,
            delayIndicator: false,
            icon: 'bx bx-x-circle',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: 'Signature Added'
        });
    });

    const today = new Date().toISOString().split('T')[0];
    datepicker.min = today;
    datepicker.max = today;


    function exportFile() {
        $('#resetCanvas').click();
        var fileInput = document.getElementById('fileInput');
        fileInput.onchange = function(e) {
            var file = e.target.files[0];
            var fileName = file.name;
            document.getElementById('fileNameDisplay').textContent = fileName;
            if (file) {
                $('#signature').val('');
                const reader = new FileReader();
                reader.onload = function(event) {
                    const base64String = event.target.result;
                    const imageElement = document.createElement('img');
                    imageElement.src = base64String;
                    const dataURL = `data:image/png;base64,${base64String.split(',')[1]}`;
                    $('#signature').val(dataURL);
                    
                    Lobibox.notify('success', {

                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Signature Added'
                    });
                };
                reader.readAsDataURL(file);
            } else {
                resultDiv.textContent = 'No file selected.';
            }
        };
        fileInput.click();
    }
</script>

<script>
   
    // function to validate fields from front end 
    function validateFields(fields) {
        $(".error-message").remove();
        var isValid = true;
        fields.forEach(function(fieldId) {
            var field = $("#" + fieldId);
            if (field.val().trim() === "") {
                isValid = false;
                field.addClass("is-invalid");
            } else {
                field.removeClass("is-invalid");
            }
        });
        if (!isValid) {
            Lobibox.notify('error', {

                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'Please fill all the required fields'
            });
        }
        return isValid;
    }


    // first step validations form backend

    function handleValidationResult(result) {
        isValid = result;

    }

    async function validateStep1() {
       
        var step1_date = $("#step1_date").val().trim();
        var step1_contact = $("#step1_contact").val().trim();
        var step1_telephone = $("#step1_telephone").val().trim();
        var step1_building_address = $("#step1_building_address").val().trim();
        var step1_apt_no = $("#step1_apt_no").val().trim();
        var step1_zip = $("#step1_zip").val().trim();

        try {
            const responsedata = await $.ajax({
                url: '{{ route('validateTenantStep1') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    step1_date: step1_date,
                    step1_contact: step1_contact,
                    step1_telephone: step1_telephone,
                    step1_building_address: step1_building_address,
                    step1_apt_no: step1_apt_no,
                    step1_zip: step1_zip,
                }
            });

            $('#step1_date').removeClass('is-invalid');
            $('#step1_contact').removeClass('is-invalid');
            $('#step1_telephone').removeClass('is-invalid');
            $('#step1_building_address').removeClass('is-invalid');
            $('#step1_apt_no').removeClass('is-invalid');
            $('#step1_zip').removeClass('is-invalid');

            const data = JSON.parse(responsedata);
            if (data.status === false || data.status === 'false') {
                handleValidationResult(false);
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Please fill all the required fields'
                });

                if (data.step1_date) {
                    $('#step1_date').addClass("is-invalid");
                }
                if (data.step1_contact) {
                    $('#step1_contact').addClass("is-invalid");
                }
                if (data.step1_telephone) {
                    $('#step1_telephone').addClass("is-invalid");
                }
                if (data.step1_building_address) {
                    $('#step1_building_address').addClass("is-invalid");
                }
                if (data.step1_apt_no) {
                    $('#step1_apt_no').addClass("is-invalid");
                }
                if (data.step1_zip) {
                    $('#step1_zip').addClass("is-invalid");
                    Lobibox.notify('error', {
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Zip cannot contain any special character'
                    });
                }
            } else {
                handleValidationResult(true);
                $('.tostep2_real').click();
            }
        } catch (error) {
            console.error("Error in AJAX request:", error);
            handleValidationResult(false);
        }
    }
    async function validateStep2() {
        isValid = false;
        var step2_lname = $("#step2_lname").val().trim();
        var step2_fname = $("#step2_fname").val().trim();
        var step2_mname = $("#step2_fname").val().trim();
        var step2_ss = $("#step2_ss").val().trim();
        var step2_dob = $("#step2_dob").val().trim();
        var step2_phone = $("#step2_phone").val().trim();
        var step2_co_applicant = $("#step2_co-applicant").val().trim();
        var step2_present_address = $("#step2_present_address").val().trim();
        var step2_apt_no = $("#step2_apt_no").val().trim();
        var step2_city = $("#step2_city").val().trim();
        var step2_state = $("#step2_state").val().trim();
        var step2_zip = $("#step2_zip").val().trim();


        try {
            const responsedata = await $.ajax({
                url: '{{ route('validateTenantStep2') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    step2_lname: step2_lname,
                    step2_fname: step2_fname,
                    step2_mname: step2_mname,
                    step2_ss: step2_ss,
                    step2_dob: step2_dob,
                    step2_phone: step2_phone,
                    step2_co_applicant: step2_co_applicant,
                    step2_present_address: step2_present_address,
                    step2_apt_no: step2_apt_no,
                    step2_city: step2_city,
                    step2_state: step2_state,
                    step2_zip: step2_zip,
                }
            });

            $('#step2_lname').removeClass('is-invalid');
            $('#step2_fname').removeClass('is-invalid');
            $('#step2_mname').removeClass('is-invalid');
            $('#step2_ss').removeClass('is-invalid');
            $('#step2_dob').removeClass('is-invalid');
            $('#step2_phone').removeClass('is-invalid');
            $('#step2_co-applicant').removeClass('is-invalid');
            $('#step2_present_address').removeClass('is-invalid');
            $('#step2_apt_no').removeClass('is-invalid');
            $('#step2_city').removeClass('is-invalid');
            $('#step2_state').removeClass('is-invalid');
            $('#step2_zip').removeClass('is-invalid');

            const data = JSON.parse(responsedata);
            if (data.status === false || data.status === 'false') {
                isValid = false;
                handleValidationResult(false);
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Please fill all the required fields correctly'
                });

                if (data.step2_lname) {
                    $('#step2_lname').addClass("is-invalid");
                }
                if (data.step2_fname) {
                    $('#step2_fname').addClass("is-invalid");
                }
                if (data.step2_mname) {
                    $('#step2_mname').addClass("is-invalid");
                }
                if (data.step2_ss) {
                    $('#step2_ss').addClass("is-invalid");
                }
                if (data.step2_dob) {
                    $('#step2_dob').addClass("is-invalid");
                }
                if (data.step2_phone) {
                    $('#step2_phone').addClass("is-invalid");
                }
                if (data.step2_phone_length) {
                    $('#step2_phone').addClass("is-invalid");
                   
                    Lobibox.notify('error', {
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Phone number must have atleast 7 characters'
                    });
                
                }
                if (data.step2_co_applicant) {
                    $('#step2_co-applicant').addClass("is-invalid");
                }
                if (data.step2_present_address) {
                    $('#step2_present_address').addClass("is-invalid");
                }
                if (data.step2_apt_no) {
                    $('#step2_apt_no').addClass("is-invalid");
                }
                if (data.step2_city) {
                    $('#step2_city').addClass("is-invalid");
                }
                if (data.step2_state) {
                    $('#step2_state').addClass("is-invalid");
                }
                if (data.step2_zip) {
                    $('#step2_zip').addClass("is-invalid");
                    Lobibox.notify('error', {
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Zip cant contain any special character'
                    });
                }
            } else {

                // isValid = true;
                handleValidationResult(true);
                $('.tostep3_real').click();
            }
        } catch (error) {
            console.error("Error in AJAX request:", error);
            handleValidationResult(false);
        }
    }
    async function validateStep3() {
        isValid = false;
        var step3_landlord = $("#step3_landlord").val().trim();
        var step3_landlord_tel = $("#step3_landlord_tel").val().trim();
        var step3_employer = $("#step3_employer").val().trim();
        var step3_employer_tel = $("#step3_employer_tel").val().trim();
        var step3_employer_address = $("#step3_employer_address").val().trim();
        var step3_employer_contact = $("#step3_employer_contact").val().trim();
        // var step3_employer_position = $("#step3_employer_position-applicant").val().trim();
        // var step3_employer_sdate = $("#step3_employer_sdate").val().trim();
        // var step3_employer_salary = $("#step3_employer_salary").val().trim();


        try {
            const responsedata = await $.ajax({
                url: '{{ route('validateTenantStep3') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    step3_landlord: step3_landlord,
                    step3_landlord_tel: step3_landlord_tel,
                    step3_employer: step3_employer,
                    step3_employer_tel: step3_employer_tel,
                    step3_employer_address: step3_employer_address,
                    step3_employer_contact: step3_employer_contact,

                }
            });

            $('#step3_landlord').removeClass('is-invalid');
            $('#step3_landlord_tel').removeClass('is-invalid');
            $('#step3_employer').removeClass('is-invalid');
            $('#step3_employer_tel').removeClass('is-invalid');
            $('#step3_employer_address').removeClass('is-invalid');
            $('#step3_employer_contact').removeClass('is-invalid');

            const data = JSON.parse(responsedata);
            if (data.status === false || data.status === 'false') {
                isValid = false;
                handleValidationResult(false);
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Please fill all the required fields correctly'
                });

                if (data.step3_landlord) {
                    $('#step3_landlord').addClass("is-invalid");
                }
                if (data.step3_landlord_tel) {
                    $('#step3_landlord_tel').addClass("is-invalid");
                }
                if (data.step3_landlord_tel_length) {
                    $('#step3_landlord_tel').addClass("is-invalid");
                    Lobibox.notify('error', {
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Landlord telephone must have atleast 7 characters'
                    });
                }
                if (data.step3_employer) {
                    $('#step3_employer').addClass("is-invalid");
                }
                if (data.step3_employer_tel) {
                    $('#step3_employer_tel').addClass("is-invalid");
                }
                if (data.step3_employer_tel_length) {
                    $('#step3_employer_tel').addClass("is-invalid");
                    Lobibox.notify('error', {
                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Employer telephone must have atleast 7 characters'
                    });
                }
                if (data.step3_employer_address) {
                    $('#step3_employer_address').addClass("is-invalid");
                }
                if (data.step3_employer_contact) {
                    $('#step3_employer_contact').addClass("is-invalid");
                }

            } else {
                isValid = true;
                handleValidationResult(true);
                $('.tostep4_real').click();
            }
        } catch (error) {
            console.error("Error in AJAX request:", error);
            handleValidationResult(false);
        }
    }

    async function validateStep4() {
        isValid = false;
        var step4_move_check1 = $(".step4_move_check1").is(":checked");
        var step4_bankrupt_check1 = $(".step4_bankrupt_check1").is(":checked");
        var step4_rental_agreement_check1 = $(".step4_rental_agreement_check1").is(":checked");
        var step4_sued_check1 = $(".step4_sued_check1").is(":checked");
        var step4_move_check0 = $(".step4_move_check0").is(":checked");
        var step4_bankrupt_check0 = $(".step4_bankrupt_check0").is(":checked");
        var step4_rental_agreement_check0 = $(".step4_rental_agreement_check0").is(":checked");
        var step4_sued_check0 = $(".step4_sued_check0").is(":checked");

        try {
            const responsedata = await $.ajax({
                url: '{{ route('validateTenantStep4') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    step4_move_check1: step4_move_check1,
                    step4_bankrupt_check1: step4_bankrupt_check1,
                    step4_rental_agreement_check1: step4_rental_agreement_check1,
                    step4_sued_check1: step4_sued_check1,
                    step4_move_check0: step4_move_check0,
                    step4_bankrupt_check0: step4_bankrupt_check0,
                    step4_rental_agreement_check0: step4_rental_agreement_check0,
                    step4_sued_check0: step4_sued_check0,

                }
            });

            $('.step4_move_check').removeClass('is-invalid');
            $('.step4_bankrupt_check').removeClass('is-invalid');
            $('.step4_rental_agreement_check').removeClass('is-invalid');
            $('.step4_sued_check').removeClass('is-invalid');




            const data = JSON.parse(responsedata);
            if (data.status === false || data.status === 'false') {
                isValid = false;
                handleValidationResult(false);
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Please check the fields'
                });

                if (data.step4_move_check) {
                    $('.step4_move_check').addClass("is-invalid");
                }
                if (data.step4_bankrupt_check) {
                    $('.step4_bankrupt_check').addClass("is-invalid");
                }
                if (data.step4_rental_agreement_check) {
                    $('.step4_rental_agreement_check').addClass("is-invalid");
                }
                if (data.step4_sued_check) {
                    $('.step4_sued_check').addClass("is-invalid");
                }


            } else {
                isValid = true;
                handleValidationResult(true);
                $('.tostep5_real').click();
            }
        } catch (error) {
            console.error("Error in AJAX request:", error);
            handleValidationResult(false);
        }
    }
    async function validateStep5() {
      $('#uiBlocker').show();
        isValid = false;
        var signature = $("#signature").val();
        var sign_date = $(".sign_date").val();


        try {
            const responsedata = await $.ajax({
                url: '{{ route('validateTenantStep5') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    signature: signature,
                    sign_date: sign_date,


                }
            });




            const data = JSON.parse(responsedata);
            if (data.status === false || data.status === 'false') {
              $('#uiBlocker').hide();
                isValid = false;
                handleValidationResult(false);
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Please add your signature'
                });

            } else {
                isValid = true;
                handleValidationResult(true);
                // $('.submit_real').click();
                submittenantform()
            }
        } catch (error) {
            console.error("Error in AJAX request:", error);
            handleValidationResult(false);
        }
    }

    function submittenantform(){
        $('#submit').prop('disabled', true);
    $('#uiBlocker').hide();
    var form = $(".tenant_form")[0];
    var data = new FormData(form);
    
    $.ajax({
        url: '{{ route('SubmitTenant') }}',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        processData: false,  // Important for FormData
        contentType: false,  // Important for FormData
        success: function(responsedata) {
            // window.location = '/tenant-success';
        $('#add_page').addClass('hidden');
        $('#success_page').removeClass('hidden');

        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + status + "\nError: " + error);
            $('#submit').prop('disabled', false);
            // $('#uiBlocker').show();
        }
    });
    }

    document.getElementById('step2_zip').addEventListener('change', function() {
            var zipInput = this.value;
            if (zipInput == '0' || zipInput < 0) {
                this.value = '';
            }
        });

        $("#step2_state").on('change', function() {
            var stateValue = $(this).val();
            if (/^\d+$/.test(stateValue)) {
                $(this).val('');
            }
        });
        $("#step2_city").on('change', function() {
            var stateValue = $(this).val();
            if (/^\d+$/.test(stateValue)) {
                $(this).val('');
            }
        });


        document.getElementById('step2_phone').addEventListener('change', function() {
            var rentInput = this.value;
            if (rentInput.length == '7' || rentInput.length < 7){
                $(this).addClass('is-invalid');
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Phone number can not be less than 7 characters'
                });
            }
            else{
                $(this).removeClass('is-invalid');
            }
        });
       
        document.getElementById('step3_landlord_tel').addEventListener('change', function() {
            var rentInput = this.value;
            if (rentInput.length == '7' || rentInput.length < 7){
                $(this).addClass('is-invalid');
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Landlord telephone can not be less than 7 characters'
                });
            }
            else{
                $(this).removeClass('is-invalid');
            }
        });
        document.getElementById('step3_employer_contact').addEventListener('change', function() {
            var rentInput = this.value;
            if (rentInput.length == '7' || rentInput.length < 7){
                $(this).addClass('is-invalid');
                Lobibox.notify('error', {
                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Employer Contact can not be less than 7 characters'
                });
            }
            else{
                $(this).removeClass('is-invalid');
            }
        });



        $(document).on('keydown', 'input[type="number"]', function(e) {
            var max = parseInt($(this).attr('maxlength'));
            var valueLength = $(this).val().length;
            var keyCode = e.keyCode || e.which;
            
            // Allow backspace, delete, tab, escape, enter, and arrow keys
            if ($.inArray(keyCode, [8, 46, 9, 27, 13, 37, 38, 39, 40]) !== -1 ||
                // Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                (keyCode == 65 && (e.ctrlKey || e.metaKey)) ||
                (keyCode == 67 && (e.ctrlKey || e.metaKey)) ||
                // (keyCode == 86 && (e.ctrlKey || e.metaKey)) ||
                (keyCode == 88 && (e.ctrlKey || e.metaKey))) {
                return;
            }
            
            // Ensure it is a number and stop the keypress if max length is reached
            if ((keyCode < 48 || keyCode > 57) && (keyCode < 96 || keyCode > 105)) {
                e.preventDefault();
            }
            
            if (valueLength >= max) {
                e.preventDefault();
            }
        });



        $('input[name="step4_move_check"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="step4_move_check"]').not(this).prop('checked', false);
            }
        });
       
       
        $('input[name="step4_bankrupt_check"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="step4_bankrupt_check"]').not(this).prop('checked', false);
            }
        });
        
        
        $('input[name="step4_rental_agreement_check"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="step4_rental_agreement_check"]').not(this).prop('checked', false);
            }
        });
        
        
        $('input[name="step4_sued_check"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="step4_sued_check"]').not(this).prop('checked', false);
            }
        });
</script>




@include('layouts/website/footer')