<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InquiryStep1;
use App\Models\InquiryStep2;
use App\Models\InquiryStep3;
use App\Models\InquiryStep4;
use App\Models\InquiryStep5;
use App\Models\TenantInformation;
use App\Models\TenantAcknowledgement;
use App\Models\TenantLandlord;
use App\Models\TenantPersonalHistory;
use App\Models\TenantPersonalInformation;
use App\Models\Contact;
use App\Models\ContactQueriesReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DateTime;
use App\Exports\InquiryExport;
use App\Exports\TenantExport;
use App\Imports\InquiriesImport;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';

        $userCount = User::count();
        // $userActiveCount = User::where('status', 1)->count();
        // $userInactiveCount = User::where('status', 0)->count();

        $inquiryCount = InquiryStep1::count();
        $inquiryActiveCount = InquiryStep1::where('status', 1)->count();
        $inquiryInactiveCount = InquiryStep1::where('status', 0)->count();

        $tenantCount = TenantInformation::count();
        $tenantActiveCount = TenantInformation::where('status', 1)->count();
        $tenantInactiveCount = TenantInformation::where('status', 0)->count();

        $contactCount = Contact::count();
        $contactActiveCount = Contact::where('reply_status', 1)->count();
        $contactInactiveCount = Contact::where('reply_status', 0)->count();

        return view('admin/index', compact(
            'pageTitle',
            'userCount',
            'inquiryCount',
            'inquiryActiveCount',
            'inquiryInactiveCount',
            'tenantCount',
            'tenantActiveCount',
            'tenantInactiveCount',
            'contactCount',
            'contactActiveCount',
            'contactInactiveCount'
        ));
    }


    public function users()
    {
        $pageTitle = 'Users';
        return view('admin/users', compact('pageTitle'));
    }


    public function getAllUsers()
    {

        $id = Auth::id();
        $users = User::where('id', '!=', $id)->get();
        return response()->json(['users' => $users]);
    }


    public function getSpecificuser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }


    public function updateUser(Request $request)
    {
        
        $user_id = Auth::id();
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'updated_by' => $user_id,
        ];
        if ($request['role'] == 'admin') {
            $data['role'] = 'admin';
            $data['is_super_admin'] = 0;
        } else {
            $data['role'] = 'admin';
            $data['is_super_admin'] = 1;
        }
        if (!empty($request['password'])) {
            $data['password'] = $request['password'];
        }
        $user = User::find($request['id']);
        $update = $user->update($data);
        $title = 'Profile Updated';
        $email = $data['email'];
        if(!empty($request->password)){

            $password = $request->password;
        }
        else{
            $password = 'Use Old Password';
        }
        $loginurl = url('/login');
        $body = "
<html>
<head></head>
<body style=\"color: black; background-color: white;\">
    <p class=\"yiv7050401279MsoNormal\">&nbsp;</p>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border: 0; width: 100%; cellspacing: 0; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr style=\"min-height: 22.5pt;\">
                <td class=\"header\" style=\"width: 418.5pt; background-color: #000; color: white; padding-left: 10px; float: left;\" colspan=\"4\" valign=\"top\" width=\"743\">
                    <strong>
                        <span style=\"font-size: 15.0pt; font-family: Calibri, sans-serif; color: white;\">
                            &nbsp; LANGSAM NOTIFICATION
                        </span>
                    </strong>
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: 0in 0in 0in 0in; min-height: 22.5pt; background-color: white; color: black;\" colspan=\"4\">
                    <p class=\"yiv7050401279MsoNormal\" style=\"margin-bottom: 12.0pt;\">
                        <span style=\"font-size: 10.0pt;\">
                            <strong>&nbsp; &nbsp;Login Credentials</strong>
                        </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border: 1; width: 100%; cellspacing: 3; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>User Name</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;$email</span>
                    </p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>Password</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;$password</span>
                    </p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>Login Link</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;  <a href=\"$loginurl\" style=\"display: inline-block; padding: 10px 20px; font-size: 9.0pt; font-family: Calibri, sans-serif; color: #FFFFFF; background-color: #343A40; text-decoration: none; border-radius: 5px;\">Login</a> </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border-collapse: collapse; border: 0; width: 100%; cellspacing: 0; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr>
                <td style=\"width: 445.5pt; background-color: #F2F2F2; padding: 0in 5.4pt 0in 5.4pt;\" colspan=\"8\" valign=\"top\" width=\"743\">
                    <p align=\"center\">Copyright (c) 2024, Langsam. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
";



        Mail::to($data['email'])->send(new SendMail($title, $body));
    }


    public function addUser(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('email', $request['email'])->first();
       if($user){
        return response()->json(['email_error' => true, 'status' => 'User with this email already exists'], 200);
       }
       else{

       

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'created_by' => $user_id,
        ];
        if ($request['role'] == 'admin') {
            $data['role'] = 'admin';
            $data['is_super_admin'] = 0;
        } else {
            $data['role'] = 'admin';
            $data['is_super_admin'] = 1;
        }
        $insert = User::create($data);
        $title = 'Welcome to the Langsam';
        $email = $data['email'];
        $password = $data['password'];
        $loginurl = url('/login');
        $body = "
<html>
<head></head>
<body style=\"color: black; background-color: white;\">
    <p class=\"yiv7050401279MsoNormal\">&nbsp;</p>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border: 0; width: 100%; cellspacing: 0; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr style=\"min-height: 22.5pt;\">
                <td class=\"header\" style=\"width: 418.5pt; background-color: #000; color: white; padding-left: 10px; float: left;\" colspan=\"4\" valign=\"top\" width=\"743\">
                    <strong>
                        <span style=\"font-size: 15.0pt; font-family: Calibri, sans-serif; color: white;\">
                            &nbsp; LANGSAM NOTIFICATION
                        </span>
                    </strong>
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: 0in 0in 0in 0in; min-height: 22.5pt; background-color: white; color: black;\" colspan=\"4\">
                    <p class=\"yiv7050401279MsoNormal\" style=\"margin-bottom: 12.0pt;\">
                        <span style=\"font-size: 10.0pt;\">
                            <strong>&nbsp; &nbsp;Login Credentials</strong>
                        </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border: 1; width: 100%; cellspacing: 3; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>User Name</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;$email</span>
                    </p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>Password</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;$password</span>
                    </p>
                </td>
            </tr>
            <tr style=\"min-height: 22.5pt;\">
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; <strong>Login Link</strong></span>
                    </p>
                </td>
                <td style=\"border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt; background-color: white; color: black;\">
                    <p class=\"yiv7050401279MsoNormal\">
                        <span style=\"font-size: 9.0pt;\">&nbsp; &nbsp;  <a href=\"$loginurl\" style=\"display: inline-block; padding: 10px 20px; font-size: 9.0pt; font-family: Calibri, sans-serif; color: #FFFFFF; background-color: #343A40; text-decoration: none; border-radius: 5px;\">Login</a> </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class=\"yiv7050401279MsoNormalTable\" style=\"width: 100.0%; border-collapse: collapse; border: 0; width: 100%; cellspacing: 0; cellpadding: 0; background-color: white; color: black;\">
        <tbody>
            <tr>
                <td style=\"width: 445.5pt; background-color: #F2F2F2; padding: 0in 5.4pt 0in 5.4pt;\" colspan=\"8\" valign=\"top\" width=\"743\">
                    <p align=\"center\">Copyright (c) 2024, Langsam. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
";



        Mail::to($data['email'])->send(new SendMail($title, $body));
    }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['status' => 'deleted']);
    }


    public function inquiryView()
    {
        $pageTitle = 'Inquiries';
        $inquiryData = InquiryStep1::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('admin.inquiry', compact('pageTitle', 'inquiryData'));
    }

    public function deleteInquiry($id)
    {
        $user_id = Auth::id();

        $inquiry = InquiryStep1::find($id);
        if (!$inquiry) {
            return response()->json(['status' => 'Inquiry not found'], 404);
        }

        $update = $inquiry->update([
            'status' => 0,
            'deleted_by' => $user_id,
        ]);

        return response()->json(['status' => 'deleted']);
    }

    public function deleteSelectedIinquiries(Request $request)
    {
        $id = Auth::id();
        $ids = $request['all_selected_ids'];

        InquiryStep1::whereIn('id', $ids)->update(['status' => 0, 'updated_by' => $id, 'deleted_by' => $id]);

        $result['status'] = 'deleted';
        echo json_encode($result);
    }

    public function permanantdeleteInquiries(Request $request){
     
        $ids = $request['all_selected_ids'];

        InquiryStep1::whereIn('id', $ids)->delete();
        InquiryStep2::whereIn('personal_info_id', $ids)->delete();
        InquiryStep3::whereIn('personal_info_id', $ids)->delete();
        InquiryStep4::whereIn('personal_info_id', $ids)->delete();
        InquiryStep5::whereIn('personal_info_id', $ids)->delete();

        $result['status'] = 'deleted';
        echo json_encode($result);
    }
    public function permanantdeleteTenants(Request $request){
     
        $ids = $request['all_selected_ids'];

        TenantInformation::whereIn('id', $ids)->delete();
        TenantPersonalInformation::whereIn('tenant_info_id', $ids)->delete();
        TenantLandlord::whereIn('tenant_info_id', $ids)->delete();
        TenantPersonalHistory::whereIn('tenant_info_id', $ids)->delete();
        TenantAcknowledgement::whereIn('tenant_info_id', $ids)->delete();

        $result['status'] = 'deleted';
        echo json_encode($result);
    }

    public function inquiryDetails($id)
    {
        $pageTitle = 'Inquiry - Edit';

        
        $inquiry = InquiryStep1::with('inquiryStep2', 'inquiryStep3', 'inquiryStep4', 'inquiryStep5')
            ->where('id', $id)
            ->get();
            // dd($inquiry[0]->inquiryStep4);
            




        $inquiry[0]->date = date('d-m-Y', strtotime($inquiry[0]->date));
        return view('admin.edit-inquiry', compact('inquiry', 'pageTitle'));
    }

    public function updateInquiry(Request $request)
    {
       
        $reference_id_arr = $request['reference_id'];
        $reference_name_arr = $request['reference_name'];
        $reference_relation_arr = $request['reference_relation'];
        $reference_age_arr = $request['reference_age'];
        $user_id = Auth::id();
        $enqId = $request['inquiry_edit_id'];
        if(!empty($request['step1_date'])){

            $formattedDate = date('Y-m-d', strtotime($request['step1_date']));
        }
        else{
            $formattedDate = null;
        }
        $Step1Data = [
            'date' => $formattedDate,
            'apt_address' => isset($request['step1_apt_address']) ? $request['step1_apt_address'] : null,
            'apt_number' => isset($request['step1_apt_number']) ? $request['step1_apt_number'] : null,
            'name' => isset($request['step1_name']) ? $request['step1_name'] : null,
            'telephone' => isset($request['step1_telephone']) ? $request['step1_telephone'] : null,
            'social_security_number' => isset($request['step1_social_security_number']) ? $request['step1_social_security_number'] : null,
            'email' => isset($request['step1_email']) ? $request['step1_email'] : null,
            'present_address' => isset($request['step1_present_address']) ? $request['step1_present_address'] : null,
            'zip' => isset($request['step1_zip']) ? $request['step1_zip'] : null,
            'user_apt_number' => isset($request['step1_user_apt_number']) ? $request['step1_user_apt_number'] : null,
            'tenant_duration' => isset($request['step1_tenant_duration']) ? $request['step1_tenant_duration'] : null,
            'present_landlord' => isset($request['step1_present_landlord']) ? $request['step1_present_landlord'] : null,
            'present_landlord_telephone' => isset($request['step1_present_landlord_telephone']) ? $request['step1_present_landlord_telephone'] : null,
            'total_rent' => isset($request['step1_total_rent']) ? $request['step1_total_rent'] : null,
            'section_share' => isset($request['step1_section_share']) ? $request['step1_section_share'] : null,
            'landlord_address' => isset($request['step1_landlord_address']) ? $request['step1_landlord_address'] : null,
            'landlord_previous_address' => isset($request['step1_landlord_previous_address']) ? $request['step1_landlord_previous_address'] : null,
            'previous_landlord' => isset($request['step1_previous_landlord']) ? $request['step1_previous_landlord'] : null,
            'previous_landlord_address' => isset($request['step1_previous_landlord_address']) ? $request['step1_previous_landlord_address'] : null,
            'previous_landlord_telephone' => isset($request['step1_previous_landlord_telephone']) ? $request['step1_previous_landlord_telephone'] : null,
            'updated_by' => $user_id,
        ];


        $inquiry_step1 = InquiryStep1::where('id', $enqId)->first();
        if (!$inquiry_step1) {
            return redirect()->back();
        } else {
            $inquiry_step1->update($Step1Data);
        }

        $step2Data = [
            "employer_name" => isset($request['step2_employer']) ? $request['step2_employer'] : null,
            "employer_occupation" => isset($request['step2_employer_occupation']) ? $request['step2_employer_occupation'] : null,
            "employer_business_address" => isset($request['step2_employer_business_address']) ? $request['step2_employer_business_address'] : null,
            "employer_telephone" => isset($request['step2_employer_telephone']) ? $request['step2_employer_telephone'] : null,
            "employer_duration" => isset($request['step2_employer_duration']) ? $request['step2_employer_duration'] : null,
            "director_of_personnel" => isset($request['step2_director_personnel']) ? $request['step2_director_personnel'] : null,
            "employer_salary" => isset($request['step2_employer_salary']) ? $request['step2_employer_salary'] : null,
            "employer_salary_period" => isset($request['step2_employer_salary_period']) ? $request['step2_employer_salary_period'] : null,
            "previous_employer" => isset($request['step2_previous_employer']) ? $request['step2_previous_employer'] : null,
            "previous_employer_occupation" => isset($request['step2_previous_employer_occupation']) ? $request['step2_previous_employer_occupation'] : null,
            "previous_employer_business_address" => isset($request['step2_previous_employer_businness_address']) ? $request['step2_previous_employer_businness_address'] : null,
            "previous_employer_telephone" => isset($request['step2_previous_employer_telephone']) ? $request['step2_previous_employer_telephone'] : null,
            "previous_employer_duration" => isset($request['step2_previous_employer_duration']) ? $request['step2_previous_employer_duration'] : null,
            "supervisor_name" => isset($request['step2_supervisor']) ? $request['step2_supervisor'] : null,
            "previous_employer_salary" => isset($request['step2_previous_employer_salary']) ? $request['step2_previous_employer_salary'] : null,
            "previous_employer_salary_period" => isset($request['step2_previous_employer_salary_period']) ? $request['step2_previous_employer_salary_period'] : null,
            'updated_by' => $user_id,
        ];


        $inquiry_step2 = InquiryStep2::where('personal_info_id', $enqId)->first();
        
        $inquiry_step2->update($step2Data);


        $inquiry_step3 = InquiryStep3::where('personal_info_id', $enqId)->first();

        if (!isset($inquiry_step3->id)) {
            $inquiry_step3 = new InquiryStep3();
        }

        $inquiry_step3->personal_info_id = $enqId;
        $inquiry_step3->card_name1 = isset($request['card_name1']) ? $request['card_name1'] : null;
        $inquiry_step3->account_number1 = isset($request['account_number1']) ? $request['account_number1'] : null;
        $inquiry_step3->card_name2 = isset($request['card_name2']) ? $request['card_name2'] : null;
        $inquiry_step3->account_number2 = isset($request['account_number2']) ? $request['account_number2'] : null;
        $inquiry_step3->card_name3 = isset($request['card_name3']) ? $request['card_name3'] : null;
        $inquiry_step3->account_number3 = isset($request['account_number3']) ? $request['account_number3'] : null;
        $inquiry_step3->updated_by = $user_id;

        $inquiry_step3->save();


        InquiryStep4::where('personal_info_id', $enqId)->delete();

$numberOfRelationRecords = count($reference_name_arr);
for ($i = 0; $i < $numberOfRelationRecords; $i++) {
    $name = $reference_name_arr[$i] ?? null;
    $relation = $reference_relation_arr[$i] ?? null;
    $age = $reference_age_arr[$i] ?? null;

    if (!empty($name) && !empty($relation) && !empty($age)) {
        InquiryStep4::create([
            'personal_info_id' => $enqId,
            'reference_name' => $name,
            'reference_relation' => $relation,
            'reference_age' => $age,
        ]);
    }
}
       



        // $inquiry_step4 = InquiryStep4::where('personal_info_id', $enqId)->first();
        // if (!isset($inquiry_step4->id)) {
        //     $inquiry_step4 = new InquiryStep4();
        // }
        // $inquiry_step4->personal_info_id = $enqId;
        // $inquiry_step4->reference1_name = isset($request['reference1_name']) ? $request['reference1_name'] : null;
        // $inquiry_step4->reference1_relation =  isset($request['reference1_relation']) ? $request['reference1_relation'] : null;
        // $inquiry_step4->reference1_age =  isset($request['reference1_age']) ? $request['reference1_age'] : null;
        // $inquiry_step4->reference2_name =  isset($request['reference2_name']) ? $request['reference2_name'] : null;
        // $inquiry_step4->reference2_relation =  isset($request['reference2_relation']) ? $request['reference2_relation'] : null;
        // $inquiry_step4->reference2_age =  isset($request['reference2_age']) ? $request['reference2_age'] : null;
        // $inquiry_step4->reference3_name =  isset($request['reference3_name']) ? $request['reference3_name'] : null;
        // $inquiry_step4->reference3_relation =  isset($request['reference3_relation']) ? $request['reference3_relation'] : null;
        // $inquiry_step4->reference3_age =  isset($request['reference3_age']) ? $request['reference3_age'] : null;
        // $inquiry_step4->updated_by = $user_id;

        // $inquiry_step4->save();

        $inquiry_step5 = InquiryStep5::where('personal_info_id', $enqId)->first();
        if (!isset($inquiry_step5->id)) {
            $inquiry_step5 = new InquiryStep5();
        }

        $inquiry_step5->personal_info_id = $enqId;
        $inquiry_step5->find_method = isset($request['find_method']) ? $request['find_method'] : null;
        if($request['signature'] && $request['signature']!=null){
            $inquiry_step5->signature = $request['signature'];
        }
       
        $inquiry_step5->interviewing_agent = isset($request['interviewing_agent']) ? $request['interviewing_agent'] : null;
        $inquiry_step5->lease_to_begin = isset($request['lease_to_begin']) ? $request['lease_to_begin'] : null;
        $inquiry_step5->new_lease_mail = isset($request['mail_new_lease']) ? $request['mail_new_lease'] : null;
        $inquiry_step5->rent = isset($request['rent']) ? $request['rent'] : null;
        $inquiry_step5->lease_years_length = isset($request['lease_length']) ? $request['lease_length'] : null;
        $inquiry_step5->security_amount = isset($request['security_amount']) ? $request['security_amount'] : null;
        $inquiry_step5->updated_by = $user_id;
        // dd($request);
        $inquiry_step5->save();

        notify()->success(__('Record Updated Successfully'));
        return redirect('admin/inquiry');
    }


    public function tenantView()
    {
        $pageTitle = 'Tenant Inquiries';
        $tenantInquiries = TenantInformation::where('status', '1')->with('tenantPersonalInformation')->orderBy('created_at', 'desc')->get();



        return view('admin.tenant-inquiry', compact('pageTitle', 'tenantInquiries'));
    }

    public function deleteTenant($id)
    {
        $user_id = Auth::id();
        $tenant = TenantInformation::find($id);
        if (!$tenant) {
            return response()->json(['status' => 'Tenant Inquiry not found'], 404);
        }

        $update = $tenant->update([
            'status' => 0,
            'deleted_by' => $user_id
        ]);

        return response()->json(['status' => 'deleted']);
    }

    // to load edit page for tenant inquiries 
    public function tenantDetails($id)
    {
        $pageTitle = 'Tenant - Edit';
        $tenant = TenantInformation::with('tenantAcknowledgement', 'tenantLandlord', 'tenantPersonalHistory', 'tenantPersonalInformation')
            ->where('id', $id)
            ->first();
        $tenant->date = date('d-m-Y', strtotime($tenant->date));
        $tenant->tenantPersonalInformation->co_applicant = $tenant->tenantPersonalInformation['co-applicant'];
        // dd($tenant->id);
        return view('admin.edit-tenant', compact('tenant', 'pageTitle'));
    }

    public function updateTenant(Request $request)
    {
        // dd($request);
        $formattedDate = date('Y-m-d', strtotime($request['step1_date']));
        $user_id = Auth::id();
        $tenant_id = $request['tenant_id'];
        $step1Data = [
            'date' => null,
            'contact' => null,
            'telephone' => null,
            'building_address' => null,
            'appartment_number' => null,
            'zip' => null,
            'updated_by' => $user_id,
        ];

        $tenant_step1 = TenantInformation::where('id', $tenant_id)->first();
        if (!$tenant_step1) {
            notify()->error(__('Record Not Found'));
            return redirect()->back();
        } else {
            $tenant_step1->update($step1Data);
        }
        if(!empty($request['step2_dob'])){
        $formattedDob = date('Y-m-d', strtotime($request['step2_dob']));
        }
        else{
            $formattedDob = null;
        }
        $step2Data = [
            'tenant_info_id' => $tenant_id,
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
            'updated_by' => $user_id,
        ];
        $tenant_step2 = TenantPersonalInformation::where('tenant_info_id', $tenant_id)->first();
        $tenant_step2->update($step2Data);

        if(!empty($request['step3_employer_sdate'])){
            $formattedsdate = date('Y-m-d', strtotime($request['step2_dob']));
            }
            else{
                $formattedsdate = null;
            }
        // $formattedsdate = date('Y-m-d', strtotime($request['step3_employer_sdate']));
        $step3Data = [
            'tenant_info_id' => $tenant_id,
            'landlord' => $request['step3_landlord'],
            'landlord_telephone' => $request['step3_landlord_tel'],
            'employer' => $request['step3_employer'],
            'employer_telephone' => $request['step3_employer_tel'],
            'employer_address' => $request['step3_employer_address'],
            'employer_contact' => $request['step3_employer_contact'],
            'employer_position' => $request['step3_employer_position'],
            'employer_start_date' => $formattedsdate,
            'employer_salary' => $request['step3_employer_salary'],
            'updated_by' => $user_id,
        ];
        $tenant_step3 = TenantLandlord::where('tenant_info_id', $tenant_id)->first();
        $tenant_step3->update($step3Data);



        $step4Data = [
            'tenant_info_id' => $tenant_id,
            'move_check' => $request['step4_move_check'],
            'bankrupt_check' => $request['step4_bankrupt_check'],
            'rental_agreement_check' => $request['step4_rental_agreement_check'],
            'sued_check' => $request['step4_sued_check'],
            'updated_by' => $user_id,
        ];
        $tenant_step4 = TenantPersonalHistory::where('tenant_info_id', $tenant_id)->first();
        $tenant_step4->update($step4Data);


        $formattedsigndate = date('Y-m-d', strtotime($request['sign_date']));
        $step5Data = [
            'tenant_info_id' => $tenant_id,
            'updated_by' => $user_id,
        ];
        if($request['signature'] && $request['signature']!=null){
            $step5Data['signature'] = $request['signature'];
        }
        $tenant_step5 = TenantAcknowledgement::where('tenant_info_id', $tenant_id)->first();
        $tenant_step5->update($step5Data);


        notify()->success(__('Record Updated Successfully'));
        return redirect()->route('tenantView');
    }

    public function deleteallTenant(Request $request)
    {
        $id = Auth::id();
        $ids = $request['all_selected_ids'];
        TenantInformation::whereIn('id', $ids)->update(['status' => 0, 'updated_by' => $id, 'deleted_by' => $id]);
        $result['status'] = 'deleted';
        echo json_encode($result);
    }

    // to export inquiries 



    // public function export()
    // {
    //     $inquiryData = InquiryStep1::with('inquiryStep2', 'inquiryStep3', 'inquiryStep4', 'inquiryStep5')
    //         ->where('status', 1)
    //         ->get();

    //     if ($inquiryData->isNotEmpty()) {
    //         $headers = [
    //             'Content-Type' => 'application/vnd.ms-excel',
    //             'Content-Disposition' => 'attachment; filename="inquiry_export_' . date('YmdHis') . '.csv"',
    //         ];

    //         return response()->stream(function () use ($inquiryData, $headers) {
    //             $file = fopen('php://output', 'w');
    //             fputcsv($file, [
    //                 'Date', 'Appartment Address', 'Appartment Number', 'Name', 'Telephone', 'Social Security Number', 'Email', 'Present Address', 'Zip', 'User Appartment Number', 'Tenant Duration', 'Present Landlord', 'Present Landlord Telephone', 'Total Rent', 'Section Share', 'Landlord Address', 'Landlord Previous Address', 'Previous Landlord', 'Previous Landlord Address', 'Previous Landlord Telephone',
    //                 'Employer Name', 'Employer Occupation', 'Employer Business Address', 'Employer Telephone', 'Employer Duration', 'Director Of Personnel', 'Employer Salary', 'Employer Salary Period', 'Previous Employer', 'Previous Employer Occupation', 'Previous Employer Business Address', 'Previous Employer Telephone', 'Previous Employer Duration', 'Supervisor Name', 'Previous Employer Salary', 'Previous Employer Salary Period',
    //                 'Card Name 1', 'Account Number 1', 'Card Name 2', 'Account Number 2', 'Card Name 3', 'Account Number 3',
    //                 'Reference 1 Name', 'Reference 1 Relation', 'Reference 1 Age', 'Reference 2 Name', 'Reference 2 Relation', 'Reference 2 Age', 'Reference 3 Name', 'Reference 3 Relation', 'Reference 3 Age',
    //                 'Find Method', 'Interviewing Agent', 'Lease To Begin', 'Lease Mail', 'Rent', 'Lease Year Length', 'Security Amount'
    //             ]);

    //             foreach ($inquiryData as $data) {
    //                 fputcsv($file, [
    //                     !empty($data->date) ? date('d-m-Y', strtotime($data->date)) : '',
    //                     isset($data->apt_address) ? $data->apt_address : '',
    //                     isset($data->apt_number) ? $data->apt_number : '',
    //                     isset($data->name) ? $data->name : '',
    //                     isset($data->telephone) ? $data->telephone : '',
    //                     isset($data->social_security_number) ? $data->social_security_number : '',
    //                     isset($data->email) ? $data->email : '',
    //                     isset($data->present_address) ? $data->present_address : '',
    //                     isset($data->zip) ? $data->zip : '',
    //                     isset($data->user_apt_number) ? $data->user_apt_number : '',
    //                     isset($data->tenant_duration) ? $data->tenant_duration : '',
    //                     isset($data->present_landlord) ? $data->present_landlord : '',
    //                     isset($data->present_landlord_telephone) ? $data->present_landlord_telephone : '',
    //                     isset($data->total_rent) ? $data->total_rent : '',
    //                     isset($data->section_share) ? $data->section_share : '',
    //                     isset($data->landlord_address) ? $data->landlord_address : '',
    //                     isset($data->landlord_previous_address) ? $data->landlord_previous_address : '',
    //                     isset($data->previous_landlord) ? $data->previous_landlord : '',
    //                     isset($data->previous_landlord_address) ? $data->previous_landlord_address : '',
    //                     isset($data->previous_landlord_telephone) ? $data->previous_landlord_telephone : '',
    //                     isset($data->inquiryStep2->employer_name) ? $data->inquiryStep2->employer_name : '',
    //                     isset($data->inquiryStep2->employer_occupation) ? $data->inquiryStep2->employer_occupation : '',
    //                     isset($data->inquiryStep2->employer_business_address) ? $data->inquiryStep2->employer_business_address : '',
    //                     isset($data->inquiryStep2->employer_telephone) ? $data->inquiryStep2->employer_telephone : '',
    //                     isset($data->inquiryStep2->employer_duration) ? $data->inquiryStep2->employer_duration : '',
    //                     isset($data->inquiryStep2->director_of_personnel) ? $data->inquiryStep2->director_of_personnel : '',
    //                     isset($data->inquiryStep2->employer_salary) ? $data->inquiryStep2->employer_salary : '',
    //                     isset($data->inquiryStep2->employer_salary_period) ? $data->inquiryStep2->employer_salary_period : '',
    //                     isset($data->inquiryStep2->previous_employer) ? $data->inquiryStep2->previous_employer : '',
    //                     isset($data->inquiryStep2->previous_employer_occupation) ? $data->inquiryStep2->previous_employer_occupation : '',
    //                     isset($data->inquiryStep2->previous_employer_business_address) ? $data->inquiryStep2->previous_employer_business_address : '',
    //                     isset($data->inquiryStep2->previous_employer_telephone) ? $data->inquiryStep2->previous_employer_telephone : '',
    //                     isset($data->inquiryStep2->previous_employer_duration) ? $data->inquiryStep2->previous_employer_duration : '',
    //                     isset($data->inquiryStep2->supervisor_name) ? $data->inquiryStep2->supervisor_name : '',
    //                     isset($data->inquiryStep2->previous_employer_salary) ? $data->inquiryStep2->previous_employer_salary : '',
    //                     isset($data->inquiryStep2->previous_employer_salary_period) ? $data->inquiryStep2->previous_employer_salary_period : '',
    //                     isset($data->inquiryStep3->card_name1) ? $data->inquiryStep3->card_name1 : '',
    //                     isset($data->inquiryStep3->account_number1) ? $data->inquiryStep3->account_number1 : '',
    //                     isset($data->inquiryStep3->card_name2) ? $data->inquiryStep3->card_name2 : '',
    //                     isset($data->inquiryStep3->account_number2) ? $data->inquiryStep3->account_number2 : '',
    //                     isset($data->inquiryStep3->card_name3) ? $data->inquiryStep3->card_name3 : '',
    //                     isset($data->inquiryStep3->account_number3) ? $data->inquiryStep3->account_number3 : '',
    //                     isset($data->inquiryStep4->reference1_name) ? $data->inquiryStep4->reference1_name : '',
    //                     isset($data->inquiryStep4->reference1_relation) ? $data->inquiryStep4->reference1_relation : '',
    //                     isset($data->inquiryStep4->reference1_age) ? $data->inquiryStep4->reference1_age : '',
    //                     isset($data->inquiryStep4->reference2_name) ? $data->inquiryStep4->reference2_name : '',
    //                     isset($data->inquiryStep4->reference2_relation) ? $data->inquiryStep4->reference2_relation : '',
    //                     isset($data->inquiryStep4->reference2_age) ? $data->inquiryStep4->reference2_age : '',
    //                     isset($data->inquiryStep4->reference3_name) ? $data->inquiryStep4->reference3_name : '',
    //                     isset($data->inquiryStep4->reference3_relation) ? $data->inquiryStep4->reference3_relation : '',
    //                     isset($data->inquiryStep4->reference3_age) ? $data->inquiryStep4->reference3_age : '',
    //                     isset($data->inquiryStep5->find_method) ? $data->inquiryStep5->find_method : '',

    //                     isset($data->inquiryStep5->interviewing_agent) ? $data->inquiryStep5->interviewing_agent : '',
    //                     isset($data->inquiryStep5->lease_to_begin) ? $data->inquiryStep5->lease_to_begin : '',
    //                     isset($data->inquiryStep5->new_lease_mail) ? $data->inquiryStep5->new_lease_mail : '',
    //                     isset($data->inquiryStep5->rent) ? $data->inquiryStep5->rent : '',
    //                     isset($data->inquiryStep5->lease_years_length) ? $data->inquiryStep5->lease_years_length : '',
    //                     isset($data->inquiryStep5->security_amount) ? $data->inquiryStep5->security_amount : ''
    //                 ]);
    //             }

    //             fclose($file);
    //         }, 200, $headers);
    //     } else {
    //         notify()->error(__('No Record Found'));
    //         return redirect()->back();
    //     }
    // }

    public function export(){
        return Excel::download(new InquiryExport, 'inquiry_export.xlsx');
    }

    // to export tenant inquiries 

    // public function exportTenant()
    // {
    //     $tenantData = TenantInformation::with('tenantAcknowledgement', 'tenantLandlord', 'tenantPersonalHistory', 'tenantPersonalInformation')
    //         ->where('status', 1)
    //         ->get();

    //     if ($tenantData->isNotEmpty()) {
    //         $headers = [
    //             'Content-Type' => 'application/vnd.ms-excel',
    //             'Content-Disposition' => 'attachment; filename="tenant_export_' . date('YmdHis') . '.csv"',
    //         ];

    //         return response()->stream(function () use ($tenantData, $headers) {
    //             $file = fopen('php://output', 'w');
    //             fputcsv($file, [
    //                 'Date', 'Contact', 'Telephone', 'Building Address', 'Appartment Number', 'Zip',

    //                 'Last Name', 'First Name', 'Middle Name', 'SS No', 'Date Of Birth', 'Phone', 'Co Applicant', 'Present Address', 'Appartment Number', 'City', 'State', 'Zip',

    //                 'Landlord', 'Landlord Telephone',
    //                 'Employer Name', 'Employer Telephone', 'Employer Address', 'Employer Contact', 'Employer Position', 'Employer Start Date', 'Employer Salary',

    //                 'Moved Before', 'Bankrupt', 'Broken Rental Agreement', 'Sued Before',

    //                 'Signature Date'
    //             ]);

    //             foreach ($tenantData as $data) {
    //                 fputcsv($file, [
    //                     isset($data->date) ? date('d-m-Y', strtotime($data->date)) : '',
    //                     isset($data->contact) ? $data->contact : '',
    //                     isset($data->telephone) ? $data->telephone : '',
    //                     isset($data->building_address) ? $data->building_address : '',
    //                     isset($data->appartment_number) ? $data->appartment_number : '',
    //                     isset($data->zip) ? $data->zip : '',

    //                     isset($data->tenantPersonalInformation->last_name) ? $data->tenantPersonalInformation->last_name : '',
    //                     isset($data->tenantPersonalInformation->first_name) ? $data->tenantPersonalInformation->first_name : '',
    //                     isset($data->tenantPersonalInformation->middle_name) ? $data->tenantPersonalInformation->middle_name : '',
    //                     isset($data->tenantPersonalInformation->ss_no) ? $data->tenantPersonalInformation->ss_no : '',
    //                     isset($data->tenantPersonalInformation->date_of_birth) ? $data->tenantPersonalInformation->date_of_birth : '',
    //                     isset($data->tenantPersonalInformation->phone) ? $data->tenantPersonalInformation->phone : '',
    //                     isset($data->tenantPersonalInformation['co-applicant']) ? $data->tenantPersonalInformation['co-applicant'] : '',
    //                     isset($data->tenantPersonalInformation->present_address) ? $data->tenantPersonalInformation->present_address : '',
    //                     isset($data->tenantPersonalInformation->appartment_number) ? $data->tenantPersonalInformation->appartment_number : '',
    //                     isset($data->tenantPersonalInformation->city) ? $data->tenantPersonalInformation->city : '',
    //                     isset($data->tenantPersonalInformation->state) ? $data->tenantPersonalInformation->state : '',
    //                     isset($data->tenantPersonalInformation->zip) ? $data->tenantPersonalInformation->zip : '',

    //                     isset($data->tenantLandlord->landlord) ? $data->tenantLandlord->landlord : '',
    //                     isset($data->tenantLandlord->landlord_telephone) ? $data->tenantLandlord->landlord_telephone : '',
    //                     isset($data->tenantLandlord->employer) ? $data->tenantLandlord->employer : '',
    //                     isset($data->tenantLandlord->employer_telephone) ? $data->tenantLandlord->employer_telephone : '',
    //                     isset($data->tenantLandlord->employer_address) ? $data->tenantLandlord->employer_address : '',
    //                     isset($data->tenantLandlord->employer_contact) ? $data->tenantLandlord->employer_contact : '',
    //                     isset($data->tenantLandlord->employer_position) ? $data->tenantLandlord->employer_position : '',
    //                     isset($data->tenantLandlord->employer_start_date) ? $data->tenantLandlord->employer_start_date : '',
    //                     isset($data->tenantLandlord->employer_salary) ? $data->tenantLandlord->employer_salary : '',

    //                     isset($data->tenantPersonalHistory->move_check) && $data->tenantPersonalHistory->move_check == 1 ? 'Yes' : 'No',
    //                     isset($data->tenantPersonalHistory->bankrupt_check) && $data->tenantPersonalHistory->bankrupt_check == 1 ? 'Yes' : 'No',
    //                     isset($data->tenantPersonalHistory->rental_agreement_check) && $data->tenantPersonalHistory->rental_agreement_check == 1 ? 'Yes' : 'No',
    //                     isset($data->tenantPersonalHistory->sued_check) && $data->tenantPersonalHistory->sued_check == 1 ? 'Yes' : 'No',

    //                     isset($data->tenantAcknowledgement->signature_date) ? $data->tenantAcknowledgement->signature_date : ''
    //                 ]);
    //             }

    //             fclose($file);
    //         }, 200, $headers);
    //     } else {
    //         notify()->error(__('No Record Found'));
    //         return redirect()->back();
    //     }
    // }

    public function exportTenant(){
        return Excel::download(new TenantExport, 'tenant_export.xlsx');
    }

    public function contactInquiries()
    {
        $pageTitle = 'Get In Touch';
        $contactQueries = Contact::with('createdByUser', 'repliedBy', 'updatedByUser')->orderBy('id', 'desc')->get();
        return view('admin/contact-queries', compact('pageTitle', 'contactQueries'));
    }

    public function contactQueryDetail(Request $request)
    {
        $enqId = $request['enqId'];
        $contactQuery = Contact::where('id', $enqId)->first();
        echo json_encode($contactQuery);
    }

    public function contactQueryReply(Request $request)
    {

        $user_id = Auth::id();
        $repliebyName = Auth::user()->name;
        $data = [
            'contact_query_id' => $request['contact_query_id'],
            'reply' => $request['reply'],
            'created_by' => $user_id,

        ];
        ContactQueriesReply::create($data);
        $res = Contact::where('id', $request['contact_query_id'])->first();
        $res->update([
            'reply_status' => 1,
            'updated_by' => $user_id,
            'replied_by' => $user_id
        ]);

        $title = 'Langsam Admin Reply';
        $reply=  $data['reply'];
        $reply_date = date('d-M-Y');
        $user_name = $res->name;
        $user_message = $res->message;

        
        $body = "<!DOCTYPE html>
<html>
<head>
    <style>
        .header {
            background: #000;
        }
        body {
            color: black;
        }
        table {
            width: 100%;
            color: black !important;
            background-color: white !important;
        }
    </style>
</head>
<body>
    <p class='yiv7050401279MsoNormal'>&nbsp;</p>
    <table class='yiv7050401279MsoNormalTable' style='width: 100%;color: black !important;
    background-color: white !important;' border='0' cellspacing='0' cellpadding='0'>
        <tbody>
            <tr style='min-height: 22.5pt;'>
                <td class='header' style='width: 418.5pt;' colspan='4' valign='top'>
                    <strong>
                        <span style='font-size: 15.0pt; font-family: Calibri, sans-serif; color: white; padding-left: 10px; float: left;'>
                            &nbsp; LANGSAM NOTIFICATION
                        </span>
                    </strong>
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: 0; min-height: 22.5pt;' colspan='4'>
                    <p class='yiv7050401279MsoNormal' style='margin-bottom: 12.0pt;'>
                        <span style='font-size: 10.0pt;'>
                            <strong>&nbsp; &nbsp;Contact Query Reply</strong>
                        </span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class='yiv7050401279MsoNormalTable' style='width: 100%;color: black !important;
    background-color: white !important;' border='0' cellspacing='0' cellpadding='0'>
        <tbody>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>Company Name</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;LANGSAM</span>
                    </p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>Notification Date</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;$reply_date</span>
                    </p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>User Name</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;$user_name</span>
                    </p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>Message</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;$user_message</span>
                    </p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>Reply</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;$reply</span>
                    </p>
                </td>
            </tr>
            <tr style='min-height: 22.5pt;'>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; <strong>Replied By</strong></span>
                    </p>
                </td>
                <td style='border: solid #DFE0E2 1.0pt; padding: .75pt; min-height: 22.5pt;'>
                    <p class='yiv7050401279MsoNormal'>
                        <span style='font-size: 9.0pt;'>&nbsp; &nbsp;$repliebyName</span>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class='yiv7050401279MsoNormalTable' style='width: 100%;color: black !important;
    background-color: white !important;' border='0' cellspacing='0' cellpadding='0'>
        <tbody>
            <tr>
                <td style='width: 445.5pt; background: #F2F2F2; padding: 0 5.4pt;' colspan='8' valign='top'>
                    <p align='center'>Copyright (c) 2024, Langsam. All rights reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>";


        Mail::to($res->email)->send(new SendMail($title, $body));

        $response['status'] = 'replied';
        echo json_encode($response);
    }

    public function GetcontactQueryReply(Request $request){
        $query_id = $request['query_id'];
        $result['query'] = Contact::where('id',$query_id)->first();
        $result['reply'] = ContactQueriesReply::where('contact_query_id',$query_id)->first();
        echo json_encode($result);
    }   

    public function importInquiries(Request $request)
    {
       
      
        $validator = Validator::make($request->all(), [
            'import_file' => 'required|mimes:xlsx',
        ]);
        
        if ($validator->fails()) {
           
            $errorMessages = [];
        
            foreach ($validator->errors()->messages() as $field => $messages) {
                $errorMessages[] = [
                    'field' => $field,
                    'errors' => $messages
                ];
            }
        
            $result['status'] = 'file_error';
            $result['errors'] = $errorMessages;
            echo json_encode($result);
            return;
        }

        // try {
        //     $data = $this->readExcelFile($request->file('import_file'));
        // } catch (\Exception $e) {
        //     $result['status'] = 'file_error';
        //     $result['errors'] = $e->getMessage();
        //     echo json_encode($result);
        //     return;
        // }
        $data = Excel::toArray([], $request->file('import_file'));
        $fileheaders = $data[0][0];
        $numberOfHeaders = count($fileheaders);
        if($numberOfHeaders < 52 || $numberOfHeaders > 52){
            $result['status'] = 'header_error';
            $result['errors'] = 'kindly use the given file format';
            echo json_encode($result);
            return;
        }
        // Skip the first array which is the header
        $rows = array_slice($data[0], 1);
        // dd($rows);

        $errors = [];
        foreach ($rows as $index => $row) {
            // dD($row);
            $index = $index+1;
            
            // if(! is_numeric($row[0])){
            //     $temperrors = [];
            //     $temperrors = array_merge($errors, ['row' => $index,
            //     'column' => 'Date',
            //     'errors' => 'Date is invalid, change column format to date']);
            //     $errors[] = $temperrors;
            //     $result['status'] = 'error';
            //     $result['errors'] = $errors;
            //     echo json_encode($result);
            //     return;
            // }
            if(! is_numeric($row[0])){
                $date = Carbon::createFromFormat("d/m/Y", $row[0]);
   
                // Excel date serial number calculation: days since 1900-01-01
                $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
                $daysDifference = $date->diffInDays($excelStartDate);
                $row[0] = $daysDifference;
            }
            
           
            $rowIndex = $index; // To account for the header row
            $validationResult = $this->validaterowdata($row, $rowIndex);
            if ($validationResult !== true) {
                $errors = array_merge($errors, $validationResult);
            }
        }

        if (!empty($errors)) {
            $result['status'] = 'error';
            $result['errors'] = $errors;
            echo json_encode($result);
            return;
            // return back()->withErrors($errors);
        }

        foreach ($rows as $row) {
            $this->storeRow($row);
        }
        $result['status'] = 'success';
        $result['errors'] = 'Inquiries imported successfully.';
        echo json_encode($result);
        return;
        // return back()->with('success', 'Inquiries imported successfully.');
    }

    private function readExcelFile($file)
    {
        $path = $file->getRealPath();
        return Excel::toArray([], $path);
    }

    private function validaterowdata(array $row, int $rowIndex)
    {
        // dd($row);
        $unixTimestamp = ($row[0] - 25569) * 86400;
        $date = Carbon::createFromTimestamp($unixTimestamp);
        $formattedDate = $date->format('d-m-Y');
        $row[0]= $formattedDate;
        $columnNames = [
            '0' => 'Date',
            '1' => 'Appartment Address',
            '2' => 'Appartment Number',
            '3' => 'Name',
            '4' => 'Telephone',
            '5' => 'Social Security Number',
            '6' => 'Email',
            '7' => 'Present Address',
            '8' => 'Zip',
            '9' => 'User Appartment Number',
            '10' => 'Tenant Duration',
            '11' => 'Present Landlord',
            '12' => 'Present Landlord Telephone',
            '13' => 'Total Rent',
            '14' => 'Section Share',
            '15' => 'Landlord Address',
            '16' => 'Landlord Previous Address',
            '17' => 'Previous Landlord',
            '18' => 'Previous Landlord Address',
            '19' => 'Previous Landlord Telephone',
            '20' => 'Employer Name',
            '21' => 'Employer Occupation',
            '22' => 'Employer Business Address',
            '23' => 'Employer Telephone',
            '24' => 'Employer Duration',
            '25' => 'Director Of Personnel',
            '26' => 'Employer Salary',
            '27' => 'Employer Salary Period',
            '28' => 'Previous Employer',
            '29' => 'Previous Employer Occupation',
            '30' => 'Previous Employer Business Address',
            '31' => 'Previous Employer Telephone',
            '32' => 'Previous Employer Duration',
            '33' => 'Supervisor Name',
            '34' => 'Previous Employer Salary',
            '35' => 'Previous Employer Salary Period',
            '36' => 'Card Name 1',
            '37' => 'Account Number 1',
            '38' => 'Card Name 2',
            '39' => 'Account Number 2',
            '40' => 'Card Name 3',
            '41' => 'Account Number 3',
            '42' => 'Reference Name',
            '43' => 'Reference Relation',
            '44' => 'Reference Age',
            '45' => 'Find Method',
            '46' => 'Interviewing Agent',
            '47' => 'Lease To Begin',
            '48' => 'Lease Mail',
            '49' => 'Rent',
            '50' => 'Lease Year Length',
            '51' => 'Security Amount',
        ];
        
        $rules = [
            '0' => 'nullable|date_format:d-m-Y',
            '1' => 'nullable|max:100',  // Appartment Address
            '2' => 'nullable|max:100',  // Appartment Number
            '3' => 'required|max:100',  // Name
            '4' => 'required|max:18',   // Telephone
            '5' => 'required|max:18',   // Social Security Number
            '6' => 'required|email|max:50',   // Email
            '7' => 'nullable|max:100',  // Present Address
            '8' => 'required| max:8', // Zip (assuming it's alphanumeric)
            '9' => 'nullable|max:40',  // User Appartment Number
            '10' => 'nullable|max:20', // Tenant Duration (assuming it's alphanumeric)
            '11' => 'nullable|max:50', // Present Landlord
            '12' => 'nullable|max:18',  // Present Landlord Telephone
            '13' => 'required|numeric', // Total Rent
            '14' => 'nullable', // Section Share
            '15' => 'nullable|max:100', // Landlord Address
            '16' => 'nullable|max:100', // Landlord Previous Address
            '17' => 'nullable|max:50', // Previous Landlord
            '18' => 'nullable|max:100', // Previous Landlord Address
            '19' => 'nullable|max:18',  // Previous Landlord Telephone
            '20' => 'nullable|max:50', // Employer Name
            '21' => 'nullable| max:20', // Employer Occupation (assuming it's alphanumeric)
            '22' => 'nullable|max:100', // Employer Business Address
            '23' => 'nullable|max:18',  // Employer Telephone
            '24' => 'nullable| max:20', // Employer Duration (assuming it's alphanumeric)
            '25' => 'nullable| max:40', // Director Of Personnel (assuming it's alphanumeric)
            '26' => 'nullable|numeric', // Employer Salary
            '27' => 'nullable|max:40', // Employer Salary Period (assuming it's alphanumeric)
            '28' => 'nullable|max:50', // Previous Employer
            '29' => 'nullable| max:50', // Previous Employer Occupation (assuming it's alphanumeric)
            '30' => 'nullable|max:100', // Previous Employer Business Address
            '31' => 'nullable|max:18',  // Previous Employer Telephone
            '32' => 'nullable| max:40', // Previous Employer Duration (assuming it's alphanumeric)
            '33' => 'nullable| max:50', // Supervisor Name (assuming it's alphanumeric)
            '34' => 'nullable|numeric', // Previous Employer Salary
            '35' => 'nullable | max:40', // Previous Employer Salary Period (assuming it's alphanumeric)
            '36' => 'nullable | max:50', // Card Name 1 (assuming it's alphanumeric)
            '37' => 'nullable|max:18',  // Account Number 1
            '38' => 'nullable | max:50', // Card Name 2 (assuming it's alphanumeric)
            '39' => 'nullable|max:18',  // Account Number 2
            '40' => 'nullable | max:50', // Card Name 3 (assuming it's alphanumeric)
            '41' => 'nullable|max:18',  // Account Number 3
        
            '42' => 'nullable|max:50', // Reference Name
            '43' => 'nullable|max:50', // Reference Relation
            '44' => 'nullable|numeric', // Reference Age
        
            '45' => 'nullable | max:100', // Find Method (assuming it's alphanumeric)
            '46' => 'nullable | max:50', // Interviewing Agent (assuming it's alphanumeric)
            '47' => 'nullable', // Lease To Begin (assuming it's alphanumeric)
            '48' => 'nullable|email|max:50', // Lease Mail
            '49' => 'nullable|numeric', // Rent
            '50' => 'nullable |max:50', // Lease Year Length (assuming it's alphanumeric)
            '51' => 'nullable|numeric', // Security Amount
        ];
        

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
           
            
            $errorMessages = [];
            foreach ($validator->errors()->messages() as $columnIndex => $messages) {
              
                $errorMessages[] = [
                    'row' => $rowIndex,
                    'column' => $columnNames[$columnIndex],
                    'errors' => str_replace($columnIndex,$columnNames[$columnIndex],$messages)
                ];
            }
            return $errorMessages;
        }

        return true;
    }

    private function storeRow(array $row)
    {
        $user_id = Auth::id();
        if(! is_numeric($row[0])){
            $date = Carbon::createFromFormat("d/m/Y", $row[0]);

            // Excel date serial number calculation: days since 1900-01-01
            $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
            $daysDifference = $date->diffInDays($excelStartDate);
            $row[0] = $daysDifference;
        }
        $unixTimestamp = ($row[0] - 25569) * 86400;
        $date = Carbon::createFromTimestamp($unixTimestamp);
        $formattedDate = $date->format('Y-m-d');
        // $row[0]= $formattedDate;
        // dd($formattedDate);
        $inquiry = InquiryStep1::create([
            'date' => isset($formattedDate) ? $formattedDate : null,
            'apt_address' => $row[1] ? $row[1] : null,
            'apt_number' => $row[2] ? $row[2]: null,
            'name' => $row[3] ? $row[3]: null,
            'telephone' => $row[4] ? $row[4]: null,
            'social_security_number' => $row[5] ? $row[5]: null,
            'email' => $row[6] ? $row[6]: null,
            'present_address' => $row[7] ? $row[7]: null,
            'zip' => $row[8] ? $row[8]: null,
            'user_apt_number' => $row[9] ? $row[9]: null,
            'tenant_duration' => $row[10] ? $row[10]: null,
            'present_landlord' => $row[11] ? $row[11]: null,
            'present_landlord_telephone' => $row[12] ? $row[12]: null,
            'total_rent' => $row[13] ? $row[13]: null,
            'section_share' => $row[14] ? $row[14]: null,
            'landlord_address' => $row[15] ? $row[15]: null,
            'landlord_previous_address' => $row[16] ? $row[16]: null,
            'previous_landlord' => $row[17] ? $row[17]: null,
            'previous_landlord_address' => $row[18] ? $row[18]: null,
            'previous_landlord_telephone' => $row[19] ? $row[19]: null,
            'created_by' => $user_id,
            'updated_by' => $user_id,
            'is_imported' => 1,
        ]);

        InquiryStep2::create([
    'personal_info_id' => $inquiry->id,
    'employer_name' => $row[20] ? $row[20] : null,
    'employer_occupation' => $row[21] ? $row[21] : null,
    'employer_business_address' => $row[22] ? $row[22] : null,
    'employer_telephone' => $row[23] ? $row[23] : null,
    'employer_duration' => $row[24] ? $row[24] : null,
    'director_of_personnel' => $row[25] ? $row[25] : null,
    'employer_salary' => $row[26] ? $row[26] : null,
    'employer_salary_period' => $row[27] ? $row[27] : null,
    'previous_employer' => $row[28] ? $row[28] : null,
    'previous_employer_occupation' => $row[29] ? $row[29] : null,
    'previous_employer_business_address' => $row[30] ? $row[30] : null,
    'previous_employer_telephone' => $row[31] ? $row[31] : null,
    'previous_employer_duration' => $row[32] ? $row[32] : null,
    'supervisor_name' => $row[33] ? $row[33] : null,
    'previous_employer_salary' => $row[34] ? $row[34] : null,
    'previous_employer_salary_period' => $row[35] ? $row[35] : null,
    'created_by' => $user_id,
    'updated_by' => $user_id,
]);

InquiryStep3::create([
    'personal_info_id' => $inquiry->id,
    'card_name1' => $row[36] ? $row[36] : null,
    'account_number1' => $row[37] ? $row[37] : null,
    'card_name2' => $row[38] ? $row[38] : null,
    'account_number2' => $row[39] ? $row[39] : null,
    'card_name3' => $row[40] ? $row[40] : null,
    'account_number3' => $row[41] ? $row[41] : null,
    'created_by' => $user_id,
    'updated_by' => $user_id,
]);

InquiryStep4::create([
    'personal_info_id' => $inquiry->id,
    'reference_name' => $row[42] ? $row[42] : null,
    'reference_relation' => $row[43] ? $row[43] : null,
    'reference_age' => $row[44] ? $row[44] : null,
    'created_by' => $user_id,
    'updated_by' => $user_id,
]);

InquiryStep5::create([
    'personal_info_id' => $inquiry->id,
    'find_method' => $row[45] ? $row[45] : null,
    'interviewing_agent' => $row[46] ? $row[46] : null,
    'lease_to_begin' => $row[47] ? $row[47] : null,
    'new_lease_mail' => $row[48] ? $row[48] : null,
    'rent' => $row[49] ? $row[49] : null,
    'lease_years_length' => $row[50] ? $row[50] : null,
    'security_amount' => $row[51] ? $row[51] : null,
    'created_by' => $user_id,
    'updated_by' => $user_id,
]);


    }

    // public function importInquiries(Request $request)
    // {
    //     $user_id = Auth::id();
    //     if ($request->hasFile('import_file')) {
    //         $file = $request->file('import_file');
    //         if ($file->getClientOriginalExtension() === 'csv') {
    //             $filePath = $file->getRealPath();
    //             $data = array_map('str_getcsv', file($filePath));
    //             $headers = array_shift($data);
    //             $insertData = [];
    //             foreach ($data as $index => $row) {

    //                 $index = $index + 1;
    //                 $rowData = array_combine($headers, $row);
    //                 $rowErrors = $this->validateInquiryRow($index, $rowData);
    //                 if (!empty($rowErrors)) {
    //                     $errors[] = $rowErrors;
    //                 }
    //             }
    //             if (empty($errors)) {

    //                 foreach ($data as  $row) {
    //                     $rowData = array_combine($headers, $row);
    //                     // dd($rowData);
    //                     if (
    //                         !empty($rowData['Present Landlord']) &&
    //                         !empty($rowData['Section Share']) &&
    //                         !empty($rowData['Landlord Address']) &&
    //                         !empty($rowData['Previous Landlord']) &&
    //                         !empty($rowData['Find Method']) &&
    //                         !empty($rowData['Interviewing Agent']) &&
    //                         !empty($rowData['Lease To Begin']) &&
    //                         !empty($rowData['Lease Mail']) &&
    //                         !empty($rowData['Rent']) &&
    //                         !empty($rowData['Lease Year Length']) &&
    //                         !empty($rowData['Security Amount'])
    //                     ) {



    //                         $step1Data = [
    //                             'date' => !empty($rowData['Date']) ? date('Y-m-d', strtotime($rowData['Date'])) : null,
    //                             'apt_address' => !empty($rowData['Appartment Address']) ? $rowData['Appartment Address'] : null,
    //                             'apt_number' => !empty($rowData['Appartment Number']) ? $rowData['Appartment Number'] : null,
    //                             'name' => !empty($rowData['Name']) ? $rowData['Name'] : null,
    //                             'telephone' => !empty($rowData['Telephone']) ? $rowData['Telephone'] : null,
    //                             'social_security_number' => !empty($rowData['Social Security Number']) ? $rowData['Social Security Number'] : null,
    //                             'email' => !empty($rowData['Email']) ? $rowData['Email'] : null,
    //                             'present_address' => !empty($rowData['Present Address']) ? $rowData['Present Address'] : null,
    //                             'zip' => !empty($rowData['Zip']) ? $rowData['Zip'] : null,
    //                             'user_apt_number' => !empty($rowData['User Appartment Number']) ? $rowData['User Appartment Number'] : null,
    //                             'tenant_duration' => !empty($rowData['Tenant Duration']) ? $rowData['Tenant Duration'] : null,
    //                             'present_landlord' => !empty($rowData['Present Landlord']) ? $rowData['Present Landlord'] : null,
    //                             'present_landlord_telephone' => !empty($rowData['Present Landlord Telephone']) ? $rowData['Present Landlord Telephone'] : null,
    //                             'total_rent' => !empty($rowData['Total Rent']) ? $rowData['Total Rent'] : null,
    //                             'section_share' => !empty($rowData['Section Share']) ? $rowData['Section Share'] : null,
    //                             'landlord_address' => !empty($rowData['Landlord Address']) ? $rowData['Landlord Address'] : null,
    //                             'landlord_previous_address' => !empty($rowData['Landlord Previous Address']) ? $rowData['Landlord Previous Address'] : null,
    //                             'previous_landlord' => !empty($rowData['Previous Landlord']) ? $rowData['Previous Landlord'] : null,
    //                             'previous_landlord_address' => !empty($rowData['Previous Landlord Address']) ? $rowData['Previous Landlord Address'] : null,
    //                             'previous_landlord_telephone' => !empty($rowData['Previous Landlord Telephone']) ? $rowData['Previous Landlord Telephone'] : null,
    //                             'created_by' => $user_id
    //                         ];





    //                         $step1id = InquiryStep1::create($step1Data);

    //                         $step2Data = new InquiryStep2();

    //                         $step2Data->personal_info_id = $step1id->id;

    //                         $step2Data->employer_name = !empty($rowData['Employer Name']) ? $rowData['Employer Name'] : '';

    //                         $step2Data->employer_occupation = !empty($rowData['Employer Occupation']) ? $rowData['Employer Occupation'] : '';

    //                         $step2Data->employer_business_address = !empty($rowData['Employer Business Address']) ? $rowData['Employer Business Address'] : '';

    //                         $step2Data->employer_telephone = !empty($rowData['Employer Telephone']) ? $rowData['Employer Telephone'] : '';

    //                         $step2Data->employer_duration = !empty($rowData['Employer Duration']) ? $rowData['Employer Duration'] : '';

    //                         $step2Data->director_of_personnel = !empty($rowData['Director Of Personnel']) ? $rowData['Director Of Personnel'] : '';

    //                         $step2Data->employer_salary = 123;

    //                         $step2Data->employer_salary_period = !empty($rowData['Employer Salary Period']) ? $rowData['Employer Salary Period'] : '';

    //                         $step2Data->previous_employer = !empty($rowData['Previous Employer']) ? $rowData['Previous Employer'] : '';

    //                         $step2Data->previous_employer_occupation = !empty($rowData['Previous Employer Occupation']) ? $rowData['Previous Employer Occupation'] : '';

    //                         $step2Data->previous_employer_business_address = !empty($rowData['Previous Employer Business Address']) ? $rowData['Previous Employer Business Address'] : '';

    //                         $step2Data->previous_employer_telephone = !empty($rowData['Previous Employer Telephone']) ? $rowData['Previous Employer Telephone'] : '';

    //                         $step2Data->previous_employer_duration = !empty($rowData['Previous Employer Duration']) ? $rowData['Previous Employer Duration'] : '';

    //                         $step2Data->supervisor_name = !empty($rowData['Supervisor Name']) ? $rowData['Supervisor Name'] : '';

    //                         $step2Data->previous_employer_salary = 111;

    //                         $step2Data->previous_employer_salary_period = !empty($rowData['Previous Employer Salary Period']) ? $rowData['Previous Employer Salary Period'] : '';

    //                         $step2Data->created_by = $user_id;


    //                         $step2Data->save();


    //                         $step3Data = [
    //                             'personal_info_id' => $step1id->id,
    //                             'card_name1' => !empty($rowData['Card Name 1']) ? $rowData['Card Name 1'] : null,
    //                             'account_number1' => !empty($rowData['Account Number 1']) ? $rowData['Account Number 1'] : null,
    //                             'card_name2' => !empty($rowData['Card Name 2']) ? $rowData['Card Name 2'] : null,
    //                             'account_number2' => !empty($rowData['Account Number 2']) ? $rowData['Account Number 2'] : null,
    //                             'card_name3' => !empty($rowData['Card Name 3']) ? $rowData['Card Name 3'] : null,
    //                             'account_number3' => !empty($rowData['Account Number 3']) ? $rowData['Account Number 3'] : null,
    //                             'created_by' => $user_id
    //                         ];




    //                         // dd($step3Data);
    //                         $step3id = InquiryStep3::create($step3Data);

    //                         $step4Data = [
    //                             'personal_info_id' => $step1id->id,

    //                             'reference1_name' => !empty($rowData['Reference 1 Name']) ? $rowData['Reference 1 Name'] : null,

    //                             'reference1_relation' => !empty($rowData['Reference 1 Relation']) ? $rowData['Reference 1 Relation'] : null,

    //                             'reference1_age' => !empty($rowData['Reference 1 Age']) ? $rowData['Reference 1 Age'] : null,

    //                             'reference2_name' => !empty($rowData['Reference 2 Name']) ? $rowData['Reference 2 Name'] : null,

    //                             'reference2_relation' => !empty($rowData['Reference 2 Relation']) ? $rowData['Reference 2 Relation'] : null,

    //                             'reference2_age' => !empty($rowData['Reference 2 Age']) ? $rowData['Reference 2 Age'] : null,

    //                             'reference3_name' => !empty($rowData['Reference 3 Name']) ? $rowData['Reference 3 Name'] : null,

    //                             'reference3_relation' => !empty($rowData['Reference 3 Relation']) ? $rowData['Reference 3 Relation'] : null,

    //                             'reference3_age' => !empty($rowData['Reference 3 Age']) ? $rowData['Reference 3 Age'] : null,

    //                             'created_by' => $user_id
    //                         ];




    //                         // dd($step4Data);
    //                         $step4id = InquiryStep4::create($step4Data);

    //                         $step5Data = [
    //                             'personal_info_id' => $step1id->id,

    //                             'find_method' => !empty($rowData['Find Method']) ? $rowData['Find Method'] : null,

    //                             'interviewing_agent' => !empty($rowData['Interviewing Agent']) ? $rowData['Interviewing Agent'] : null,

    //                             'signature' => !empty($rowData['Signature']) ? $rowData['Signature'] : null,

    //                             'lease_to_begin' => !empty($rowData['Lease To Begin']) ? $rowData['Lease To Begin'] : null,

    //                             'new_lease_mail' => !empty($rowData['Lease Mail']) ? $rowData['Lease Mail'] : null,

    //                             'rent' => !empty($rowData['Rent']) ? $rowData['Rent'] : null,
    //                             'lease_years_length' => !empty($rowData['Lease Year Length']) ? $rowData['Lease Year Length'] : null,

    //                             'security_amount' => !empty($rowData['Security Amount']) ? $rowData['Security Amount'] : null,

    //                             'created_by' => $user_id
    //                         ];


    //                         // dd($step5Data);
    //                         InquiryStep5::create($step5Data);
    //                     }
    //                 }

    //                 $result['status'] = 'success';
    //             } else {
    //                 $result['status'] = 'error';
    //                 $result['errors'] = $errors;
    //             }
    //         } else {
    //             $result['status'] = 'error';
    //             $result['errors'] = 'Please use the given file format (CSV)';
    //         }
    //     } else {
    //         $result['status'] = 'error';
    //         $result['errors'] = 'No file selected';
    //     }
    //     echo json_encode($result);
    //     return;
    // }
    // public function importTenant(Request $request)
    // {

    //     $user_id = Auth::id();
    //     if ($request->hasFile('import_file')) {
    //         $file = $request->file('import_file');
    //         if ($file->getClientOriginalExtension() === 'csv') {
    //             $filePath = $file->getRealPath();
    //             $data = array_map('str_getcsv', file($filePath));
    //             $headers = array_shift($data);
    //             $insertData = [];
    //             foreach ($data as $index => $row) {
    //                 $index = $index + 1;
    //                 $rowData = array_combine($headers, $row);
    //                 $rowErrors = $this->validateRow($index, $rowData);
    //                 if (!empty($rowErrors)) {
    //                     $errors[] = $rowErrors;
    //                 }
    //             }

    //             if (empty($errors)) {
    //                 foreach ($data as $row) {

    //                     $rowData = array_combine($headers, $row);
    //                     if (
    //                         // Step 1
    //                         !empty($rowData['Date']) && !empty($rowData['Contact']) && !empty($rowData['Telephone']) &&
    //                         !empty($rowData['Building Address']) && !empty($rowData['Appartment Number']) && !empty($rowData['Zip']) &&

    //                         // Step 2
    //                         !empty($rowData['Last Name']) && !empty($rowData['First Name']) && !empty($rowData['Middle Name']) &&
    //                         !empty($rowData['SS No']) && !empty($rowData['Date Of Birth']) && !empty($rowData['Phone']) &&
    //                         !empty($rowData['Co Applicant']) && !empty($rowData['Present Address']) && !empty($rowData['Appartment Number']) &&
    //                         !empty($rowData['City']) && !empty($rowData['State']) && !empty($rowData['Zip']) &&

    //                         // Step 3
    //                         !empty($rowData['Landlord']) && !empty($rowData['Landlord Telephone']) &&
    //                         !empty($rowData['Employer Name']) && !empty($rowData['Employer Telephone']) &&
    //                         !empty($rowData['Employer Address']) && !empty($rowData['Employer Contact']) &&
                            

    //                         // Step 4
    //                         !empty($rowData['Moved Before']) && !empty($rowData['Bankrupt']) &&
    //                         !empty($rowData['Broken Rental Agreement']) && !empty($rowData['Sued Before'])
    //                     ) {
    //                     // dd($rowData);
    //                     $step1Data = [
    //                         'date' => !empty($rowData['Date']) ? date('Y-m-d', strtotime($rowData['Date'])) : null,
    //                         'contact' => !empty($rowData['Contact']) ? $rowData['Contact'] : null,
    //                         'telephone' => !empty($rowData['Telephone']) ? $rowData['Telephone'] : null,
    //                         'building_address' => !empty($rowData['Building Address']) ? $rowData['Building Address'] : null,
    //                         'appartment_number' => !empty($rowData['Appartment Number']) ? $rowData['Appartment Number'] : null,
    //                         'zip' => !empty($rowData['Zip']) ? $rowData['Zip'] : null,
    //                         'created_by' => $user_id
    //                     ];

    //                     // dd($step1Data);
    //                     $step1id = TenantInformation::create($step1Data);

    //                     $step2Data = [
    //                         'tenant_info_id' => $step1id->id,
    //                         'last_name' => !empty($rowData['Last Name']) ? $rowData['Last Name'] : null,
    //                         'first_name' => !empty($rowData['First Name']) ? $rowData['First Name'] : null,
    //                         'middle_name' => !empty($rowData['Middle Name']) ? $rowData['Middle Name'] : null,
    //                         'ss_no' => !empty($rowData['SS No']) ? $rowData['SS No'] : null,
    //                         'date_of_birth' => !empty($rowData['Date Of Birth']) ? date('Y-m-d', strtotime($rowData['Date Of Birth'])) : null,
    //                         'phone' => !empty($rowData['Phone']) ? $rowData['Phone'] : null,
    //                         'co-applicant' => !empty($rowData['Co Applicant']) ? $rowData['Co Applicant'] : null,
    //                         'present_address' => !empty($rowData['Present Address']) ? $rowData['Present Address'] : null,
    //                         'appartment_number' => !empty($rowData['Appartment Number']) ? $rowData['Appartment Number'] : null,
    //                         'city' => !empty($rowData['City']) ? $rowData['City'] : null,
    //                         'state' => !empty($rowData['State']) ? $rowData['State'] : null,
    //                         'zip' => !empty($rowData['Zip']) ? $rowData['Zip'] : null,
    //                         'created_by' => $user_id
    //                     ];



    //                     // dd($step2Data);
    //                     $step2id = TenantPersonalInformation::create($step2Data);
    //                     $step3Data = [
    //                         'tenant_info_id' => $step1id->id,
    //                         'landlord' => !empty($rowData['Landlord']) ? $rowData['Landlord'] : null,
    //                         'landlord_telephone' => !empty($rowData['Landlord Telephone']) ? $rowData['Landlord Telephone'] : null,
    //                         'employer' => !empty($rowData['Employer Name']) ? $rowData['Employer Name'] : null,
    //                         'employer_telephone' => !empty($rowData['Employer Telephone']) ? $rowData['Employer Telephone'] : null,
    //                         'employer_address' => !empty($rowData['Employer Address']) ? $rowData['Employer Address'] : null,
    //                         'employer_contact' => !empty($rowData['Employer Contact']) ? $rowData['Employer Contact'] : null,
    //                         'employer_position' => !empty($rowData['Employer Position']) ? $rowData['Employer Position'] : null,
    //                         'employer_start_date' => !empty($rowData['Employer Start Date']) ? date('Y-m-d', strtotime($rowData['Employer Start Date'])) : null,
    //                         'employer_salary' => !empty($rowData['Employer Salary']) ? $rowData['Employer Salary'] : null,
    //                         'created_by' => $user_id
    //                     ];



    //                     // dd($step3Data);
    //                     $step3id = TenantLandlord::create($step3Data);

    //                     $step4Data = [
    //                         'tenant_info_id' => $step1id->id,
    //                         'move_check' => strtolower($rowData['Moved Before']) === 'yes' ? 1 : 0,
    //                         'bankrupt_check' => strtolower($rowData['Bankrupt']) === 'yes' ? 1 : 0,
    //                         'rental_agreement_check' => strtolower($rowData['Broken Rental Agreement']) === 'yes' ? 1 : 0,
    //                         'sued_check' => strtolower($rowData['Sued Before']) === 'yes' ? 1 : 0,
    //                         'created_by' => $user_id
    //                     ];





    //                     // dd($step4Data);
    //                     $step4id = TenantPersonalHistory::create($step4Data);

    //                     $step5Data = [
    //                         'tenant_info_id' => $step1id->id,
    //                         'signature' => !empty($rowData['Signature']) ? $rowData['Signature'] : null,
    //                         'signature_date' => !empty($rowData['Signature Date']) ? date('Y-m-d', strtotime($rowData['Signature Date'])) : null,
    //                         'created_by' => $user_id
    //                     ];



    //                     // dd($step5Data);
    //                     TenantAcknowledgement::create($step5Data);
    //                 }
    //             }

    //                 $result['status'] = 'success';
    //             } else {
    //                 $result['status'] = 'error';
    //                 $result['errors'] = $errors;
    //             }
    //         } else {
    //             $result['status'] = 'error';
    //             $result['errors'] = 'Please use the given file format (CSV)';
    //         }
    //     } else {
    //         $result['status'] = 'error';
    //         $result['errors'] = 'No file selected';
    //     }
    //     echo json_encode($result);
    //     return;
    // }

    public function importTenant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'import_file' => 'required|mimes:xlsx',
        ]);
    
        if ($validator->fails()) {
            $tenanterrorMessages = [];
            foreach ($validator->errors()->messages() as $field => $messages) {
                $tenanterrorMessages[] = [
                    'field' => $field,
                    'errors' => $messages
                ];
            }
    
            $result['status'] = 'file_error';
            $result['errors'] = $tenanterrorMessages;
            echo json_encode($result);
            return;
        }
    
        // $data = $this->readTenantExcelFile($request->file('import_file'));
        $data = Excel::toArray([], $request->file('import_file'));
        $fileheaders = $data[0][0];
        $numberOfHeaders = count($fileheaders);
        if ($numberOfHeaders < 25 || $numberOfHeaders > 25) {
            $result['status'] = 'header_error';
            $result['errors'] = 'Kindly use the given file format';
            echo json_encode($result);
            return;
        }
    
        $rows = array_slice($data[0], 1);
    
        $errors = [];
        $temperrors = [];
        foreach ($rows as $index => $row) {
            // dd($row);

            $rowIndex = $index + 1;
            if(!empty($row[4])){
            if(! is_numeric($row[4])){
               /* $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Date of birth',
                'errors' => 'Date of birth is invalid, change column format to date']);
                $errors[] = $temperrors;
                $result['status'] = 'error';
                $result['errors'] = $errors;
                echo json_encode($result);
                return;*/

                
                $date = Carbon::createFromFormat("d/m/Y", $row[4]);
                

                // Excel date serial number calculation: days since 1900-01-01
                $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
                $daysDifference = $date->diffInDays($excelStartDate);
                $row[4] = $daysDifference;
                
            }}
            if(!empty($row[19])){

            if(! is_numeric($row[19])){

               /* $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Employer start date',
                'errors' => 'Employer start date is invalid, change column format to date']);
                $errors[] = $temperrors;
                $result['status'] = 'error';
                $result['errors'] = $errors;
                echo json_encode($result);
                return;*/

                
                $date = Carbon::createFromFormat("d/m/Y", $row[19]);
                // dd($date);
                // Excel date serial number calculation: days since 1900-01-01
                $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
                $daysDifference = $date->diffInDays($excelStartDate);
                $row[19] = $daysDifference;
                // dd($row[19]);

            }
        }
            $unixTimestamp1 = ($row[4] - 25569) * 86400;
            $date1 = Carbon::createFromTimestamp($unixTimestamp1);
            $row[4] = $date1->format('Y-m-d');
            $unixTimestamp2 = ($row[19] - 25569) * 86400;
            $date2 = Carbon::createFromTimestamp($unixTimestamp2);
            $row[19] = $date2->format('Y-m-d');

            $validationResult = $this->validateTenantRowData($row, $rowIndex);
            if ($validationResult !== true) {
                $errors = array_merge($errors, $validationResult);
            }
            if($row[21] == 'Yes' || $row[21] == 'No'){
            }else{
                $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Moved before',
                'errors' => 'Moved before must be Yes or No']);
                $errors[] = $temperrors;
            }
            if($row[22] == 'Yes' || $row[22] == 'No'){
            }else{
                $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Bankrupt',
                'errors' => 'Bankrupt must be Yes or No']);
                $errors[] = $temperrors;
            }
            if($row[23] == 'Yes' || $row[23] == 'No'){
            }else{
                $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Broken Rental Agreement',
                'errors' => 'Broken Rental Agreement must be Yes or No']);
                $errors[] = $temperrors;
            }
            if($row[24] == 'Yes' || $row[24] == 'No'){
            }else{
                $temperrors = array_merge($errors, ['row' => $rowIndex,
                'column' => 'Sued before',
                'errors' => 'Sued before must be Yes or No']);
                $errors[] = $temperrors;
            }
            
            
        }
    
        if (!empty($errors)) {
            $result['status'] = 'error';
            $result['errors'] = $errors;
            echo json_encode($result);
            return;
        }
    
        foreach ($rows as $row) {
            $this->storeTenantRow($row);
        }
    
        $result['status'] = 'success';
        $result['message'] = 'Tenants imported successfully.';
        echo json_encode($result);
        return;
    }
    
    private function readTenantExcelFile($file)
    {
        $path = $file->getRealPath();
        return Excel::toArray([], $path);
    }
    
    private function validateTenantRowData(array $row, int $rowIndex)
    {
        // dd($row);
        $columnNames = [
            '0' => 'Last Name',
            '1' => 'First Name',
            '2' => 'Middle Name',
            '3' => 'SS No',
            '4' => 'Date Of Birth',
            '5' => 'Phone',
            '6' => 'Co Applicant',
            '7' => 'Present Address',
            '8' => 'Appartment Number',
            '9' => 'City',
            '10' => 'State',
            '11' => 'Zip',
            '12' => 'Landlord',
            '13' => 'Landlord Telephone',
            '14' => 'Employer Name',
            '15' => 'Employer Telephone',
            '16' => 'Employer Address',
            '17' => 'Employer Contact',
            '18' => 'Employe Position',
            '19' => 'Employer Start Date',
            '20' => 'Employer Salary',
            '21' => 'Moved Before',
            '22' => 'Bankrupt',
            '23' => 'Broken Rental Agreement',
            '24' => 'Sued Before'
        ];
    
        $rules = [
            '0' => 'required|max:50',
            '1' => 'required|max:50',
            '2' => 'required|max:50',
            '3' => 'required|max:18',
            '4' => 'required|date_format:Y-m-d',
            '5' => 'required|max:18',
            '6' => 'required|max:50',
            '7' => 'required|max:100',
            '8' => 'required|max:100',
            '9' => 'required|max:100',
            '10' => 'required|max:100',
            '11' => 'required|max:10',

            '12' => 'required|max:50',
            '13' => 'required|max:18',
            '14' => 'required|max:50',
            '15' => 'required|max:18',
            '16' => 'required|max:100',
            '17' => 'required|max:18',

            '18' => 'nullable|max:50',
            '19' => 'nullable|date_format:Y-m-d',
            '20' => 'nullable|numeric',

            // '21' => 'required|in:yes,no',
            // '22' => 'required|in:yes,no',
            // '23' => 'required|in:yes,no',
            // '24' => 'required|in:yes,no'
        ];
    
        $validator = Validator::make($row, $rules);
    
        if ($validator->fails()) {
            $errorMessages = [];
            foreach ($validator->errors()->messages() as $columnIndex => $messages) {
                $errorMessages[] = [
                    'row' => $rowIndex,
                    'column' => $columnNames[$columnIndex],
                    'errors' => str_replace($columnIndex, $columnNames[$columnIndex], $messages)
                ];
            }
            return $errorMessages;
        }
    
        return true;
    }
    
    private function storeTenantRow(array $row)
    {
        // dd($row);
        $user_id = Auth::id();
        if(!empty($row[4])){
        if(! is_numeric($row[4])){
             $date = Carbon::createFromFormat("d/m/Y", $row[4]);

             // Excel date serial number calculation: days since 1900-01-01
             $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
             $daysDifference = $date->diffInDays($excelStartDate);
             $row[4] = $daysDifference;
         }
         $unixTimestamp1 = ($row[4] - 25569) * 86400;
         $date1 = Carbon::createFromTimestamp($unixTimestamp1);
         $row[4] = $date1->format('Y-m-d');
        }
        if(!empty($row[19])){
         if(! is_numeric($row[19])){

             $date = Carbon::createFromFormat("d/m/Y", $row[19]);

             // Excel date serial number calculation: days since 1900-01-01
             $excelStartDate = Carbon::createFromDate(1900, 12, 30); // Note: Excel's date system starts from 1900-01-01 but there's a bug that considers 1900 as a leap year.
             $daysDifference = $date->diffInDays($excelStartDate);
             $row[19] = $daysDifference;

         }
         
         $unixTimestamp2 = ($row[19] - 25569) * 86400;
         $date2 = Carbon::createFromTimestamp($unixTimestamp2);
         $row[19] = $date2->format('Y-m-d');
        }
        

        $tenantPersonalInformation = TenantInformation::create([
            
            'status' => 1,
            'created_by' => $user_id,
            'updated_by' => $user_id,
        ]);
         TenantPersonalInformation::create([
            'tenant_info_id' => $tenantPersonalInformation->id,
            'last_name' => $row[0] ?? null,
            'first_name' => $row[1] ?? null,
            'middle_name' => $row[2] ?? null,
            'ss_no' => $row[3] ?? null,
            'date_of_birth' => $row[4],
            'phone' => $row[5] ?? null,
            'co-applicant' => $row[6] ?? null,
            'present_address' => $row[7] ?? null,
            'appartment_number' => $row[8] ?? null,
            'city' => $row[9] ?? null,
            'state' => $row[10] ?? null,
            'zip' => $row[11] ?? null,
            'created_by' => $user_id,
            'updated_by' => $user_id,
            'is_imported' => 1,
        ]);
    
        TenantLandlord::create([
            'tenant_info_id' => $tenantPersonalInformation->id,
            'landlord' => $row[12] ?? null,
            'landlord_telephone' => $row[13] ?? null,
            'employer' => $row[14] ?? null,
            'employer_telephone' => $row[15] ?? null,
            'employer_address' => $row[16] ?? null,
            'employer_contact' => $row[17] ?? null,
            'employer_position' => $row[18] ?? null,
            'employer_start_date' => $row[19] ?? null,
            'employer_salary' => $row[20] ?? null,
            'created_by' => $user_id,
            'updated_by' => $user_id,
        ]);
    
        TenantAcknowledgement::create([
            'tenant_info_id' => $tenantPersonalInformation->id,
            'created_by' => $user_id,
            'updated_by' => $user_id,
            
        ]);
    
        TenantPersonalHistory::create([
            'tenant_info_id' => $tenantPersonalInformation->id,
            'moved_before' => $row[21] ? ($row[21] == '1') : null,
            'bankrupt' => $row[22] ? ($row[22] == '1') : null,
            'broken_rental_agreement' => $row[23] ? ($row[23] == '1') : null,
            'sued_before' => $row[24] ? ($row[24] == '1') : null,
            'created_by' => $user_id,
            'updated_by' => $user_id,
        ]);
    
      
    }
    

    public function viewAudit()
    {
        $inquiryData = InquiryStep1::with('createdByUser', 'deletedByUser', 'updatedByUser')->orderBy('updated_at', 'desc')->get();
        $tenantData = TenantInformation::with('createdByUser', 'deletedByUser', 'updatedByUser')->orderBy('updated_at', 'desc')->get();
        $pageTitle = 'Audit';
        return view('admin/audit-form', compact('pageTitle', 'inquiryData', 'tenantData'));
    }
}
