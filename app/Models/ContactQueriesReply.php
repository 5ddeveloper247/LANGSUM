<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactQueriesReply extends Model
{
    use HasFactory;
    protected $table = 'contact_queries_replies';
    protected $fillable = [
        'contact_query_id','reply','created_by'
    ];
}
