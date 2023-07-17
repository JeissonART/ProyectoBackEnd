<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function read(Request $request){
        $contact = new Usuario();

        if($request ->query("id")){
            $Usuario = $contact->find($request->query("id"));
        }else{
            $Usuario = $contact->all();
        }
        
        return response()->json($Usuario);
        
    }       

    public function create(Request $request){

        $contact = new Usuario();

        $contact->nombre = $request->input("name");
        $contact->apellido = $request->input("lastname");
        $contact->tipoid = $request->input("typeid");
        $contact->numid = $request->input("numid");
        $contact->telefono = $request->input("phone");
        $contact->correo = $request->input("email");
        $contact->profesion = $request->input("profession");
        $contact->tipodeusuario = $request->input("userType");

        $contact->save();

        $message=["message" => "Registro Exitoso!!"];

        return response()->json($message,Response::HTTP_CREATED);
        
        // return response()->json($message,Response::201);
    }

    
    public function update(Request $request){


        $idContact = $request->query("id");

        $contact = new Usuario();

        $contactParticular = $contact->find($idContact);

        $contactParticular->nombre = $request->input("name");
        $contactParticular->apellido = $request->input("lastname");
        $contactParticular->tipoid = $request->input("typeid");
        $contactParticular->numid = $request->input("numid");
        $contactParticular->telefono = $request->input("phone");
        $contactParticular->correo = $request->input("email");
        $contactParticular->profesion = $request->input("profession");
        $contactParticular->tipodeusuario = $request->input("userType");


        $contactParticular->save();

        $message=[
            "message" => "Actualización Exitosa!!",
            "idContact" => $request->query("id"),
            "nameContact"=>$contactParticular->name
        ];

        return $message;
    }

        

    public function delete(Request $request){

        $idContact = $request->query("id");

        $contact = new Usuario();

        $contactParticular = $contact->find($idContact);

        $contactParticular->delete();

        $message=[
            "message" => "Eliminación Exitosa!!",
            "idContact" => $request->query("id"),
        ];

        return $message;
    }
    //
}
