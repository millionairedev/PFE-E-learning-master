<style>
.zoom {

  transition: transform .2s; /* Animation */

}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

@extends('layouts.front')

@section('heading')
@if(auth()->user()->usertype == 'admin')
<a class="btn btn-primary pull-right" href="{{route('emploi.create')}}">Ajouter nouvel emploi</a> <br>
@endif
@endsection
@section('category')
    <div class="col-md-3" >
    <div class="dp">
    <img  class="zoom" src="../assets/img/emp-logo.png" alt="">
    </div>
    
  <br>
  </div>
 
@endsection

@section('content')

<h2><b>Liste des Emplois</b></h2>
<br>
@include('emploi.partials.emplois-list')

@endsection