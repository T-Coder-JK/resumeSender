<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
      'job_ad', 'company_id', 'job_title',  'job_type', 'salary', 'additional_description', 'has_reply', 'personal_rank', 'possibility','email_template_id','email_sent_id','email_saved_id'];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function company(){
        $this->hasOne(Company::class);
    }
}
