<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Price;
use App\Models\Service;
use App\Models\Template;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services     = Service::orderBy('order', 'asc')->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        $prices       = Price::orderBy('order', 'asc')->get();
        $templates    = Template::where('status', 'Publish')->orderBy('id', 'desc')->limit('6')->get();

        return view('index', compact('services', 'testimonials', 'prices', 'templates'));
    }

    public function template()
    {
        $templates = Template::where('status', 'Publish')->orderBy('id', 'desc')->paginate(6);

        return view('template', compact('templates'));
    }

    public function template_show(?string $parameter = null)
    {
        $parameterParts = explode('-', $parameter);
        $folderName     = $parameterParts[0];
        $fileName       = $parameter;

        if (view()->exists('templates.' . $folderName . '.' . $fileName)) {
            return view('templates.' . $folderName . '.' . $fileName);
        } else {
            abort(404);
        }
    }

    public function invitaion_show(Request $request, ?string $id = null, ?string $wedding_couple_name = null, ?string $guest_name = null)
    {
        $invitation     = Invitation::findOrFail($id);
        $parameterParts = explode('-', $invitation->template->parameter);
        $folderName     = $parameterParts[0];
        $fileName       = $invitation->template->parameter;

        if (view()->exists('templates.' . $folderName . '.' . $fileName)) {
            return view('templates.' . $folderName . '.' . $fileName, compact('invitation', 'guest_name'));
        } else {
            abort(404);
        }
    }
}
