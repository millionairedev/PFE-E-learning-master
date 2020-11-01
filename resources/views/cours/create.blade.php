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
    <img  class="zoom" src="../assets/img/course-icon.png" alt="">
    </div>
  </div>
    @endsection
@section('heading',"Ajouter Cours")

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
	<form enctype='multipart/form-data' class="form-vertical" action="{{route('cours.store')}}" method="post" role="form" id="create-cours-form">
		{{csrf_field()}}	
	<div class="form-group">
		<label for="titre">Titre</label>
		<input type="text" name="titre" class="form-control" id="" placeholeder="Input..." value="{{old('titre')}}">	</div>

	

	<div class="form-group">
		<label  for="type">Filliere</label>
           <select class="form-control" name="filieres" >
           	 <option>-- Selectionner Filliere--</option>
               @foreach($fields as $key => $value)
             <option value="{{ $key }}">{{ $value }}</option>
                 @endforeach
                </select> </div>

          <div class="form-group">
                <label for="matiere">Matiere</label>
                <select name="matiere" class="form-control"style="width:250px">
                <option>-- Selectionner Matiere--</option>
                </select>
            </div>
              

	<div class="form-group">
		<label for="cours">Fichier</label>
		<input type="file" name="fichier"/>
	 </div>




		<button type="submit" class="btn btn-primary">Entrer</button>
		

		
	</form>

</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="filieres"]').on('change',function(){
               var filID = jQuery(this).val();
               if(filID)
               {
                  jQuery.ajax({
                     url : '/cours/getmatieres/' +filID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="matiere"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="matiere"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="matiere"]').empty();
               }
            });
    });
    </script>