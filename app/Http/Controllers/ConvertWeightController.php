<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    public function __invoke($value, $unit)
    {
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        switch (strtolower($unit)) {
            case 'kilograms':
             // Conversión de kilogramos a libras
                $result = $value * 2.20462;
                break;
            case 'pounds':
            // Conversión de libras a kilogramos
                $result = $value / 2.20462;
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        return response()->json(['result' => $result]);
    }
}
