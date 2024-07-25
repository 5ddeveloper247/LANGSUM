<?php

namespace App\Exports;

use App\Models\TenantInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class TenantExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tenants = TenantInformation::with('tenantAcknowledgement', 'tenantLandlord', 'tenantPersonalHistory', 'tenantPersonalInformation')
        ->where('status', 1)
        ->get();

        return $tenants->map(function($tenant) {
            return [
            $tenant->tenantPersonalInformation->last_name,
            $tenant->tenantPersonalInformation->first_name,
            $tenant->tenantPersonalInformation->middle_name,
            $tenant->tenantPersonalInformation->ss_no,
            !empty($tenant->tenantPersonalInformation->date_of_birth) ? Carbon::parse($tenant->tenantPersonalInformation->date_of_birth)->format('d/m/Y') : '',
            $tenant->tenantPersonalInformation->phone,
            $tenant->tenantPersonalInformation['co-applicant'],
            $tenant->tenantPersonalInformation->present_address,
            $tenant->tenantPersonalInformation->appartment_number,
            $tenant->tenantPersonalInformation->city,
            $tenant->tenantPersonalInformation->state,
            $tenant->tenantPersonalInformation->zip,

            $tenant->tenantLandlord->landlord,
            $tenant->tenantLandlord->landlord_telephone,
            $tenant->tenantLandlord->employer,
            $tenant->tenantLandlord->employer_telephone,
            $tenant->tenantLandlord->employer_address,
            $tenant->tenantLandlord->employer_contact,
            $tenant->tenantLandlord->employer_position,
            !empty($tenant->tenantLandlord->employer_start_date) ? Carbon::parse($tenant->tenantLandlord->employer_start_date)->format('d/m/Y') : '',
            $tenant->tenantLandlord->employer_salary,
            
            $tenant->tenantPersonalHistory->move_check == 1 ? 'Yes' : 'No',
            $tenant->tenantPersonalHistory->bankrupt_check == 1 ? 'Yes' : 'No',
            $tenant->tenantPersonalHistory->rental_agreement_check == 1 ? 'Yes' : 'No',
            $tenant->tenantPersonalHistory->sued_check == 1 ? 'Yes' : 'No',
            ];
        });
    }


    public function headings(): array
    {
        return [
            'Last Name', 'First Name', 'Middle Name', 'SS No', 'Date Of Birth', 'Phone', 'Co Applicant', 'Present Address', 'Appartment Number', 'City', 'State', 'Zip',

            'Landlord', 'Landlord Telephone',
            'Employer Name', 'Employer Telephone', 'Employer Address', 'Employer Contact', 'EmployePosition', 'Employer Start Date', 'Employer Salary',

            'Moved Before', 'Bankrupt', 'Broken Rental Agreement', 'Sued Before',

        ];
    }
}
