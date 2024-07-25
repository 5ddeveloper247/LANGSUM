<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table='contact_queries';
    protected $fillable= [
        'name','email','message','created_by','updated_by','reply_status','replied_by'
    ];


    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function repliedBy()
    {
        return $this->belongsTo(User::class, 'replied_by', 'id');
    }
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
