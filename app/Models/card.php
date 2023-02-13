<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_myl_api',
        'eid_myl_api',
        'slug',
        'name',
        'fk_raritie_card',
        'fk_race',
        'fk_type_card',
        'cost',
        'damage',
        'ability',
        'slug_edition',
        'fk_edition'
    ];
}
