<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantAcknowledgement extends Model
{
    use HasFactory;
    protected $table = 'tenant_acknowledge';
    protected $fillable = ['tenant_info_id','signature','signature_date','created_by','updated_by'];

    public function tenantInformation()
    {
        return $this->belongsTo(TenantInformation::class, 'tenant_info_id');
    }
}
