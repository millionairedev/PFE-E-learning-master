<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Td extends Model
{
    use RecordsFeed;
	 
    protected $guarded=[];


     public function user()
   {

 		return $this->belongsTo(User::class);
   }
   

      public function filieres()
   {

 		return $this->belongsToMany(Filiere::class);
   }


      public function matieres()
   {

 		return $this->belongsToMany(Matiere::class);
   }
}

