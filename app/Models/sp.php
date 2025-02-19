<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sp extends Model
{
    protected $table = 'sp';
    
    protected $fillable = [
        'id_sp',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];
    //
}
