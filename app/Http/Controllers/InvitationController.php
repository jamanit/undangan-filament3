<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Request $request, ?string $id = null, ?string $wedding_couple_name = null, ?string $guest_name = null)
    {
        $invitation = Invitation::findOrFail($id);
        $parameterParts = explode('-', $invitation->template->parameter);
        $folderName = $parameterParts[0];
        $fileName = $invitation->template->parameter;

        if (view()->exists('templates.' . $folderName . '.' . $fileName)) {
            return view('templates.' . $folderName . '.' . $fileName, compact('invitation', 'guest_name'));
        } else {
            abort(404);
        }
    }
}
