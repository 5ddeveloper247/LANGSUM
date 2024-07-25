<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryStep4 extends Model
{
    use HasFactory;
    protected $table='references';
    protected $fillable = [
        'personal_info_id','reference_name','reference_relation','reference_age','created_by','updated_by'];
    
        public function inquiryStep1()
        {
            return $this->belongsTo(InquiryStep1::class, 'personal_info_id');
        }
}
