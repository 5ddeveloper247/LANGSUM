<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantLandlord extends Model
{
    use HasFactory;
    protected $table = 'tenant_landlord';
    protected $fillable = ['tenant_info_id','landlord','landlord_telephone','employer','employer_telephone','employer_address','employer_contact','employer_position','employer_start_date','employer_salary','created_by','updated_by'];

    public function tenantInformation()
    {
        return $this->belongsTo(TenantInformation::class, 'tenant_info_id');
    }
}
