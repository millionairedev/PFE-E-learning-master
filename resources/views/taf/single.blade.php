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
    <img  class="zoom" src="../assets/img/List-PNG-Photos.png" alt="">
    </div>
    
  <br>

 <nav class="nav-sidebar">
                <ul class="nav">
        
                    <li><a href="{{route('taf.index')}}" class="list-group-item disabled">
  <span class="badge "></span>--Liste matieres--</a></li>
                    @foreach($matieres as $key => $value)
    <li><a href="{{route('taf.index',['matiere'=>$key])}}" class="list-group-item">
  <span class="badge"></span>{{$value}}</a><li>
     @endforeach
                    
                </ul>
            </nav>
    </div>

  
@endsection

@section('content')
<div class="content-wrap-well">
<h4>{{$taf->titre}}</h4>
<hr>
<div class="thread-details">
Liste des taf de la matiere: <b>{{$mats->name}}</b> 
</div>
<hr>
<div class="thread-details">
	Filiere: <b>{{$fils->name}}</b> 
</div>



<br>
@if($taf->fichier != null)
<iframe  width="100%" height="400px" src="{{asset("storage/$taf->fichier")}}"> 
</iframe>
@endif

</div>
@if(auth()->user()->id == $taf->user_id && auth()->user()->usertype == 'Professeur')
<div class="actions">
	<a href="{{route('taf.edit',$taf->id)}}" class="btn btn-warning btn-xs" method="POST">Modifier</a>

	<form action="{{route('taf.destroy',$taf->id)}}" method="POST" class="inline-it">
	{{csrf_field()}}
	{{method_field('DELETE')}}
	<input class="btn btn-xs btn-danger" value="Supprimer" type="submit" name="Delete">	
    </form>	
		
</div>
@endif

@endsection




