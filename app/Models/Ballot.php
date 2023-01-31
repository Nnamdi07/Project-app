<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    use HasFactory;
    protected $fillabale = [
        'voter_id',
        'political_party_id',
        'candidate_id'
    ];
}
