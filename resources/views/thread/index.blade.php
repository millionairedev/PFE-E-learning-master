@extends('layouts.front')

@section('heading')

@endsection
@section('category')
  <div class="col-sm-3 sidenav">
      <h4><a class="btn btn-success" href="{{route('thread.index',['filieres'=>Auth::user()->filiere ?? ''])}}" style="text-align: center;">
  <span class="badge"></span>Touts les Avis</a></h4>
      <ul class="nav nav-pills nav-stacked">
       @if(auth()->user() != null && auth()->user()->usertype != 'Etudiant' )
                  <li><a class="active" href="{{route('thread.create')}}"> Creer Avis <i class="glyphicon glyphicon-plus"></i> </a></li>
              @endif

      </ul><br>
   </nav>
   </div>
            @endsection
@section('content')

@include('layouts.partials.thread-list')

@endsection

