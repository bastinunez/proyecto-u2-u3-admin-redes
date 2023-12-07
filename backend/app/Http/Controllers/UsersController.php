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
                "nombre" => $request->nombre,
            ]);
            return response()->json(['message' => 'Éxito al guardar el usuario']);
        }catch(\Throwable $th){
            return response()->json(['message' => 'Error al guardar el usuario', 'error' => $th->getMessage()], 500);
        }
    }
    public function get_nombres(){
        $consulta = "SELECT * FROM usuarios";
        $resultados = DB::select($consulta);
        return $resultados;
    }
    // En tu controlador
    public function getCsrfToken()
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }

}