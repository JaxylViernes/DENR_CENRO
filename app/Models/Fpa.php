<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fpa extends Model
{
    protected $table = '';
    
    protected $fillable = [
        'id_rfpa',
        'applicant_name',
        'applicant_number',
        'referred_investigator',
        'patented_subsisting',
        'location',
        'survey_no',
        'remarks',        
    ];
}
