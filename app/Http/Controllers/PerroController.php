<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerroRequest;
use App\Models\Perro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Label;
use Spatie\FlareClient\Http\Response as HttpResponse;
class PerroController extends Controller
{
    public function createPerro(PerroRequest $request)
    {
       try {
            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->foto = $request->foto;
            $perro->descripcion= $request->descripcion;
            $perro->sexo = $request->sexo;
            $perro->save();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
       
       
    }

    public function listarPerros()
    {
        $perro = Perro::all();
        return response()->json(["perros" => $perro], Response::HTTP_OK);
    }

    public function verPerro( Perro $perro)
    {
        try {
            $dog = Perro::findOrFail($perro->id);
            return response()->json(["perro" => $dog], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Perro no encontrado'], Response::HTTP_NOT_FOUND);
        }
    }

    public function updatePerro(PerroRequest $request, Perro $perro)
    {
        try {
            $perro->update($request->validated());
            return response()->json(['message' => 'Actualización exitosa'], Response::HTTP_OK);
         } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el perro'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function eliminarPerro(Perro $perro)
    {
        try {
            $perro->delete();
            return response()->json(['message' => 'perro eliminado correctamente'], Response::HTTP_OK);
         } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el perro'], Response::HTTP_BAD_REQUEST);
        }
    }

}
