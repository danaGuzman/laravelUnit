<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertTemperatureController extends Controller
{
    public function __invoke($value, $unit)
    {
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de temperatura según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'celsius':
            // Conversión de Celsius a Fahrenheit
                $result = ($value * 9 / 5) + 32;
                break;
            case 'fahrenheit':
            // Conversión de Fahrenheit a Celsius
                $result = ($value - 32) * 5 / 9;
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        return response()->json(['result' => $result]);
    }
}
