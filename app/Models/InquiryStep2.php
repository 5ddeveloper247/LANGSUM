<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryStep2 extends Model
{
    use HasFactory;

    protected $table = 'account_information';
    protected $fillable = ['personal_info_id','employer_name','employer_occupation','employer_business_address','employer_telephone','employer_duration','director_of_personnel','employer_salary','employer_salary_period','previous_employer','previous_employer_occupation','previous_employer_business_address','previous_employer_telephone','previous_employer_duration','supervisor_name','previous_employer_salary','previous_employer_salary_period','created_by','updated_by'];

    public function inquiryStep1()
    {
        return $this->belongsTo(InquiryStep1::class, 'personal_info_id');
    }
}
