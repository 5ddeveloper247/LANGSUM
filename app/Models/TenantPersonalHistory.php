<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPersonalHistory extends Model
{
    use HasFactory;
    protected $table = 'tenant_personal_history';
    protected $fillable = ['tenant_info_id','move_check','bankrupt_check','rental_agreement_check','sued_check','created_by','updated_by'];

    public function tenantInformation()
    {
        return $this->belongsTo(TenantInformation::class, 'tenant_info_id');
    }
}
