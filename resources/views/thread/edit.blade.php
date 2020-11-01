@extends('layouts.front')

@section('heading',"Creer nouvelle discussion")
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
@section('content')
@include('layouts.partials.error')

@include('layouts.partials.success ')

<div class="row">
<div class="well">
	<form class="form-vertical" action="{{route('thread.update',$thread->id)}}" method="post" role="form" id="create-thread-form">
	{{csrf_field()}}
	{{method_field('put')}}	
	<div class="form-group">
		<label for="subject">Subject</label>
		<input type="text" name="subject" class="form-control" id="" placeholeder="Input..." value="{{$thread->subject}}">
		
	</div>


	<div class="form-group">
		<label  for="type">Filliere</label>
           <select class="form-control" name="filieres" >
            
               @foreach($filieres as $fil)
                       <option value="{{$fil->id}}">{{$fil->name}}</option>
                        @endforeach
                    </select>
                </div>



		<div class="form-group">
		<label for="thread">Thread</label>
		<textarea type="text" name="thread" class="form-control" id="" placeholeder="Input..." value="">{{$thread->thread}}</textarea> 
	</div>
		<button type="submit" class="btn btn-primary">Entrer</button>
		


	</form>
</div>
</div>
@endsection
