<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'company_name', 'address', 'contact'
    ];

    public function application(){
        return $this->hasMany(Application::class);
    }
}
