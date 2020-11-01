

   <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- LINEARICONS -->
        <link rel="stylesheet" href="../assets/fonts/linearicons/style.css">
        
        <!-- STYLE CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>



        <div class="wrapper">
            <div class="inner">
                <img src="../assets/img/image-1.png" alt="" class="image-1">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h3>Nouveau ?</h3>
                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input name="name" type="text" class="form-control" placeholder="Nom et prenom">
                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                      <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input name="adress" type="text" class="form-control" placeholder="Adresse">
                          @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-phone-handset"></span>
                        <input name="phone" type="text" class="form-control" placeholder="Numero telephone">
                    
                    </div>
                     <div class="form-holder">
                  <span class="lnr lnr-user"></span>
                            <select class="form-control" id='usertype' name="usertype">
                
                                <option value="admin">admin</option>
                                <option value="Etudiant">Etudiant(e)</option>
                                <option value="Chef filliere">Chef filliere</option>
                                <option value="Professeur">Professeur</option>
                                <option value="Délégué">Délégué(e)</option>
                                </select>
                                 @error('usertype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-envelope"></span>
                        <input name="email" type="text" class="form-control" placeholder="Adresse E-mail">
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                   

                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input name="cni" type="text" class="form-control" placeholder="CIN">
                         @error('cni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>




                     <div class="form-holder">
                        <span id="lcne" class="lnr lnr-user"></span>
                        <input id="cne" name="cne" type="text" class="form-control" placeholder="CNE">
                         @error('cne')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                    <select class="form-control" id='filiere' name="filiere">
                     
                                 @foreach($filieres as $fil)
                                <option value="{{$fil->id}}">{{$fil->name}}</option>
                                 @endforeach
                                </select>
                                 @error('filiere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>




                    
                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input name="password"  type="password" class="form-control" placeholder="Mot de passe">
                           @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input name="password_confirmation" id="password-confirm" type="password" class="form-control" placeholder="Confirmer mot de passe ">
                    </div>
                    <button type="submit" class="btn btn-primary" >
                        <span>Inscription</span>
                    </button>
                </form>
                <img src="../assets/img/image-2.png" alt="" class="image-2">
            </div>
            
        </div>
        <script src="../assets/js/main.js"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#usertype').change(function() {

    if( $(this).val() == 'Etudiant') {
        $("#cne").show();
        $("#lcne").show();

    }
        else if( $(this).val() == 'Délégué') {
            $("#cne").show();
            $("#lcne").show();
          }
          else 

    {   
    $("#cne").hide();
    $("#lcne").hide();

    }
  });
 $("#cne").hide();
 $("#lcne").hide();
});


</script>
