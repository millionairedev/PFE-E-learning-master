<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	use CommentableTrait,RecordsFeed; 

   protected $fillable=['subject','thread', 'img','user_id'];


   public static function boot()
   {
   	parent::boot();

  
   }


   public function user()
   {

 		return $this->belongsTo(User::class);
   }

   public function filieres()
   {

 		return $this->belongsToMany(Filiere::class);
   }

    
    }
