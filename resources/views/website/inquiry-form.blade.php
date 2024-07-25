@include('layouts/website/header')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    /* .error {
        border: 1px solid red;
        background-color: rgba(255, 0, 0, 0.05) !important;
    } */
    .error-message {
        float: left;
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

    /* signature */
    /* .signature {
        border: 1px solid rgb(26, 26, 26);
        height: 135px;
        width: 100%;
    } */

    #root {
        height: 100%;
        width: 100%;
        max-width: 1050px;
        max-height: 100px;
        margin: 0 auto;
    }

    canvas {
        width: 100%;
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
        padding: 11px;
        cursor: pointer;
        border: none;
        font-size: 12px;
    }

    .reset-btn:focus,
    .save-btn:focus {
        outline: none !important;
    }

    @media only screen and (max-width: 400px) {

        .reset-btn,
        .save-btn {
            padding: 3px;
        }
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
</style>


<div id="add_page">
<div class="container mt_180">
    <div class="row" style="justify-content: center;">
        <div class="col-12 text-center">
            <div class="card">
                <h2 class="text-center text-capitalize heading-login">LANGSAM PROPERTY SERVICES CORP</h2>
                <p style="padding: 0px 13px;">Fill all form field to go to next step</p>
                <form id="msform" class="enquiry_form" action="{{ route('SubmitInquiry') }}" method="POST">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="personal"><strong>Personal Information</strong></li>
                        <li id="account"><strong>Account Information</strong></li>
                        <li id="payment"><strong>Credit Information</strong></li>
                        <li id="personal"><strong>Household Composition</strong></li>
                        <li id="terms"><strong>Terms of Application</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>

                    <br>
                    <fieldset>
                        <div class="form-card">

                            <div class="container">
                                <div class="" style="margin-top: 30px;">

                                    <div class="form-row">
                                        <div class="form-group col-md-12"
                                            style="display: flex; align-items: end; justify-content: flex-end;">
                                            <div class="form-group col-md-3">
                                                <div class="position-relative datee" style="margin-top: 5px;">
                                                    <input type="text" id="step1_datepicker"
                                                        class="outside form-control " name="step1_date" readonly />
                                                    <span class="floating-label-outside">Date</span>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 "
                                            style="display: flex; justify-content: center; margin: 25px 0px; padding: 0px;">
                                            <h4 class="font-w-bold">The undersigned hereby submits the following
                                                application to
                                                lease the apartment at</h4>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input class="borderbottom agree_checkbox" type="text" maxlength="200"
                                                style="width: 70%;" name="step1_apt_address" id="step1_apt_address">
                                            <label>APt.#</label>
                                            <input class="borderbottom agree_checkbox" type="text"
                                                name="step1_apt_number" style="width: 20%;"maxlength="10">
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12" style="display: flex; padding: 0px;">
                                            <p style="text-align: justify;" style="padding: 0px 13px;">The application
                                                information provided by
                                                any prospective tenant(s)
                                                may be used to obtain a Tenant
                                                Screening Report Pursuant to federal, state and local law:
                                                <br><br> 1:&nbsp; If we take adverse action against you based on
                                                information contained in a tenant screening report, we must notify you
                                                that such action was taken and provide you with the name and address of
                                                the consumer reporting agency that supplied the tenant screening report
                                                on which the action was based.<br><br> 2:&nbsp; If any adverse action is
                                                taken against you based on information contained in a tenant screening
                                                report, you have the right to inspect and receive a free copy of that
                                                report by contacting the consumer reporting agency, NTN-New York, P.O.
                                                Box 1023, Turnersville, NJ 08012, Telephone: 800-422-8299.
                                                <br><br>3:&nbsp; Every tenant or prospective tenant is entitled to one
                                                free tenant screening report from each national consumer reporting
                                                agency annually, in addition to a credit report that should be obtained
                                                from www.annualcreditreport.com.
                                                <br><br> 4: &nbsp;Every tenant or prospective go tenant may dispute
                                                inaccurate or incorrect information contained in a tenant screening
                                                report directly with the consumer reporting agency.
                                            </p>
                                        </div>
                                    </div>


                                    <div class="form-row" style="margin-top: 5px;">

                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" class="outside form-control"
                                                    name="step1_name"maxlength="50" id="step1_name" />
                                                <span class="floating-label-outside">Name<span
                                                        class="text-danger">*</span> </span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" minlength="7" maxlength="18"
                                                    class="outside form-control"name="step1_telephone"
                                                    id="step1_telephone" />
                                                <span class="floating-label-outside">Tel.No<span
                                                        class="text-danger">*</span></span>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text"maxlength="18" minlength="7"
                                                    class="outside"name="step1_social_security_number"
                                                    id="step1_social_security_number" />
                                                <span class="floating-label-outside">Social Security Number<span
                                                        class="text-danger">*</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" class="outside"name="step1_email" maxlength="50"
                                                    id="step1_email" />
                                                <span class="floating-label-outside">Email<span
                                                        class="text-danger">*</span> </span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="200"class="outside"
                                                    name="step1_present_address" />
                                                <span class="floating-label-outside">Present Address </span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" class="outside"name="step1_zip" maxlength="10"
                                                    id="step1_zip" />
                                                <span class="floating-label-outside"> Zip Code<span
                                                        class="text-danger">*</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="20"class="outside"
                                                    name="step1_user_apt_number" />
                                                <span class="floating-label-outside"> Apt. No.</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="20"class="outside"
                                                    name="step1_tenant_duration" />
                                                <span class="floating-label-outside">How long a tenant?</span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="40"class="outside"
                                                    name="step1_present_landlord" id="step1_present_landlord" />
                                                <span class="floating-label-outside"> Present Landlord </span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" class="outside" minlength="7" maxlength="18"
                                                    id="step1_present_landlord_telephone"
                                                    name="step1_present_landlord_telephone" />
                                                <span class="floating-label-outside">Tel. No. </span>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="number" class="outside"name="step1_total_rent"
                                                    id="step1_total_rent" maxlength="10" />
                                                <span class="floating-label-outside">Current total rent<span
                                                        class="text-danger">*</span></span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="50"class="outside"
                                                    name="step1_section_share" id="step1_section_share" />
                                                <span class="floating-label-outside">Section 8 Share</span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="200"class="outside"
                                                    name="step1_landlord_address" id="step1_landlord_address" />
                                                <span class="floating-label-outside">Address of Landlord</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="200"
                                                    class="outside"name="step1_landlord_previous_address" />
                                                <span class="floating-label-outside">
                                                    previous Address(If less than two years)</span>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <div class="position-relative mt-4" style="margin-top: 5px;">
                                                <input type="text" maxlength="50"class="outside"
                                                    name="step1_previous_landlord" id="step1_previous_landlord" />
                                                <span class="floating-label-outside">Previous Landlord</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-8">
                                            <div class="position-relative" style="margin-top: 5px;">
                                                <input type="text"maxlength="200"
                                                    class="outside"name="step1_previous_landlord_address" />
                                                <span class="floating-label-outside">Address of Previous
                                                    Landlord</span>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="position-relative " style="margin-top: 5px;">
                                                <input type="number" maxlength="18" minlength="7"
                                                    class="outside"name="step1_previous_landlord_telephone"
                                                    id="step1_previous_landlord_telephone" />
                                                <span class="floating-label-outside">Tel. No.</span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">

                                        <a href="#msform" class=""> <button type="button" name="tostep2"
                                                class="btn btn-custom next action-button" value="Next"
                                                id="next-button" style="margin: 20px 0px;">Next
                                                Page</button></a>
                                        <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>

                        <div class="container">

                            <div id="account" style="margin-top: 30px;">

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="step2_employer"
                                                maxlength="50" />
                                            <span class="floating-label-outside">Employer</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="30"
                                                class="outside form-control"name="step2_employer_occupation" />
                                            <span class="floating-label-outside"> Occupation</span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="100"
                                                class="outside"name="step2_employer_business_address" />
                                            <span class="floating-label-outside">Business address</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" maxlength="18"minlength="7" class="outside"
                                                name="step2_employer_telephone" id="step2_employer_telephone"/>
                                            <span class="floating-label-outside">Telephone</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" maxlength="10"class="outside"
                                                name="step2_employer_duration" />
                                            <span class="floating-label-outside"> How long there?</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" maxlength="25"class="outside"
                                                name="step2_director_personnel" />
                                            <span class="floating-label-outside">Director of Personnel </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside"name="step2_employer_salary"
                                                maxlength="7" />
                                            <span class="floating-label-outside">Salary $</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="15"
                                                class="outside"name="step2_employer_salary_period" />
                                            <span class="floating-label-outside">per </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" maxlength="50"class="outside"
                                                name="step2_previous_employer" />
                                            <span class="floating-label-outside">Previous
                                                Employer(If less than two years) </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="25"
                                                class="outside"name="step2_previous_employer_occupation" />
                                            <span class="floating-label-outside"> Occupation </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="100"
                                                class="outside"name="step2_previous_employer_businness_address" />
                                            <span class="floating-label-outside">Business address</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" minlength="7" maxlength="18"
                                                class="outside"name="step2_previous_employer_telephone" id="step2_previous_employer_telephone" />
                                            <span class="floating-label-outside">Telephone</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="10"
                                                class="outside"name="step2_previous_employer_duration" />
                                            <span class="floating-label-outside"> How long there? </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside"name="step2_supervisor"
                                                maxlength="50" />
                                            <span class="floating-label-outside">Supervisor's name </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside"name="step2_previous_employer_salary"
                                                maxlength="7" />
                                            <span class="floating-label-outside"> Salary $</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="15"
                                                class="outside"name="step2_previous_employer_salary_period" />
                                            <span class="floating-label-outside">Per</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous"
                                            class="previous action-button-previous" value="Previous"
                                            style="margin: 20px 10px;">Previous </button></a>
                                    <a href="#msform" class=""> <button type="button" name="tostep3"
                                            class="btn btn-custom next action-button" value="Next"
                                            id="next-button " style="margin: 20px 10px;"onclick>Next </button></a>

                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>

                        <div class="container">

                            <div id="credit" style="margin-top: 30px;">
                                <h4 class="text-center text-capitalize heading-login font-w-bold">Credit References
                                    (List all
                                    credit cards) </h4>


                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="card_name1"
                                                maxlength="50" />
                                            <span class="floating-label-outside">Card Name</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" maxlength="20"
                                                class="outside form-control"name="account_number1" />
                                            <span class="floating-label-outside"> Account Number</span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="card_name2"
                                                maxlength="50" />
                                            <span class="floating-label-outside">Card Name</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number"maxlength="20"
                                                class="outside form-control"name="account_number2" />
                                            <span class="floating-label-outside"> Account Number</span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="card_name3"
                                                maxlength="50" />
                                            <span class="floating-label-outside">Card Name</span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" maxlength="20"
                                                class="outside form-control"name="account_number3" />
                                            <span class="floating-label-outside"> Account Number</span>

                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous"
                                            class="previous action-button-previous" value="Previous"
                                            style="margin: 20px 10px;">Previous </button></a>
                                    <a href="#msform" class=""><button type="button"
                                            class="btn btn-custom next action-button" value="Next" name="tostep4"
                                            id="next-button " style="margin: 20px 10px;">Next</button></a>

                                </div>
                            </div>
                        </div>
                    </fieldset>



                    <fieldset>

                        <div class="container">
                            <div id="reference" style="margin-top: 30px;">
                                <div class="form-row">
                                    <div class="form-group col-md-12" style="display: flex;">
                                        <p style="padding: 0px 13px;">
                                            In accordance with the Multiple Dwelling Code of the City of New York,
                                            the persons who will occupy the above stated apartment are as follows.
                                        </p>
                                    </div>
                                </div>

                                <div id="repeater-container">
                                    <div class="form-row mt-4 repeater-item row">
                                        <div class="form-group col-md-3">
                                            <div class="position-relative mt-4">
                                                <input type="text" maxlength="50" class="outside form-control"
                                                    name="reference_name[]" />
                                                <span class="floating-label-outside">Name</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="position-relative mt-4">
                                                <input type="text" maxlength="50" class="outside form-control"
                                                    name="reference_relation[]" />
                                                <span class="floating-label-outside">Relationship</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="position-relative mt-4">
                                                <input type="number" class="outside form-control"
                                                    name="reference_age[]" maxlength="3" />
                                                <span class="floating-label-outside">Age</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button"
                                                class="btn btn-sm btn-primary add-row action-button "
                                                style="margin-top:auto;">Add</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button"
                                                class="btn btn-sm btn-danger delete-row action-button mt-0 bg-danger"
                                                style="display: none;margin-top:auto; background-color:red;">Delete</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="button" name="previous"
                                        class="previous action-button-previous btn btn-secondary" value="Previous"
                                        style="margin: 20px 10px;">Previous</button>
                                    <button type="button" class="btn btn-custom next action-button btn btn-primary"
                                        value="Next" name="tostep5" id="next-button"
                                        style="margin: 20px 10px;">Next</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>

                        <div class="container">

                            <div id="terms" style="margin-top: 30px;">
                                <div class="form-row">
                                    <div class="form-group col-md-12"
                                        style="display: flex; justify-content: flex-start;">
                                        <span>How did you find out about this vacant apartment?</span><span
                                            class="text-danger " style="margin-left: 3px">*</span> <input
                                            class="date-span " type="" placeholder=""maxlength="100"
                                            style="width: 69%;"name="find_method" id = "find_method">
                                        </p>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <h4 class="font-w-bold">TERMS OF APPLICATION</h4>
                                        <p style="text-align: justify;" style="padding: 8px 13px;">If Landlord or its
                                            agent does not rent apartment to tenant, Landlord will refund any amount
                                            received from Tenant and all liability of both parties hereunder shall cease
                                            and terminate, except for any fee received for credit check. The truth of
                                            the information contained herein is essential and if the aforementioned
                                            property deems any answer or statement herein to be false, or misleading, it
                                            shall be considered that any lease granted by virtue of this application may
                                            be cancelled at their option. I/We hereby authorize the use of any consumer
                                            reporting agency, credit bureau or other investigative agencies employed by
                                            such, to investigate the references herein listed or statements or other
                                            data obtained from me or from any other person pertaining to my employment
                                            history, credit, prior tenancies, character, general reputation, personal
                                            characteristics and mode of living, to obtain a consumer report and such
                                            other credit information which may result thereby, and to disclose and
                                            furnish such information to t11e owner/agent listed above in support of this
                                            application. I have been advised that I have the right, under Section 6068
                                            of the Fair Credit Reporting Act, to make a written request, within
                                            reasonable time, for a complete and accurate disclosure of the nature and
                                            scope of any investigation.
                                        </p>
                                    </div>
                                </div>
                                {{-- 
                                <div class="form-row">
                                    <button type="button" class="show-image-sign-btn">Upload Signature</button>
                                    <div class="image-sign">
                                        <input type="file" id="fileInput" accept="image/*">
                                        <button type="button" onclick="saveImage()">Save Image</button>
                                    </div>
                                    <div class="form-group" style="display: flex; justify-content: end;">

                                        <div class="col-xs-6 col-md-6" style="display: flex; justify-content: end;">
                                            <input type="hidden" name="signature" id="signature">
                                            <button type="button" class="show-padd-sign-btn">Add Signature</button>

                                            <div class="signature">
                                                <div id='root'></div>

                                                <div class="sign-btn" style="position: absolute;">

                                                    <input type="button" value="Reset" id="resetCanvas"
                                                        class="reset-btn" />
                                                    <input type="button" value="Save as image" id="getImage"
                                                        class="save-btn" />
                                                </div>
                                                <img id="image" class="image full-width" />
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-row">
                                    <input type="hidden" name="signature" id="signature">
                                    <h5
                                        style="text-align: left;
                                   
                                    width: fit-content;">
                                        Please Signature below the field or attach your signature<span
                                            class="text-danger " style="margin-left: 3px">*</span></h5>
                                    <div class="form-group signature-group"
                                        style="display: flex; margin-bottom: 0px; border:1px solid #ced4da;;">

                                        <div class="col-xs-12 col-sm-8" style="display: flex;">
                                            <div class="signature">
                                                <div id='root'></div>

                                                <div class="sign-btn" style="position: absolute;">
                                                    <input type="button" value="Reset" id="resetCanvas"
                                                        class="reset-btn" />
                                                    <input type="button" value="Save" class="save-btn"
                                                        id="getImage" />
                                                </div>
                                                <img id="signatureImage" class="image full-width" />

                                            </div>

                                        </div>


                                        <div class="col-xs-12 col-sm-4 signature-export "
                                            style="display: flex;align-items:end; border-left:1px solid #ced4da;;">
                                            <input type="file" id="fileInput" accept="image/*"
                                                style="display: none;">
                                            <button class="export-btn save-btn" type="button"
                                                onclick="exportFile()">Attach</button>
                                            <span id="fileNameDisplay"></span>
                                        </div>

                                    </div>
                                    <p
                                        style="text-align: left; display:none;
                                    padding: 0px 15px;">
                                        Applicant for Lease </p>
                                </div>




                                <div class="form-row mt-4 hidden" style="margin-top: 5px;">

                                    <div class="form-group col-md-12">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text"maxlength="50"
                                                class="outside form-control"name="interviewing_agent"
                                                id="interviewing_agent" />
                                            <span class="floating-label-outside">OFFICE USE ONLY: Interviewing
                                                Agent<span class="text-danger "
                                                    style="margin-left: 3px">*</span></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4 hidden" style="margin-top: 5px;">

                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="lease_to_begin"
                                                maxlength="50" id="lease_to_begin" />
                                            <span class="floating-label-outside">Lease to begin<span
                                                    class="text-danger " style="margin-left: 3px">*</span> </span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="mail_new_lease"
                                                id="mail_new_lease" maxlength="30" />
                                            <span class="floating-label-outside">Mail new lease to<span
                                                    class="text-danger " style="margin-left: 3px">*</span></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4 hidden" style="margin-top: 5px;">

                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" class="outside form-control"name="rent"
                                                maxlength="10" id="rent" />
                                            <span class="floating-label-outside">Rent: $<span class="text-danger "
                                                    style="margin-left: 3px">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="text" class="outside form-control"name="lease_length"
                                                maxlength="10" id="lease_length" />
                                            <span class="floating-label-outside"> Length of Lease Years<span
                                                    class="text-danger " style="margin-left: 3px">*</span></span>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="position-relative mt-4" style="margin-top: 5px;">
                                            <input type="number" id="security_amount" maxlength="10"
                                                class="outside form-control"name="security_amount" />
                                            <span class="floating-label-outside"> Security:$<span class="text-danger "
                                                    style="margin-left: 3px">*</span></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="#msform" class=""> <button type="button" name="previous"
                                            class="previous action-button-previous" value="Previous"
                                            style="margin: 20px 10px;">Previous </button></a>
                                    <button type="button" value="Submit" class="btn btn-custom  action-button"
                                        id="submit" style="margin: 20px 0px;">Submit</button>
                                    {{-- <button type="submit" id="submitBTN" class="hidden">Submit</button> --}}


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
    <div class="container " style="margin-top: 120px;">
        <div class="row" style="justify-content: center;">
            <div class="col-12 text-center"style="width:100% !important">
                <div class="card">
                   
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="personal"><strong>Personal Information</strong></li>
                            <li id="account" class="account_success"><strong>Account Information</strong></li>
                            <li id="payment" class="payment_success"><strong>Credit Information</strong></li>
                            <li id="personal" class="personal_success"><strong>References</strong></li>
                            <li id="terms" class="terms_success"><strong>TERMS OF APPLICATION</strong></li>
                            <li id="confirm" class="confirm_success"><strong>Finish</strong></li>
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
    $(document).ready(function() {
        $('input').on('keyup',function(){
            $(this).removeClass('is-invalid');
        });
        $("#step1_datepicker").datepicker();
        var today_date = new Date().toLocaleDateString('en-US', {
            month: '2-digit',
            year: 'numeric',
            day: '2-digit'
        });
        $("#step1_datepicker").val(today_date);
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function() {
            current_fs = $(this).closest('fieldset');
            next_fs = current_fs.next();
            var current_step = $(this).attr('name');
            var isValid = true;
            if (current_step === "tostep2") {
                isValid = validateFields(["step1_name", "step1_telephone",
                    "step1_social_security_number", "step1_email", "step1_zip",
                    "step1_total_rent"
                ]);
                if (isValid) {
                    validateStep1();
                }
            }
            

            if (current_step === "tostep3") {
                
               
           
           if($('#step2_employer_telephone').val() !=''){
            if($('#step2_employer_telephone').val().length < 7 ||  $('#step2_employer_telephone').val().length > 18){
                $('#step2_employer_telephone').addClass('is-invalid');
                isValid = false;
                Lobibox.notify('error', {
                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'Employer telephone must be between 7 and 18 charatcters'
                });
            }
           }    
           else{
            $('#step2_employer_telephone').removeClass('is-invalid');
           }
           if($('#step2_previous_employer_telephone').val() !=''){
            if($('#step2_previous_employer_telephone').val().length < 7 ||  $('#step2_previous_employer_telephone').val().length > 18){
                $('#step2_previous_employer_telephone').addClass('is-invalid');
                isValid = false;
                Lobibox.notify('error', {
                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'Previous Employer telephone must be between 7 and 18 charatcters'
                });
            }
           }    
           else{
            $('#step2_previous_employer_telephone').removeClass('is-invalid');
           }
               
        }



            // if (current_step === "tostep5") {

            //     isValid = validateFields(["find_method", "signature",
            //     "interviewing_agent", "lease_to_begin", "mail_new_lease", "rent",
            //     "lease_length", "security_amount"
            //     ]);
            // }

            if (!isValid) {
                return;
            }
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

            // Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            // Show the previous fieldset
            previous_fs.show();

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

        function isValidEmail(email) {
            var atIndex = email.indexOf("@");
            var dotIndex = email.lastIndexOf(".");
            return atIndex > 0 && dotIndex > atIndex && dotIndex < email.length - 1;
        }

        function validateFields(fields) {

            $(".error-message").remove();
            var isValid = true;
            fields.forEach(function(fieldId) {
                var field = $("#" + fieldId);
                field.removeClass("is-invalid");
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
                    msg: 'Please fill all the required fields correctly'
                });
            }
            if ($('#step1_email').val() !== "" && !isValidEmail($('#step1_email').val())) {
                isValid = false;
                $('#step1_email').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Email must be in valid format'
                });

            }
            if ($('#step1_telephone').val() !== "" && $('#step1_telephone').val().length < 7) {
                isValid = false;
                $('#step1_telephone').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Telephone can not be less than 7 characters'
                });

            }
            if ($('#step1_total_rent').val() !== "" && $('#step1_total_rent').val().length <= 0) {
                isValid = false;
                $('#step1_total_rent').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Invalid Total Rent'
                });

            }
            if ($('#step1_zip').val() !== "" && ($('#step1_zip').val() == 0 || $('#step1_zip').val() == '0') &&
                $('#step1_zip').val().length <= 0) {
                isValid = false;
                $('#step1_zip').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Invalid Zip Code'
                });

            }
            if ($('#step1_present_landlord_telephone').val() !== "" && $('#step1_present_landlord_telephone')
                .val().length < 7) {
                isValid = false;
                $('#step1_present_landlord_telephone').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Present landlord Telephone can not be less than 7 characters'
                });

            }
            if ($('#step1_previous_landlord_telephone').val() !== "" && $('#step1_previous_landlord_telephone')
                .val().length < 7) {
                isValid = false;
                $('#step1_previous_landlord_telephone').addClass("is-invalid");
                Lobibox.notify('error', {

                    size: 'mini',
                    rounded: true,
                    delayIndicator: false,
                    icon: 'bx bx-x-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: 'Previous landlord Telephone can not be less than 7 characters'
                });

            }
            return isValid;
        }


        $('#submit').click(function() {
            $('#submit').prop('disabled', true);
            $('#uiBlocker').show();
            const form = document.querySelector('#msform');


            // if (!isValidEmail($('#mail_new_lease').val())) {
            //     isValid = false;
            //     $('#mail_new_lease').addClass("is-invalid");
            //     Lobibox.notify('error', {

            //         size: 'mini',
            //         rounded: true,
            //         delayIndicator: false,
            //         icon: 'bx bx-x-circle',
            //         continueDelayOnInactiveTab: false,
            //         position: 'top right',
            //         msg: 'Lease Mail must be in valid format'
            //     });
            //     return;
            // }

            if (isValid) {
                var find_method = $('#find_method').val();
                var signature = $('#signature').val();
                
                // var interviewing_agent = $('#interviewing_agent').val();
                // var lease_to_begin = $('#lease_to_begin').val();
                // var mail_new_lease = $('#mail_new_lease').val();
                // var rent = $('#rent').val();
                // var lease_length = $('#lease_length').val();
                // var security_amount = $('#security_amount').val();
                $.ajax({
                    url: '{{ route('validateStep5') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        find_method: find_method,
                        signature: signature,
                        editPage: false,
                        // interviewing_agent: interviewing_agent,
                        // lease_to_begin: lease_to_begin,
                        // mail_new_lease: mail_new_lease,
                        // rent: rent,
                        // lease_length: lease_length,
                        // security_amount: security_amount,
                    },
                    success: function(responsedata) {
                        $(".error-message").remove();
                        $('#submit').prop('disabled', false);
                        var data = JSON.parse(responsedata);
                        if (data.status) {
                            // $('#submitBTN').click();
                            // console.log('asd');
                            // $('.enquiry_form').submit();
                            submitForm();
                        } else {
                            $('#uiBlocker').hide();
                           
                            if (data.find_method) {

                                var field = $('#find_method');
                                field.addClass("is-invalid");
                                Lobibox.notify('error', {

                                    size: 'mini',
                                    rounded: true,
                                    delayIndicator: false,
                                    icon: 'bx bx-x-circle',
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: 'Find Method is required'
                                });
                            }
                            if (data.signature) {
                                var field = $('#signature');
                                field.addClass("is-invalid");
                                Lobibox.notify('error', {

                                    size: 'mini',
                                    rounded: true,
                                    delayIndicator: false,
                                    icon: 'bx bx-x-circle',
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: 'Signature are required'
                                });
                            }
                            // if (data.interviewing_agent) {
                            //     var field = $('#interviewing_agent');
                            //     field.addClass("is-invalid");
                            // }
                            // if (data.lease_to_begin) {
                            //     var field = $('#lease_to_begin');
                            //     field.addClass("is-invalid");
                            // }
                            // if (data.mail_new_lease) {
                            //     var field = $('#mail_new_lease');
                            //     field.addClass("is-invalid");
                            // }
                            // if (data.rent) {
                            //     var field = $('#rent');
                            //     field.addClass("is-invalid");
                            // }
                            // if (data.lease_length) {
                            //     var field = $('#lease_length');
                            //     field.addClass("is-invalid");
                            // }
                            // if (data.security_amount) {
                            //     var field = $('#security_amount');
                            //     field.addClass("is-invalid");
                            // }

                        }
                    },
                });
            }


        });

    });

    function submitForm() {
    $('#submit').prop('disabled', true);
    $('#uiBlocker').hide();
    var form = $(".enquiry_form")[0];
    var data = new FormData(form);
    
    $.ajax({
        url: '{{ route('SubmitInquiry') }}',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        processData: false,  // Important for FormData
        contentType: false,  // Important for FormData
        success: function(responsedata) {
            // window.location = '/inquiry-success';
            $('#add_page').addClass('hidden');
        $('#success_page').removeClass('hidden');
        $('.account_success').addClass('active');
        $('.payment_success').addClass('active');
        $('.personal_success').addClass('active');
        $('.terms_success').addClass('active');
        $('.confirm_success').addClass('active');
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + status + "\nError: " + error);
            $('#submit').prop('disabled', false);
            $('#uiBlocker').hide();

        }
    });
}


    // signature
    const root = document.getElementById("root")
    const resetCanvas = document.getElementById("resetCanvas")
    const getImage = document.getElementById("getImage")
    const datepicker = document.getElementById("datepicker");
    const component = Signature(root, {
        width: 530,
        height: 130,

    });
    resetCanvas.addEventListener("click", () => {
        component.value = [];
    });

    getImage.addEventListener("click", () => {
        $('#fileNameDisplay').text('');
        $('#signature').val('');
        $('#signature').val(component.getImage());
        var signVal = $('#signature').val();
        if (signVal !== '') {
            Lobibox.notify('success', {

                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'Signature Added'
            });
        }
        if (signVal == '') {
            Lobibox.notify('error', {

                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'Signature can not be empty'
            });
        }
    });
    // window.addEventListener('resize', updateCanvasWidth);
</script>
<script>
    $('#fileInput').click(function() {

        $('#signature').val('');
       

    });
    $('.show-image-sign-btn').click(function() {

        $('#signature').val('');
    });
    $('.show-padd-sign-btn').click(function() {

        $('#signature').val('');
    });



    function saveImage() {
        $('#signature').val('');
        const fileInput = document.getElementById('fileInput');
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const base64String = event.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = base64String;
                const dataURL = `data:image/png;base64,${base64String.split(',')[1]}`;
                $('#signature').val(dataURL);

            };
            reader.readAsDataURL(file);
        } else {
            resultDiv.textContent = 'No file selected.';
        }
    }

    function validateStep1() {

        var step1_name = $("#step1_name").val().trim();
        var step1_telephone = $("#step1_telephone").val().trim();
        var step1_social_security_number = $("#step1_social_security_number").val().trim();
        var step1_email = $("#step1_email").val().trim();
        var step1_zip = $("#step1_zip").val().trim();
        var step1_total_rent = $("#step1_total_rent").val().trim();



        $.ajax({
            url: '{{ route('validateStep1') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                step1_name: step1_name,
                step1_telephone: step1_telephone,
                step1_social_security_number: step1_social_security_number,
                step1_email: step1_email,
                step1_zip: step1_zip,
                step1_total_rent: step1_total_rent,
            },
            success: function(responsedata) {

                const data = JSON.parse(responsedata)
                $(".error-message").remove();
                if (data.status == false) {
                    isValid = false;
                    Lobibox.notify('error', {

                        size: 'mini',
                        rounded: true,
                        delayIndicator: false,
                        icon: 'bx bx-x-circle',
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Please fill all the required fields correctly'
                    });

                    if (data.step1_name) {
                        var field = $('#step1_name');
                        field.addClass("is-invalid");
                    }

                    if (data.step1_telephone) {
                        var field = $('#step1_telephone');
                        field.addClass("is-invalid");
                    }

                    if (data.step1_social_security_number) {
                        var field = $('#step1_social_security_number');
                        field.addClass("is-invalid");
                    }

                    if (data.step1_email) {
                        var field = $('#step1_email');
                        field.addClass("is-invalid");
                    }
                    if (data.step1_zip) {
                        var field = $('#step1_zip');
                        field.addClass("is-invalid");
                    }
                    if (data.step1_total_rent) {
                        var field = $('#step1_total_rent');
                        field.addClass("is-invalid");
                    }
                } else {
                    isValid = true;
                }
            },
            error: function(responsedata) {
                console.log("Error in AJAX request");
            }
        });

    }
</script>

{{-- to specify the input length --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("msform");

        var inputFields = form.querySelectorAll("input[maxlength], textarea[maxlength]");
        inputFields.forEach(function(input) {
            input.addEventListener("input", function() {
                var maxLength = parseInt(input.getAttribute("maxlength"));
                var inputValue = input.value.trim();

                if (inputValue.length >= maxLength) {
                    input.value = inputValue.slice(0, this.maxLength);
                    // showError(input, "You cannot enter more than " + maxLength + " characters");
                } else {
                    removeError(input);
                }
            });
        });

        function showError(inputField, message) {
            var errorElement = inputField.parentNode.querySelector(".error-message");
            if (!errorElement) {
                errorElement = document.createElement("span");
                errorElement.className = "error-message text-danger";
                inputField.parentNode.appendChild(errorElement);
            }
            errorElement.textContent = message;
            inputField.classList.add("error");
        }

        function removeError(inputField) {
            var errorElement = inputField.parentNode.querySelector(".error-message");
            if (errorElement) {
                inputField.classList.remove("error");
                inputField.parentNode.removeChild(errorElement);
            }
        }
    });

    function exportFile() {
        $('#resetCanvas').click();
        $('#signature').val('');
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
                    var signVal = $('#signature').val();
                    if (signVal !== '') {
                        Lobibox.notify('success', {

                            size: 'mini',
                            rounded: true,
                            delayIndicator: false,
                            icon: 'bx bx-x-circle',
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            msg: 'Signature Added'
                        });
                    }
                    if (signVal == '') {
                        Lobibox.notify('error', {

                            size: 'mini',
                            rounded: true,
                            delayIndicator: false,
                            icon: 'bx bx-x-circle',
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            msg: 'Signature can not be empty'
                        });
                    }
                };
                reader.readAsDataURL(file);
            } else {
                resultDiv.textContent = 'No file selected.';
            }
        };
        fileInput.click();
    }
    updateAddButton();

    function addRow() {
        if ($('.repeater-item').length >= 10) {
            Lobibox.notify('error', {

                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: 'You cannot add more than 10 records.'
            });

            return;
        }
        var newRow = `
                <div class="form-row mt-4 repeater-item row">
                    <div class="form-group col-md-3">
                        <div class="position-relative mt-4">
                            <input type="text" maxlength="50" class="outside form-control" name="reference_name[]" />
                            <span class="floating-label-outside">Name</span>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="position-relative mt-4">
                            <input type="text" maxlength="50" class="outside form-control" name="reference_relation[]" />
                            <span class="floating-label-outside">Relationship</span>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="position-relative mt-4">
                            <input type="number" class="outside form-control reference_age" name="reference_age[]" maxlength="3" />
                            <span class="floating-label-outside">Age</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-primary add-row action-button "style="margin-top:auto;" >Add</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-danger delete-row action-button bg-danger" style="display: none; margin-top:auto;  background-color:red;">Delete</button>
                    </div>
                </div>`;
        $('#repeater-container').append(newRow);
        updateDeleteButtonVisibility();
        updateAddButton();
    }

    // Function to update delete button visibility
    function updateDeleteButtonVisibility() {
        if ($('.repeater-item').length > 1) {
            $('.delete-row').show();
        } else {
            $('.delete-row').hide();
        }
    }

    // Initial call to update delete button visibility
    updateDeleteButtonVisibility();

    // Add row event handler
    $(document).on('click', '.add-row', function() {
        addRow();
    });

    // Delete row event handler
    $(document).on('click', '.delete-row', function() {
        $(this).closest('.repeater-item').remove();
        updateDeleteButtonVisibility();
        updateAddButton();

    });

    function updateAddButton() {
        $('.add-row').hide();
        if ($('.repeater-item').length > 1) {
            $('.repeater-item').last().find('.add-row').show();
        } else {
            $('.add-row').show();
        }
    }
    $(document).on('keydown', '.reference_age', function(e) {
    var max = parseInt($(this).attr('maxlength'));
    if ($(this).val().length >= max && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 37 && e.keyCode !== 39 && e.keyCode !== 46) {
        e.preventDefault();
    }
});


    $(document).ready(function() {
        document.getElementById('step1_zip').addEventListener('change', function() {
            var zipInput = this.value;
            if (zipInput == '0' || zipInput < 0) {
                this.value = '';
            }
        });
        document.getElementById('step1_total_rent').addEventListener('change', function() {
            var rentInput = this.value;
            if (rentInput == '0' || rentInput < 0) {
                this.value = '';
            }
        });
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
</script>
@include('layouts/website/footer')
