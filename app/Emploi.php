<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{

	  protected $guarded=[];
	  use RecordsFeed;

     public function user()
   {

 		return $this->belongsTo(User::class);
   }

   public function filieres()
   {

 		return $this->belongsToMany(Filiere::class);
   }
}
