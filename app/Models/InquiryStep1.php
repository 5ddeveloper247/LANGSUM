<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryStep1 extends Model
{
    use HasFactory;
    protected $table = 'personal_information';
    protected $fillable= ['date','apt_address','apt_number','name','telephone','social_security_number','email','present_address','zip','user_apt_number','tenant_duration','present_landlord','present_landlord_telephone','total_rent','section_share','landlord_address','landlord_previous_address','previous_landlord','previous_landlord_address','previous_landlord_telephone','created_by','updated_by','status','deleted_by', 'is_imported'];

    public function inquiryStep2()
    {
        return $this->hasOne(InquiryStep2::class, 'personal_info_id');
    }

    public function inquiryStep3()
    {
        return $this->hasOne(InquiryStep3::class, 'personal_info_id');
    }

    public function inquiryStep4()
    {
        return $this->hasMany(InquiryStep4::class, 'personal_info_id');
    }

    public function inquiryStep5()
    {
        return $this->hasOne(InquiryStep5::class, 'personal_info_id');
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
