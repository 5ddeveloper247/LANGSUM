<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantInformation extends Model
{
    use HasFactory;
    protected $table = 'tenant_information';
    protected $fillable = ['date','contact','telephone','building_address','appartment_number','zip','created_by','updated_by','status','deleted_by'];


    public function tenantAcknowledgement()
    {
        return $this->hasOne(TenantAcknowledgement::class, 'tenant_info_id');
    }

    public function tenantLandlord()
    {
        return $this->hasOne(TenantLandlord::class, 'tenant_info_id');
    }

    public function tenantPersonalHistory()
    {
        return $this->hasOne(TenantPersonalHistory::class, 'tenant_info_id');
    }

    public function tenantPersonalInformation()
    {
        return $this->hasOne(TenantPersonalInformation::class, 'tenant_info_id');
    }
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }










}


