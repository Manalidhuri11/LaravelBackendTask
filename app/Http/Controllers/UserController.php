<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    
   
    public function create(Request $request)

    {
        
        $users = new Users;
       $users->FirstName = $request->name;
       $users->Email=$request->email;
       $users->Contact = $request->contact;
    $users->save();
       return response()->json($users);

    }
    public function show()
    {
        $users = Users::all();
        return response()->json($users);
    }

public function showById(Request $request, $id)
{
    $users = Users::find($id);
    
    return response()->json($users);

}

public function deleteMultipleuserswithson(Request $request){
   
    if($request->isMethod('delete')){
    $users = $request->all();
   
    Users::whereIn('Id', $users['user'])->delete();
    return response()->json(['message'=>'User Deleted'],202);
    }
    }
    public function deleteMultipleUsers($id)
    {
        
        $id = explode(",", $id);
        
        Users::whereIn('Id',$id)->delete();
        return response()->json(['message'=>'Users deleted success'],202);
   
    }


    public function deleteById($id) {
        $users = Users::find($id);
        DB::delete('delete from employees where id = ?',[$id]);
        
        return response()->json($users);
       
     }




 public function updateById(Request $request,$id) {
   

    $name = $request->input('name');
    $email = $request->input('email');
    $contact = $request->input('contact');
    DB::update('update employees set FirstName = ?, Email = ?, Contact = ? where Id = ?',[$name,$email,$contact,$id]);
    
    $users = Users::find($id);
    return response()->json($users);
   
 }

 
  
}
