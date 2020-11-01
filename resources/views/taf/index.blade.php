@extends('layouts.front')

@section('heading')
@if(auth()->user()->usertype == 'Professeur')
<a class="btn btn-primary pull-right" href="{{route('taf.create')}}">Ajouter Tàf</a> <br>
@endif
@endsection
@section('category')
    <div class="col-md-3" >
    <div class="dp">
    <img  class="zoom" src="../assets/img/List-PNG-Photos.png" alt="">
    </div>
    
  <br>

 <nav class="nav-sidebar">
                <ul class="nav">
        
                    <li><a href="" class="list-group-item disabled">
  <span class="badge"></span>---Liste matieres---</a></li>
                    @foreach($matieres as $mats)
    <li><a href="{{route('taf.index',['matiere'=>$mats->id])}}" class="list-group-item">
  <span class="badge"></span>{{$mats->name}}</a><li>
     @endforeach
                    
                </ul>
            </nav>

  

    </div>


    <style>
.zoom {

  transition: transform .2s; /* Animation */

}

.zoom:hover {
  transform: scale(1.25); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

@endsection

@section('content')

<h2><b>Liste des Travaux à faire</b></h2>
<br>
@include('taf.partials.tafs-list')
<div class="col-md-3" >
<a class="btn-success" style="background: #11B4FE" href="/sendtafsmail">Notifier par email <span class="
glyphicon glyphicon-envelope"></span> </a>
</div>
@endsection