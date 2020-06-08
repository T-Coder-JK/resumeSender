<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'user_id', 'content'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
