@extends('layouts.front')
<style type="text/css">
  img-responsive,
.thumbnail > img,
.thumbnail a > img,
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  display: block;
  width: 100%;
  height: auto;
}

/* ------------------- Carousel Styling ------------------- */

.carousel-inner {
  border-radius: 15px;
}

.carousel-caption {
  background-color: rgba(0,0,0,.5);
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
  padding: 0 0 10px 25px;
  color: #fff;
  text-align: left;
}

.carousel-indicators {
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  width: 100%;
  z-index: 15;
  margin: 0;
  padding: 0 25px 25px 0;
  text-align: right;
}

.carousel-control.left,
.carousel-control.right {
  background-image: none;
}


/* ------------------- Section Styling - Not needed for carousel styling ------------------- */

.section-white {
   padding: 10px 0;
}

.section-white {
  background-color: #fff;
  color: #555;
}

@media screen and (min-width: 768px) {

  .section-white {
     padding: 1.5em 0;
  }

}

@media screen and (min-width: 992px) {

  .container {
    max-width: 1500px;
  }

}
</style>


@section('banner')
  <section class="section-white">
  <div class="container">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
      <img src="../assets/img/ae2.jpg" width="100%" class="img-responsive center-block" alt="1">
        <div class="carousel-caption">
        <h2>Bienvenue dans la page d'acceuil E-learning !</h2>
        <h4>Partageants l'information ensemble pour un meilleur avenir ! </h4>
      </div>
    </div>

    <div class="item">
      <img src="../assets/img/img2.jpg"  width="100%" class="img-responsive center-block" alt="2">
      <div class="carousel-caption">
        <h2>Le future de l'ensignement est ici !</h2>
        <h4>Comment se former et acquérir de nouvelles compétences quand on n’a pas le temps ou la possibilité de se déplacer ? L’enseignement à distance est la solution idéale !</h4>
      </div>
    </div>

    <div class="item">
      <img src="../assets/img/ae1.jpg"  width="100%"  class="img-responsive center-block" alt="3">
      <div class="carousel-caption">
        <h2>Nous somme tous unis !</h2>
        <h4>Pédagogie + Qualité + Union= Le cœur et l’âme de notre plateforme.</h4>
      </div>
    </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
</section>

<br>
@endsection

@section('category')

    <div class="col-sm-3 sidenav">

      <ul class="nav nav-pills nav-stacked">
        <li><a class="btn btn-success" href="{{route('thread.index',['filieres'=>Auth::user()->filiere ?? ''])}}" style="text-align: center;">
    <span class="badge"></span>Tous les Avis</a></li>
       @if(auth()->user() != null && auth()->user()->usertype != 'Etudiant' )
               <li><a class="active" href="{{route('thread.create')}}"> Creer Avis <i class="glyphicon glyphicon-plus"></i> </a></li>
              @endif

      </ul><br>
   </nav>
   </div>

            @endsection
@section('content')
 <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>À propos </h3>
                    <p class="lead">Nous sommes passionnés par le développement de vos compétences. C’est dans ce but que nous avons conçu cette solution de formation.</p>
                </div>
            </div><!-- end title -->
          @include('layouts.partials.thread-list')
        
            </div><!-- end row -->

  
@endsection