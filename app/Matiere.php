<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $guarded=[];
    

    public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }


    public function filieres()
    {
        return $this->belongsToMany(Filiere::class);
    }


    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }

    public function tafs()
    {
        return $this->belongsToMany(Taf::class);
    }


    public function tds()
    {
        return $this->belongsToMany(Td::class);
    }



}
