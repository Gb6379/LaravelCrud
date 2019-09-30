<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    //

    protected $table = "person"; //tell who is the primary key

    protected $fillable = [ // tell what are the filds that are gonna be filled
        'id', 
        'name', 
        'lastname',
        'cpf',
        'email',
        'companie_id',
         
    ];

    public function companie(){//a person has one company
        return $this->belongsTo(companie::class, 'companie_id');// companie model
    }
}
