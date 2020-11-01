<style>
.zoom {

  transition: transform .2s; /* Animation */

}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

@extends('layouts.front')
@section('category')
    <div class="col-md-3" >
    <div class="dp">
    <img  class="zoom" src="../assets/img/emp-logo.png" alt="">
    </div>
    
  <br>
  </div>
 

@endsection

@section('content')
<div class="content-wrap-well">
<h4>{{$emploi->titre}}</h4>
<hr>

<div class="thread-details">
	Filiere: <b>{{$fils->name}}</b> 
</div>



<br>
@if($emploi->fichier != null)
<iframe  width="100%" height="400px" src="{{asset("storage/$emploi->fichier")}}"> 
</iframe>
@endif

</div>
@if(auth()->user()->id == $emploi->user_id && auth()->user()->usertype == 'admin')
<div class="actions">
	<a href="{{route('emploi.edit',$emploi->id)}}" class="btn btn-warning btn-xs" method="POST">Modifier</a>

	<form action="{{route('emploi.destroy',$emploi->id)}}" method="POST" class="inline-it">
	{{csrf_field()}}
	{{method_field('DELETE')}}
	<input class="btn btn-xs btn-danger" value="Supprimer" type="submit" name="Delete">	
    </form>	
		
</div>
@endif

@endsection




