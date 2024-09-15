<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_date',
        'name',
        'contact_number',
        'purposse_of_visit',
        'appartment',
        'unit_number',
        'checkin',
        'checkout',
        'visitor_number',
    ];
}
