<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Contactos;

class ContactosController extends Controller
{
    public function read(Request $request){
        $contact = new Contactos();

        if($request ->query("id")){
            $Contactos = $contact->find($request->query("id"));
        }else{
            $Contactos = $contact->all();
        }
        
        return response()->json($Contactos);
        
    }       

    public function create(Request $request){

        $contact = new Contactos();

        $contact->nombre = $request->input("nombre");
        $contact->correo = $request->input("correo");
        $contact->text = $request->input("text");

        $contact->save();

        $message=["message" => "Registro Exitoso!!"];

        return response()->json($message,Response::HTTP_CREATED);
        
        // return response()->json($message,Response::201);
    }


    
    public function update(Request $request){


        $idContact = $request->query("id");

        $contact = new Contactos();

        $contactParticular = $contact->find($idContact);

        $contactParticular->nombre = $request->input("nombre");
        $contactParticular->correo = $request->input("correo");
        $contactParticular->texto = $request->input("text");


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

        $contact = new Contactos();

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
