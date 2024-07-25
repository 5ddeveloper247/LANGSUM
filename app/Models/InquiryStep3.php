<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryStep3 extends Model
{
    use HasFactory;
    protected $table = 'credit_information';
    protected $fillable = ['personal_info_id','card_name1','account_number1','card_name2','account_number2','card_name3','account_number3','created_by','updated_by'];

    public function inquiryStep1()
    {
        return $this->belongsTo(InquiryStep1::class, 'personal_info_id');
    }
}
