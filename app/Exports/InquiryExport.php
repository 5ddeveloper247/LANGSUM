<?php

namespace App\Exports;

use App\Models\InquiryStep1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class InquiryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $inquiries = InquiryStep1::with('inquiryStep2', 'inquiryStep3', 'inquiryStep4', 'inquiryStep5')
        ->where('status', 1)
        ->get();

        return $inquiries->map(function($inquiry) {
            return [
                'Date' => isset($inquiry->date) ? Carbon::parse($inquiry->date)->format('d/m/Y') : '',
                'Appartment Address' => $inquiry->apt_address ?? '',
                'Appartment Number' => $inquiry->apt_number ?? '',
                'Name' => $inquiry->name ?? '',
                'Telephone' => $inquiry->telephone ?? '',
                'Social Security Number' => $inquiry->social_security_number ?? '',
                'Email' => $inquiry->email ?? '',
                'Present Address' => $inquiry->present_address ?? '',
                'Zip' => $inquiry->zip ?? '',
                'User Appartment Number' => $inquiry->user_apt_number ?? '',
                'Tenant Duration' => $inquiry->tenant_duration ?? '',
                'Present Landlord' => $inquiry->present_landlord ?? '',
                'Present Landlord Telephone' => $inquiry->present_landlord_telephone ?? '',
                'Total Rent' => $inquiry->total_rent ?? '',
                'Section Share' => $inquiry->section_share ?? '',
                'Landlord Address' => $inquiry->landlord_address ?? '',
                'Landlord Previous Address' => $inquiry->landlord_previous_address ?? '',
                'Previous Landlord' => $inquiry->previous_landlord ?? '',
                'Previous Landlord Address' => $inquiry->previous_landlord_address ?? '',
                'Previous Landlord Telephone' => $inquiry->previous_landlord_telephone ?? '',

                'Employer Name' => $inquiry->inquiryStep2->employer_name ?? '',
                'Employer Occupation' => $inquiry->inquiryStep2->employer_occupation ?? '',
                'Employer Business Address' => $inquiry->inquiryStep2->employer_business_address ?? '',
                'Employer Telephone' => $inquiry->inquiryStep2->employer_telephone ?? '',
                'Employer Duration' => $inquiry->inquiryStep2->employer_duration ?? '',
                'Director Of Personnel' => $inquiry->inquiryStep2->director_of_personnel ?? '',
                'Employer Salary' => $inquiry->inquiryStep2->employer_salary ?? '',
                'Employer Salary Period' => $inquiry->inquiryStep2->employer_salary_period ?? '',
                'Previous Employer' => $inquiry->inquiryStep2->previous_employer ?? '',
                'Previous Employer Occupation' => $inquiry->inquiryStep2->previous_employer_occupation ?? '',
                'Previous Employer Business Address' => $inquiry->inquiryStep2->previous_employer_business_address ?? '',
                'Previous Employer Telephone' => $inquiry->inquiryStep2->previous_employer_telephone ?? '',
                'Previous Employer Duration' => $inquiry->inquiryStep2->previous_employer_duration ?? '',
                'Supervisor Name' => $inquiry->inquiryStep2->supervisor_name ?? '',
                'Previous Employer Salary' => $inquiry->inquiryStep2->previous_employer_salary ?? '',
                'Previous Employer Salary Period' => $inquiry->inquiryStep2->previous_employer_salary_period ?? '',

                'Card Name 1' => $inquiry->inquiryStep3->card_name1 ?? '',
                'Account Number 1' => $inquiry->inquiryStep3->account_number1 ?? '',
                'Card Name 2' => $inquiry->inquiryStep3->card_name2 ?? '',
                'Account Number 2' => $inquiry->inquiryStep3->account_number2 ?? '',
                'Card Name 3' => $inquiry->inquiryStep3->card_name3 ?? '',
                'Account Number 3' => $inquiry->inquiryStep3->account_number3 ?? '',

                // 'Reference Name' => $inquiry->inquiryStep4->reference_name ?? '',
                // 'Reference Relation' => $inquiry->inquiryStep4->reference_relation ?? '',
                // 'Reference Age' => $inquiry->inquiryStep4->reference_age ?? '',

                'Reference Name' => '',
                'Reference Relation' =>  '',
                'Reference Age' => '',

                'Find Method' => $inquiry->inquiryStep5->find_method ?? '',
                'Interviewing Agent' => $inquiry->inquiryStep5->interviewing_agent ?? '',
                'Lease To Begin' => $inquiry->inquiryStep5->lease_to_begin ?? '',
                'Lease Mail' => $inquiry->inquiryStep5->new_lease_mail ?? '',
                'Rent' => $inquiry->inquiryStep5->rent ?? '',
                'Lease Year Length' => $inquiry->inquiryStep5->lease_years_length ?? '',
                'Security Amount' => $inquiry->inquiryStep5->security_amount ?? '',
            ];
        });
    }


    public function headings(): array
    {
        return [
            'Date', 'Appartment Address', 'Appartment Number', 'Name', 'Telephone', 'Social Security Number', 'Email', 'Present Address', 'Zip', 'User Appartment Number', 'Tenant Duration', 'Present Landlord', 'Present Landlord Telephone', 'Total Rent', 'Section Share', 'Landlord Address', 'Landlord Previous Address', 'Previous Landlord', 'Previous Landlord Address', 'Previous Landlord Telephone',

            'Employer Name', 'Employer Occupation', 'Employer Business Address', 'Employer Telephone', 'Employer Duration', 'Director Of Personnel', 'Employer Salary', 'Employer Salary Period', 'Previous Employer', 'Previous Employer Occupation', 'Previous Employer Business Address', 'Previous Employer Telephone', 'Previous Employer Duration', 'Supervisor Name', 'Previous Employer Salary', 'Previous Employer Salary Period',

            'Card Name 1', 'Account Number 1', 'Card Name 2', 'Account Number 2', 'Card Name 3', 'Account Number 3',

            'Reference Name', 'Reference Relation', 'Reference Age',
            'Find Method', 'Interviewing Agent', 'Lease To Begin', 'Lease Mail', 'Rent', 'Lease Year Length', 'Security Amount'
        ];
    }
}
