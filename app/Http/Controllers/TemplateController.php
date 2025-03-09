<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(?string $parameter = null)
    {
        $parameterParts = explode('-', $parameter);
        $folderName = $parameterParts[0];
        $fileName = $parameter;

        if (view()->exists('templates.' . $folderName . '.' . $fileName)) {
            return view('templates.' . $folderName . '.' . $fileName);
        } else {
            abort(404);
        }
    }
}
