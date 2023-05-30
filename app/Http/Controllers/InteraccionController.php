<?php

namespace App\Http\Controllers;
use Exception;
use App\Http\Requests\InteraccionRequest;
use App\Models\Interaccion;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;
class InteraccionController extends Controller
{
    public function createInteraccion(InteraccionRequest $request)
    {
        try {
            $interaccion = new Interaccion();
            $interaccion->perroInteresado = $request->perro_interesado_id;
            $interaccion->perroCandidato = $request->perro_candidato_id;
            $interaccion->preferancia = $request->preferencia;
            $interaccion->save();
            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
