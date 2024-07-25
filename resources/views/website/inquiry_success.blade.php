@include('layouts/website/header')
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
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
        /* color: gray; */
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right;
        color: #673AB7;
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

    #progressbar {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        position: relative;
        font-weight: 400;
        color: #673AB7;

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
        background: #673AB7;
        /* color: #673AB7; */
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: #673AB7;
        /* color: #673AB7; */
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }


    .fit-image {
        width: 100%;
        object-fit: cover;
        height: 40px;
        ;
    }
    .card{
        width:1197px;
        margin-top: 140px;
    }
</style>

<div class="container mt_180">
    <div class="row" style="justify-content: center;">
        <div class="col-12 text-center">
            <div class="card">
               
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="personal"><strong>Personal Information</strong></li>
                        <li id="account"><strong>Account Information</strong></li>
                        <li id="payment"><strong>Credit Information</strong></li>
                        <li id="personal"><strong>References</strong></li>
                        <li id="terms"><strong>TERMS OF APPLICATION</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
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

