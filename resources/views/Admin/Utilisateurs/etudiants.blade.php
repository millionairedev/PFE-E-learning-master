@extends('Admin.main_admin')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<h1> Tous les Etudiants </h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Ajouter
</button>

<!-- Add Modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addForm" action="{{ action('EtudiantController@store') }}" method="POST">

        {{csrf_field()}}
      <div class="modal-body">
    <div class="form-group">
    <label >Nom</label>
    <input type="text" class="form-control" name ="name"  placeholder="Entrer nom">
  </div>  

   <div class="form-group">
    <label >Phone</label>
    <input type="text" name="phone" class="form-control" aria-describedby="phoneHelp" placeholder="Entrer telephone">
    
  </div>

  <div class="form-group">
    <label >Adresse</label>
    <input type="text" name="adress" class="form-control" aria-describedby="adressHelp" placeholder="Entrer Adresse">
    
  </div>

  <div class="form-group">
    <label >CNE</label>
    <input type="text" name="cne" class="form-control" aria-describedby="cneHelp" placeholder="Entrer votre CNE">  
  </div>

  <div class="form-group">
    <label >CIN</label>
    <input type="text" name="cni" class="form-control" aria-describedby="cniHelp" placeholder="Entrer CIN">    
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Entrer email">
  </div>

  <div class="form-group">
    <label >Type</label>
    <input type="text" name="usertype" class="form-control"  placeholder="Entrer Type">
    
  </div>

 
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- END ADD Modal  -->


<!-- Edit Modal  -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin-etudiants" method="POST" id="editForm" >

        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <div class="modal-body">
    <div class="form-group">
    <label >Nom</label>
    <input type="text" class="form-control" name ="name" id="name" placeholder="Entrer nom">
  </div>  

   <div class="form-group">
    <label >Phone</label>
    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Entrer telephone">
    
  </div>

   <div class="form-group">
    <label >Adresse</label>
    <input type="text" name="adress" class="form-control" id="adress" aria-describedby="adressHelp" placeholder="Entrer Adresse">
    
  </div>

  <div class="form-group">
    <label >CNE</label>
    <input type="text" name="cne" class="form-control" id="cne" aria-describedby="cneHelp" placeholder="Entrer votre CNE">  
  </div>

  <div class="form-group">
    <label >CIN</label>
    <input type="text" name="cni" class="form-control" id="cni" aria-describedby="cniHelp" placeholder="Entrer CIN">    
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrer email">
  </div>

  <div class="form-group">
    <label >Type</label>
    <input type="text" name="usertype" class="form-control" id="usertype"  placeholder="Entrer Type">
    
  </div>

 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- END ADD Modal  -->

<!-- DELETE Modal  -->
<div   id="deleteModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>        
        <h4 class="modal-title">Etes-vous sûr ?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form action="/admin-etudiants" id="deleteForm" method="POST" >
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('delete') }}
      <input type="hidden" name="id" id="delete_id">

        <p>Etes-vous sûr de vouloir supprimer définitivement cet utilisateur ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
      </div>
    </form>
    </div>
  </div>
 </div>
 <!-- END DELETE Modal  -->


 <div class="table-scrollable">
  <table id="datatable" class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                                <thead>
                                  <tr> 
                                    <th> ID </th>
                                    <th> Nom </th>
                                    <th> Telephone </th>
                                    <th> Adresse </th>
                                    <th> CIN </th>
                                    <th> CNE </th>
                                    <th> Email </th>
                                    <th> Type </th>
                                    <th> ACTION </th>
                                  </tr>
                                </thead>
                                <tfoot style=" visibility: hidden;">
                                  <tr>
                                     <th> ID </th>
                                    <th> Nom </th>
                                    <th> Telephone </th>
                                    <th> Adresse </th>
                                    <th> CIN </th>
                                    <th> CNE </th>
                                    <th> Email </th>
                                    <th> Type </th>
                                    <th> ACTION </th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                  @foreach($users as $data)
                                  <tr>
                                    <th >{{$data->id}} </th>
                                    <td >{{$data->name}} </td>
                                    <td >{{$data->phone}}</td>
                                    <td >{{$data->adress}}</td>
                                    <td >{{$data->cni}}</td>
                                    <td >{{$data->cne}}</td>  
                                    <td >{{$data->email}}</td>
                                    <td >{{$data->usertype}}</td>
              
                                  
                                    <td >
                                      <a href="javascript:void(0);"
                                        class="btn btn-primary edit">
                                        <i class="fa fa-pencil"></i>
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-danger delete" >
                                        <i class="fa fa-trash-o "></i>
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>


                      <script type="text/javascript">

                      $(document).ready(function() {

                      var table = $('#datatable').DataTable();
                       
                       //edit start 

                      table.on('click', '.edit', function(){

                      $tr = $(this).closest('tr');

                      if($($tr).hasClass('child'))
                      {
                        $tr = $tr.prev('.parent');
                      }
                      
                      var data = table.row($tr).data();
                      console.log(data);

                      $('#name').val(data[1]);
                      $('#phone').val(data[2]);
                      $('#adress').val(data[3]);
                      $('#cni').val(data[4]);
                      $('#cne').val(data[5]);
                      $('#email').val(data[6]);
                      $('#usertype').val(data[7]);
                      $('#editForm').attr('action', '/admin-etudiants/'+data[0]);
                      $('#editModal').modal('show');


                       });

                       //edit end

                       //delete start 
                       table.on('click', '.delete', function(){

                      $tr = $(this).closest('tr');

                      if($($tr).hasClass('child'))
                      {
                        $tr = $tr.prev('.parent');
                      }
                      
                      var data = table.row($tr).data();
                      console.log(data);

                      //$('#id').val(data[0]);
                     

                       $('#deleteForm').attr('action', '/admin-etudiants/'+data[0]);
                       $('#deleteModal').modal('show');


                       });
 



                 }); 
                      </script>
        

@endsection