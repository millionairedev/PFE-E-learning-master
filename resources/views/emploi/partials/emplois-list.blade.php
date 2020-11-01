<table class="table table-bordered table-hover ">
  @forelse($emplois as $emps)
  <thead>
    <tr>
      <th scope="col">Titre Emploi</th>
       <th scope="col">Ajouté le </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><a href="{{route('emploi.show',$emps->id)}}"> {{$emps->titre}}</a></td>
      <td><p> {{$emps->created_at->diffForHumans()}}</p></td>
     @empty
        <h5>Aucun emploi du temps</h5>
    </tr> 
    @endforelse
  </tbody>
</table>
