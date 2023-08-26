<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 't_candidates';

    protected $fillable = [
        'candidate_id',
        'candidate_email',
        'candidate_phone_number',
        'candidate_full_name',
        'candidate_dob',
        'candidate_pob',
        'candidate_gender',
        'candidate_year_exp',
        'candidate_last_salary',
    ];
}
