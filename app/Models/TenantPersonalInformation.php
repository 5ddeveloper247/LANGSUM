<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPersonalInformation extends Model
{
    use HasFactory;
    protected $table = 'tenant_personal_information';
    protected $fillable = ['tenant_info_id','last_name','first_name','middle_name','ss_no','date_of_birth','phone','co-applicant','present_address','appartment_number','city','state','zip','created_by','updated_by','is_imported'];

    public function tenantInformation()
    {
        return $this->belongsTo(TenantInformation::class, 'tenant_info_id');
    }
}
