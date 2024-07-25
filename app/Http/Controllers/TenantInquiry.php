<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantInformation;
use App\Models\TenantPersonalInformation;
use App\Models\TenantLandlord;
use App\Models\TenantPersonalHistory;
use App\Models\TenantAcknowledgement;
use Hamcrest\Type\IsNumeric;

class TenantInquiry extends Controller
{
    public function validateTenantStep1(Request $request){
        $error =[];
        if(empty($request['step1_date'])){
            $error['step1_date'] = 'Date is required';
        }
        if(empty($request['step1_contact'])){
            $error['step1_contact'] = 'Contact is required';
        }
        if(empty($request['step1_telephone'])){
            $error['step1_telephone'] = 'Telephone is required';
        }
        if(empty($request['step1_building_address'])){
            $error['step1_building_address'] = 'Building Address is required';
        }
        if(empty($request['step1_apt_no'])){
            $error['step1_apt_no'] = 'Appartment Number is required';
        }
        if(empty($request['step1_zip']) || !is_numeric($request['step1_zip']) ){
            $error['step1_zip'] = 'Zip is required and cant contain any special character';
        }
      
        if (!empty($error)) {
            $error['status'] = false;
            echo json_encode($error);
        } else {
            $error['status'] = true;
            echo json_encode($error);
        }
    }



    public function validateTenantStep2(Request $request){

        $error =[];
        if(empty($request['step2_lname'])){
            $error['step2_lname'] = 'Last name is required';
        }
        if(empty($request['step2_fname'])){
            $error['step2_fname'] = 'First name is required';
        }
        if(empty($request['step2_mname'])){
            $error['step2_mname'] = 'Middle name is required';
        }
        if(empty($request['step2_ss'])){
            $error['step2_ss'] = 'SS is required';
        }
        if(empty($request['step2_dob'])){
            $error['step2_dob'] = ' DOB is required';
        }
        if(empty($request['step2_phone'])){
            $error['step2_phone'] = 'Phone is required';
        }
        if(!empty($request['step2_phone'])){
            if( strlen($request['step2_phone']) < 7){
                $error['step2_phone_length'] = 'Phone number must have atleast 7 characters';
                }
        }
        if(empty($request['step2_co_applicant'])){
            $error['step2_co_applicant'] = 'Co Applicant is required';
        }
        if(empty($request['step2_present_address'])){
            $error['step2_present_address'] = 'Present Address is required';
        }
        if(empty($request['step2_apt_no'])){
            $error['step2_apt_no'] = 'Appartment Number is required';
        }
        if(empty($request['step2_city'])){
            $error['step2_city'] = 'City is required';
        }
        if(empty($request['step2_state'])){
            $error['step2_state'] = 'State is required';
        }
        if(empty($request['step2_zip']) || !is_numeric($request['step2_zip'])){
            $error['step2_zip'] = 'Zip is required and cant contain any special character';
        }
      
        if (!empty($error)) {
            $error['status'] = false;
            echo json_encode($error);
        } else {
            $error['status'] = true;
            echo json_encode($error);
        }
    }


    public function validateTenantStep3(Request $request){

        $error =[];
        if(empty($request['step3_landlord'])){
            $error['step3_landlord'] = 'Landlord is required';
        }
        if(empty($request['step3_landlord_tel'])){
            $error['step3_landlord_tel'] = 'Landlord telephone is required';
        }
        if(!empty($request['step3_landlord_tel'])){

           if( strlen($request['step3_landlord_tel']) < 7){
                $error['step3_landlord_tel_length'] = 'Landlord telephone must have atleast 7 characters';
                }
        }

        if(empty($request['step3_employer'])){
            $error['step3_employer'] = 'Employer name is required';
        }
        if(empty($request['step3_employer_tel'])){
            $error['step3_employer_tel'] = 'Employer telephone is required';
        }

        if(!empty($request['step3_employer_tel'])){

            if( strlen($request['step3_employer_tel']) < 7){
                 $error['step3_employer_tel_length'] = 'Employer telephone must have atleast 7 characters';
                 }
         }

        if(empty($request['step3_employer_address'])){
            $error['step3_employer_address'] = ' Employer Address is required';
        }
        if(empty($request['step3_employer_contact'])){
            $error['step3_employer_contact'] = 'Employer Contact is required';
        }
      
        if (!empty($error)) {
            $error['status'] = false;
            echo json_encode($error);
        } else {
            $error['status'] = true;
            echo json_encode($error);
        }
    }



    public function validateTenantStep4(Request $request){
        
        $error = [];
        if(($request['step4_move_check1'] == false || $request['step4_move_check1'] == 'false')  && ($request['step4_move_check0'] == false ||  $request['step4_move_check0'] == 'false')){
            $error['step4_move_check'] = 'Move check is required';
        }
        if(($request['step4_bankrupt_check1'] == false || $request['step4_bankrupt_check1'] =='false' )&& ($request['step4_bankrupt_check0'] == false || $request['step4_bankrupt_check0'] == 'false')){
            $error['step4_bankrupt_check'] = 'Bankrupt check is required';
        }
        if(($request['step4_rental_agreement_check1']== false || $request['step4_rental_agreement_check1'] == 'false') && ($request['step4_rental_agreement_check0']== false || $request['step4_rental_agreement_check0'] == 'false')){
            $error['step4_rental_agreement_check'] = 'Rental aggreement check is required';
        }
        if(($request['step4_sued_check1']== false || $request['step4_sued_check1']== 'false') && ($request['step4_sued_check0'] == false || $request['step4_sued_check0']== 'false')){
            $error['step4_sued_check'] = 'Sued check is required';
        }

        if (!empty($error)) {
            $error['status'] = false;
            echo json_encode($error);
        } else {
            $error['status'] = true;
            echo json_encode($error);
        }
        
    }


    public function SubmitTenant(Request $request)
    {
        
        if(!empty($request['step1_date'])){

            $formattedDate = date('Y-m-d', strtotime($request['step1_date']));
        }
        else{
            $formattedDate = null;
        }
        $step1Data = [
            'date' => $formattedDate,
            'contact' => $request['step1_contact'],
            'telephone' => $request['step1_telephone'],
            'building_address' => $request['step1_building_address'],
            'appartment_number' => $request['step1_apt_no'],
            'zip' => $request['step1_zip'],
        ];
        // dd($step1Data);

        $step1 = TenantInformation::create($step1Data);
        $step1id = $step1->id;

        if(!empty($request['step2_dob'])){

            $formattedDob = date('Y-m-d', strtotime($request['step2_dob']));
        }
        else{
            $formattedDob = null;
        }

        $step2Data = [
            'tenant_info_id' => $step1id,
            'last_name' => $request['step2_lname'],
            'first_name' => $request['step2_fname'],
            'middle_name' => $request['step2_mname'],
            'ss_no' => $request['step2_ss'],
            'date_of_birth' => $formattedDob,
            'phone' => $request['step2_phone'],
            'co-applicant' => $request['step2_co-applicant'],
            'present_address' => $request['step2_present_address'],
            'appartment_number' => $request['step2_apt_no'],
            'city' => $request['step2_city'],
            'state' => $request['step2_state'],
            'zip' => $request['step2_zip'],
            'is_imported'=> 0,
        ];
        TenantPersonalInformation::create($step2Data);
        if(!empty($request['step3_employer_sdate'])){

            $formattedsdate = date('Y-m-d', strtotime($request['step3_employer_sdate']));
            
        }
        else{
            $formattedsdate = null;
        }

        $step3Data = [
            'tenant_info_id' => $step1id,
            'landlord' => $request['step3_landlord'],
            'landlord_telephone' => $request['step3_landlord_tel'],
            'employer' => $request['step3_employer'],
            'employer_telephone' => $request['step3_employer_tel'],
            'employer_address' => $request['step3_employer_address'],
            'employer_contact' => $request['step3_employer_contact'],
            'employer_position' => $request['step3_employer_position'],
            'employer_start_date' => $formattedsdate,
            'employer_salary' => $request['step3_employer_salary'],
        ];
        TenantLandlord::create($step3Data);


        $step4Data = [
            'tenant_info_id' => $step1id,
            'move_check' => $request['step4_move_check'],
            'bankrupt_check' => $request['step4_bankrupt_check'],
            'rental_agreement_check' => $request['step4_rental_agreement_check'],
            'sued_check' => $request['step4_sued_check'],
        ];
        TenantPersonalHistory::create($step4Data);

        if(!empty($request['sign_date'])){

            $formattedsigndate = date('Y-m-d', strtotime($request['sign_date']));
            
            
        }
        else{
            $formattedsigndate = null;
        }
        $step5Data = [
            'tenant_info_id' => $step1id,
            'signature' => $request['signature'],
            'signature_date' => $formattedsigndate,
        ];
        TenantAcknowledgement::create($step5Data);

        return redirect('tenant-success');
    }

    public function validateTenantStep5(Request $request){
        $error =[];
        if(empty($request['signature'])){
            $error['signature'] = 'Signature are required';
        }
        if(empty($request['sign_date'])){
            $error['signature'] = 'Signature Date is required';
        }

        if (!empty($error)) {
            $error['status'] = false;
            echo json_encode($error);
        } else {
            $error['status'] = true;
            echo json_encode($error);
        }

    }
}
