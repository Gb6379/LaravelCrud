<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companie extends Model
{
    //
    protected $primaryKey = "id"; //tell who is the primary key

    protected $fillable = [ // tell what are the filds that are gonna be filled
        'id', 
        'name', 
        'cnpj',
        'cnae' 
    ];

    public function person(){//a company has many persons
        return $this->hasMany(person::class);
    }


}
