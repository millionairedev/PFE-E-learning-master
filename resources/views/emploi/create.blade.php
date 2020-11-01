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
  </div>
    @endsection
@section('heading',"Ajouter Emploi")

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="row">
<div class="well">
	<form enctype='multipart/form-data' class="form-vertical" action="{{route('emploi.store')}}" method="post" role="form" id="create-emploi-form">
		{{csrf_field()}}	
	<div class="form-group">
		<label for="titre">Titre</label>
		<input type="text" name="titre" class="form-control" id="" placeholeder="Input..." value="{{old('titre')}}">	</div>

	

	<div class="form-group">
		<label  for="type">Filliere</label>
           <select class="form-control" name="filieres" >
               @foreach($filieres as $fils)
             <option value="{{ $fils->id }}">{{ $fils->name }}</option>
                 @endforeach
                </select> </div>
              

	<div class="form-group">
		<label for="cours">Fichier</label>
		<input type="file" name="fichier"/>
	 </div>


		<button type="submit" class="btn btn-primary">Entrer</button>
		
		
	</form>

</div>
</div>
@endsection
