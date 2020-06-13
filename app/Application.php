<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
      'job_ad', 'company_id', 'job_title',  'job_type', 'salary', 'additional_description', 'has_reply', 'personal_rank', 'possibility'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

}
