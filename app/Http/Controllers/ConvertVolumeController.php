<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertVolumeController extends Controller
{
    public function __invoke($value, $unit)
    {
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de volumen según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'liters':
            // Conversión de litros a galones americanos
                $result = $value * 0.264172;
                break;
            case 'gallons':
            // Conversión de galones americanos a litros
                $result = $value / 0.264172;
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        return response()->json(['result' => $result]);
    }
}
