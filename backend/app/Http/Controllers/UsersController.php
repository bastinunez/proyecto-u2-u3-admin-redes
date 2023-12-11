<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UsersController extends Controller
{
    public function post_nombres(Request $request){
        try{
            DB::table("usuarios")->insert([
                "nombre" => $request->input('nombre')
            ]);
            return back()->with("success","usuario registrado correctamente");
        }catch(\Throwable $th){
            return back()->with("error","usuario no se registro");
        }
    }
    public function get_nombre(){
        $consulta = "SELECT * FROM usuarios";
        $resultados = DB::select($consulta);
        return response()->json($resultados);
    }
    // En tu controlador
    public function getCsrfToken()
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }

}