<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryStep5 extends Model
{
    use HasFactory;
    protected $table= 'terms_of_application';
    protected $fillable = [
        'personal_info_id','find_method','interviewing_agent','signature','lease_to_begin','new_lease_mail','rent','lease_years_length','security_amount','created_by','updated_by',
    ];
    
    public function inquiryStep1()
    {
        return $this->belongsTo(InquiryStep1::class, 'personal_info_id');
    }
}
