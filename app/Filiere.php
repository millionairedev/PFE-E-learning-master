<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $guarded=[];
    
    public function threads()
    {
        return $this->belongsToMany(Thread::class);
    }


     public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
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
