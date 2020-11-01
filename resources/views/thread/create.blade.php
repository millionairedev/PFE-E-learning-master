@extends('layouts.front')
@section('category')
<div class="col-md-3">

 <nav class="nav-sidebar">
    
                <ul class="nav">
                @if(auth()->user() != null && auth()->user()->usertype == 'Etudiant' )
                  <li><a class="btn btn-success" href="{{route('thread.create')}}"> Creer Avis <i class="glyphicon glyphicon-plus"></i> </a></li>
              @endif
      
                   
    <li><a href="{{route('thread.index',['filieres'=>Auth::user()->filiere ?? ''])}}" class="btn-default" style="text-align: center;">
  <span class="badge"></span>Touts les Avis</a><li>
                    
                </ul>
            </nav>
          </div>
            @endsection
@section('heading',"Creer nouvelle discussion")
@section('content')


<div class="row">
<div class="well">
	<form enctype='multipart/form-data' class="form-vertical" action="{{route('thread.store')}}" method="post" role="form" id="create-thread-form">
		{{csrf_field()}}	
	<div class="form-group">
		<label for="subject">Sujet</label>
		<input type="text" name="subject" class="form-control" id="" placeholeder="Input..." value="{{old('subject')}}">

		<div class="form-group">
		<label  for="type">Filiere</label>
           <select class="form-control" name="filieres" >
            
               @foreach($filieres as $fil)
                       <option value="{{$fil->id}}">{{$fil->name}}</option>
                        @endforeach
                    </select>
                </div>

           <div class="form-group">
		<label for="thread">Avis</label>
		<textarea type="text" name="thread" class="form-control" id="" placeholeder="Input..." value="">{{old('thread')}}</textarea>
	  </div>


	<div class="form-group">
		<label for="thread">Image ou fichier</label>
		<input type="file" name="img"/>
	 </div>




		<button type="submit" class="btn btn-primary">Entrer</button>
		
	</div>
		
	</form>

</div>
</div>
@endsection

 <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
 <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

