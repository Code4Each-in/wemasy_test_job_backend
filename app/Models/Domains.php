<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domains extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'domain_name',
        'home_page_url',
        'privacy_policy_url',
        'contact_us_url',
    ];
}
