<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;

    protected $table = 'application_form';

    protected $fillable = [
        'title',
        'firstname',
        'middlename',
        'lastname',
        'certificate_name',
        'gender',
        'personal_email',
        'mobile_no',
        'country_id',
        'city',
        'street',
        'workplace',
        'programme_id',
        'education',
        'experience',
        'completion_year',
        'application_year',   // ✅ new field
        'declaration',
        'fee_paid',
        'degree_certificate',
        'passport_size',
        'status',
        'practice_license',
        'recommendation_letter',
        'payment_proof',
        'is_deleted'
    ];

    static public function getApplications()
    {
        return self::select(
                'application_form.*',
                'countries.country_name as c_name',
                'application_form.personal_email as p_email',
                'Programmes.programme_name as prog_name'
            )
            ->join('countries', 'application_form.country_id', '=', 'countries.id')
            ->join('Programmes', 'application_form.programme_id', '=', 'Programmes.id')
            ->where('application_form.is_deleted', 0)
            ->orderBy('application_form.id', 'asc')
            ->get();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id', 'id');
    }
}

