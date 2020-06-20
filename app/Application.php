<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
      'job_ad', 'company_id', 'job_title',  'job_type', 'salary', 'additional_description', 'personal_rank', 'possibility','email_templates_id','cover_letter_id','resume_id', 'applied_at', 'interview', 'got_reply', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(){
        $this->belongsTo(Company::class);
    }
}
