<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertSpeedController extends Controller
{
    public function __invoke($value, $unit)
    {
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de velocidad según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'kilometers':
            // Conversión de kilómetros por hora a millas por hora
                $result = $value * 0.621371;
                break;
            case 'miles':
            // Conversión de millas por hora a kilómetros por hora
                $result = $value / 0.621371;
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        return response()->json(['result' => $result]);
    }
}
