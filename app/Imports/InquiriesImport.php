<?php


namespace App\Imports;

use App\Models\InquiryStep1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;

class InquiriesImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    use Importable, SkipsFailures;

    /**
     * Define how each row should be mapped to the model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new InquiryStep1([
            'date' => isset($row['date']) ? Carbon::createFromFormat('d-M-y', $row['date']) : null,
            'apartment_address' => $row['apartment_address'] ?? null,
            'apartment_number' => $row['apartment_number'] ?? null,
            'name' => $row['name'] ?? null,
            'telephone' => $row['telephone'] ?? null,
            'social_security_number' => $row['social_security_number'] ?? null,
            'email' => $row['email'] ?? null,
            'present_address' => $row['present_address'] ?? null,
            'zip' => $row['zip'] ?? null,
            'user_apartment_number' => $row['user_apartment_number'] ?? null,
            'tenant_duration' => $row['tenant_duration'] ?? null,
            'present_landlord' => $row['present_landlord'] ?? null,
            'present_landlord_telephone' => $row['present_landlord_telephone'] ?? null,
            'total_rent' => $row['total_rent'] ?? null,
            'section_share' => $row['section_share'] ?? null,
            'landlord_address' => $row['landlord_address'] ?? null,
            'landlord_previous_address' => $row['landlord_previous_address'] ?? null,
            'previous_landlord' => $row['previous_landlord'] ?? null,
            'previous_landlord_address' => $row['previous_landlord_address'] ?? null,
            'previous_landlord_telephone' => $row['previous_landlord_telephone'] ?? null,

            'employer_name' => $row['employer_name'] ?? null,
            'employer_occupation' => $row['employer_occupation'] ?? null,
            'employer_business_address' => $row['employer_business_address'] ?? null,
            'employer_telephone' => $row['employer_telephone'] ?? null,
            'employer_duration' => $row['employer_duration'] ?? null,
            'director_of_personnel' => $row['director_of_personnel'] ?? null,
            'employer_salary' => $row['employer_salary'] ?? null,
            'employer_salary_period' => $row['employer_salary_period'] ?? null,
            'previous_employer' => $row['previous_employer'] ?? null,
            'previous_employer_occupation' => $row['previous_employer_occupation'] ?? null,
            'previous_employer_business_address' => $row['previous_employer_business_address'] ?? null,
            'previous_employer_telephone' => $row['previous_employer_telephone'] ?? null,
            'previous_employer_duration' => $row['previous_employer_duration'] ?? null,
            'supervisor_name' => $row['supervisor_name'] ?? null,
            'previous_employer_salary' => $row['previous_employer_salary'] ?? null,
            'previous_employer_salary_period' => $row['previous_employer_salary_period'] ?? null,

            'card_name_1' => $row['card_name_1'] ?? null,
            'account_number_1' => $row['account_number_1'] ?? null,
            'card_name_2' => $row['card_name_2'] ?? null,
            'account_number_2' => $row['account_number_2'] ?? null,
            'card_name_3' => $row['card_name_3'] ?? null,
            'account_number_3' => $row['account_number_3'] ?? null,

            'reference_name' => $row['reference_name'] ?? null,
            'reference_relation' => $row['reference_relation'] ?? null,
            'reference_age' => $row['reference_age'] ?? null,

            'find_method' => $row['find_method'] ?? null,
            'interviewing_agent' => $row['interviewing_agent'] ?? null,
            'lease_to_begin' => $row['lease_to_begin'] ?? null,
            'lease_mail' => $row['lease_mail'] ?? null,
            'rent' => $row['rent'] ?? null,
            'lease_year_length' => $row['lease_year_length'] ?? null,
            'security_amount' => $row['security_amount'] ?? null,
        ]);
    }

    /**
     * Validation rules for the imported data.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '*.date' => ['nullable', 'date_format:d-M-y'],
            '*.apartment_address' => ['nullable', 'string'],
            '*.apartment_number' => ['nullable', 'string'],
            '*.name' => ['nullable', 'string'],
            '*.telephone' => ['nullable', 'string'],
            '*.social_security_number' => ['nullable', 'string'],
            '*.email' => ['nullable', 'email'],
            '*.present_address' => ['nullable', 'string'],
            '*.zip' => ['nullable', 'string'],
            '*.user_apartment_number' => ['nullable', 'string'],
            '*.tenant_duration' => ['nullable', 'string'],
            '*.present_landlord' => ['nullable', 'string'],
            '*.present_landlord_telephone' => ['nullable', 'string'],
            '*.total_rent' => ['nullable', 'numeric'],
            '*.section_share' => ['nullable', 'numeric'],
            '*.landlord_address' => ['nullable', 'string'],
            '*.landlord_previous_address' => ['nullable', 'string'],
            '*.previous_landlord' => ['nullable', 'string'],
            '*.previous_landlord_address' => ['nullable', 'string'],
            '*.previous_landlord_telephone' => ['nullable', 'string'],

            '*.employer_name' => ['nullable', 'string'],
            '*.employer_occupation' => ['nullable', 'string'],
            '*.employer_business_address' => ['nullable', 'string'],
            '*.employer_telephone' => ['nullable', 'string'],
            '*.employer_duration' => ['nullable', 'string'],
            '*.director_of_personnel' => ['nullable', 'string'],
            '*.employer_salary' => ['nullable', 'numeric'],
            '*.employer_salary_period' => ['nullable', 'string'],
            '*.previous_employer' => ['nullable', 'string'],
            '*.previous_employer_occupation' => ['nullable', 'string'],
            '*.previous_employer_business_address' => ['nullable', 'string'],
            '*.previous_employer_telephone' => ['nullable', 'string'],
            '*.previous_employer_duration' => ['nullable', 'string'],
            '*.supervisor_name' => ['nullable', 'string'],
            '*.previous_employer_salary' => ['nullable', 'numeric'],
            '*.previous_employer_salary_period' => ['nullable', 'string'],

            '*.card_name_1' => ['nullable', 'string'],
            '*.account_number_1' => ['nullable', 'string'],
            '*.card_name_2' => ['nullable', 'string'],
            '*.account_number_2' => ['nullable', 'string'],
            '*.card_name_3' => ['nullable', 'string'],
            '*.account_number_3' => ['nullable', 'string'],

            '*.reference_name' => ['nullable', 'string'],
            '*.reference_relation' => ['nullable', 'string'],
            '*.reference_age' => ['nullable', 'numeric'],

            '*.find_method' => ['nullable', 'string'],
            '*.interviewing_agent' => ['nullable', 'string'],
            '*.lease_to_begin' => ['nullable', 'string'],
            '*.lease_mail' => ['nullable', 'string'],
            '*.rent' => ['nullable', 'numeric'],
            '*.lease_year_length' => ['nullable', 'numeric'],
            '*.security_amount' => ['nullable', 'numeric'],
        ];
    }

    /**
     * Number of rows to be inserted in a batch.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * Number of rows to be read in a chunk.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 100;
    }
}
