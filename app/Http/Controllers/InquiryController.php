<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\InquiryStep1;
use App\Models\InquiryStep2;
use App\Models\InquiryStep3;
use App\Models\InquiryStep4;
use App\Models\InquiryStep5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{


    public function validateStep1(Request $request)
    {
        $errors = [];

        if (empty($request['step1_name'])) {
            $errors['step1_name'] = 'Name is required';
        }

        if (empty($request['step1_telephone'])) {
            $errors['step1_telephone'] = 'Telephone is required';
        }
        if (strlen($request['step1_telephone']) < 7) {
            $errors['step1_telephone'] = 'Telephone must have at least 7 characters';
        }
        

        if (empty($request['step1_social_security_number'])) {
            $errors['step1_social_security_number'] = 'Social Security Number is required';
        }

        if (empty($request['step1_email'])) {
            $errors['step1_email'] = 'Email is required';
        }
        if (empty($request['step1_zip']) || $request['step1_zip'] <=0) {
            $errors['step1_zip'] = 'Zip Code is required';
        }
        
        if (empty($request['step1_total_rent']) || $request['step1_total_rent'] <=0) {
            $errors['step1_total_rent'] = 'Current Total Rent is required';
        }
       


        if (!empty($errors)) {
            $errors['status'] = false;
            echo json_encode($errors);
        } else {
            $errors['status'] = true;
            echo json_encode($errors);
        }
    }

    public function validateStep5(Request $request){
        $errors = [];

        if (empty($request['find_method'])) {
            $errors['find_method'] = 'This Field is required';
        }
        if($request['editPage'] == false || $request['editPage'] == 'false'){
        if (empty($request['signature'])) {
            $errors['signature'] = 'This Field is required';
        }
    }
       

        // if (empty($request['interviewing_agent'])) {
        //     $errors['interviewing_agent'] = 'This Field is required';
        // }

        // if (empty($request['lease_to_begin'])) {
        //     $errors['lease_to_begin'] = 'This Field is required';
        // }
        // if (empty($request['mail_new_lease'])) {
        //     $errors['mail_new_lease'] = 'This Field is required';
        // }
        // if (empty($request['rent'])) {
        //     $errors['rent'] = 'This Field is required';
        // }
        // if (empty($request['lease_length'])) {
        //     $errors['lease_length'] = 'This Field is required';
        // }
        // if (empty($request['security_amount'])) {
        //     $errors['security_amount'] = 'This Field is required';
        // }


        if (!empty($errors)) {
            $errors['status'] = false;
            echo json_encode($errors);
        } else {
            $errors['status'] = true;
            echo json_encode($errors);
        }
    }


    public function saveInquiry(Request $request)
    {
        
        $reference_nameArr = $request['reference_name'];
        $reference_relationArr = $request['reference_relation'];
        $reference_ageArr = $request['reference_age'];
       
        
        
    
        $formattedDate = date('Y-m-d', strtotime($request['step1_date']));
        $Step1Data = [
            'date' => $formattedDate,
            'apt_address' => $request['step1_apt_address'],
            'apt_number' => $request['step1_apt_number'],
            'name' => $request['step1_name'],
            'telephone' => $request['step1_telephone'],
            'social_security_number' => $request['step1_social_security_number'],
            'email' => $request['step1_email'],
            'present_address' => $request['step1_present_address'],
            'zip' => $request['step1_zip'],
            'user_apt_number' => $request['step1_user_apt_number'],
            'tenant_duration' => $request['step1_tenant_duration'],
            'present_landlord' => $request['step1_present_landlord'],
            'present_landlord_telephone' => $request['step1_present_landlord_telephone'],
            'total_rent' => $request['step1_total_rent'],
            'section_share' => $request['step1_section_share'],
            'landlord_address' => $request['step1_landlord_address'],
            'landlord_previous_address' => $request['step1_landlord_previous_address'],
            'previous_landlord' => $request['step1_previous_landlord'],
            'previous_landlord_address' => $request['step1_previous_landlord_address'],
            'previous_landlord_telephone' => $request['step1_previous_landlord_telephone'],
            'is_imported' => 0,
        ];
        $step1id = InquiryStep1::create($Step1Data);


        $step2Data = [
            "personal_info_id" => $step1id->id,
            "employer_name" => $request['step2_employer'],
            "employer_occupation" => $request['step2_employer_occupation'],
            "employer_business_address" => $request['step2_employer_business_address'],
            "employer_telephone" => $request['step2_employer_telephone'],
            "employer_duration" => $request['step2_employer_duration'],
            "director_of_personnel" => $request['step2_director_personnel'],
            "employer_salary" => $request['step2_employer_salary'],
            "employer_salary_period" => $request['step2_employer_salary_period'],
            "previous_employer" => $request['step2_previous_employer'],
            "previous_employer_occupation" => $request['step2_previous_employer_occupation'],
            "previous_employer_business_address" => $request['step2_previous_employer_businness_address'],
            "previous_employer_telephone" => $request['step2_previous_employer_telephone'],
            "previous_employer_duration" => $request['step2_previous_employer_duration'],
            "supervisor_name" => $request['step2_supervisor'],
            "previous_employer_salary" => $request['step2_previous_employer_salary'],
            "previous_employer_salary_period" => $request['step2_previous_employer_salary_period'],
        ];
        InquiryStep2::create($step2Data);


        $step3Data = [
            'personal_info_id' => $step1id->id,
            'card_name1' => $request['card_name1'],
            'account_number1' => $request['account_number1'],
            'card_name2' => $request['card_name2'],
            'account_number2' => $request['account_number2'],
            'card_name3' => $request['card_name3'],
            'account_number3' => $request['account_number3'],
        ];
        InquiryStep3::create($step3Data);

        $numberOfRelationRecords = count($reference_nameArr);
        for ($i = 0; $i < $numberOfRelationRecords; $i++) {
            $name = $reference_nameArr[$i];
            $relation = $reference_relationArr[$i];
            $age = $reference_ageArr[$i];
            if(!empty($name[$i]) && !empty($relation[$i]) && !empty($age[$i])){
                $step4Data = [
                    'personal_info_id' => $step1id->id,
                    'reference_name' => $name,
                    'reference_relation' => $relation,
                    'reference_age' => $age,
                ];
                InquiryStep4::create($step4Data);
            }
            
        }
       



        $step5Data = [
            'personal_info_id' => $step1id->id,
            'find_method' => $request['find_method'],
            'interviewing_agent' => null,
            'lease_to_begin' => null,
            'new_lease_mail' => null,
            'rent' => null,
            'lease_years_length' => null,
            'security_amount' => null,
            'signature' => $request['signature'],
        ];
        InquiryStep5::create($step5Data);


        return redirect('inquiry-success');
    }
    public function contactQuery(Request $request){
       
        $errors = [];

        if ($request['contact_name'] == '') {
            $errors['contact_name'] = 'Please enter your name';
        }

        if ($request['contact_email'] == '') {
            $errors['contact_email'] = 'Please enter your email';
        }

        if ($request['contact_message'] == '') {
            $errors['contact_message'] = 'Please enter a message';
        }

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }

      $data = [
        'name' => $request['contact_name'],
        'email' => $request['contact_email'],
        'message' => $request['contact_message'],
      ];
      $id = Auth::id();
      if(!empty($id)){
        $data['created_by'] = $id;
      }
      Contact::create($data);
      return response()->json(['status' => 'true']);

    }
}
