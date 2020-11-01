<?php
namespace App\Http\Controllers;
          
use App\User;
use Illuminate\Http\Request;
use DataTables;
        
class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('Admin.Utilisateurs.index')->with('users',$users);
    }


     public function store(Request $request)
    {

    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'adress'=>'required',
        'cni'=>'required',
        'cne'=>'required',
        'email'=>'required',
        'filiere'=>'required',
        'usertype'=>'required',

    ]);

    $usrs = new User;
    $usrs->name = $request->input('name');
    $usrs->phone = $request->input('phone');
    $usrs->email = $request->input('email');
    $usrs->adress = $request->input('adress');
    $usrs->cni = $request->input('cni');
    $usrs->cne = $request->input('cne');
    $usrs->filiere = $request->input('filiere');
    $usrs->usertype = $request->input('usertype'); 
    $usrs->save();

   return redirect('/admin-roles')->with('success','Utilisateur ajouté !');
    }



    public function update(Request $request, $id)
    {

    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'adress'=>'required',
        'cni'=>'required',
        'cne'=>'required',
        'email'=>'required',
        'filiere'=>'required',
        'usertype'=>'required',

    ]);

    $usrs = User::find($id);
    $usrs->name = $request->input('name');
    $usrs->phone = $request->input('phone');
    $usrs->email = $request->input('email');
    $usrs->adress = $request->input('adress');
    $usrs->cni = $request->input('cni');
    $usrs->cne = $request->input('cne');
    $usrs->filiere = $request->input('filiere');
    $usrs->usertype = $request->input('usertype'); 
    $usrs->save();


   return redirect('/admin-roles')->with('success','Utilisateur modifié ');
    }


    public function destroy($id)
    {
      $usrs = User::find($id);
      $usrs->delete();
     return redirect('/admin-roles')->with('success','Utilisateur supprimé ');
    }
}
