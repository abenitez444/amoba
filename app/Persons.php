<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{   
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'first_name', 
        'last_name', 
        'document', 
        'ima_profile', 
        'type_person', 
    ];
}
