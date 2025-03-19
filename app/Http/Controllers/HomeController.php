<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Price;
use App\Models\Service;
use App\Models\Template;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Inbox;
use Illuminate\Support\Facades\Mail;
use App\Mail\InboxMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $services     = Service::orderBy('order', 'asc')->get();
        $testimonials = Testimonial::where('status', true)->orderBy('id', 'desc')->get();
        $prices       = Price::orderBy('order', 'asc')->get();
        $templates    = Template::where('status', true)->orderBy('id', 'desc')->limit('6')->get();

        return view('index', compact('services', 'testimonials', 'prices', 'templates'));
    }

    public function inbox_store(Request $request)
    {
        $ip       = $request->ip();
        $cacheKey = 'inbox_count_' . $ip;

        if (Cache::has($cacheKey)) {
            $count = Cache::get($cacheKey);
            if ($count >= 100) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'You have reached the message limit, please try again later.',
                ], 429);
            }
        } else {
            $count = 0;
        }

        $validator = Validator::make($request->all(), [
            'name'    => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:3000',
        ], [
            'name.regex' => 'The name can only contain letters and spaces.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data            = $validator->validated();
        $data['message'] = strip_tags($request->input('message'));
        $inbox           = Inbox::create($data);

        $siteConifgs     = App::make('siteConfigs');
        $email_recipient = $siteConifgs['email']->value;
        if ($email_recipient) {
            Mail::to([$email_recipient])->send(new InboxMail($inbox));
        }

        Cache::put($cacheKey, $count + 1, now()->addMinutes(60));

        return response()->json([
            'status'  => 'success',
            'message' => 'Message sent successfully!',
        ]);
    }

    public function template()
    {
        $templates = Template::where('status', true)->orderBy('id', 'desc')->paginate(6);

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

        if ($guest_name) {
            $guest_name = str_replace(['-', '%20'], ' ', $guest_name);
        } else {
            $guest_name = 'Kamu dan Partner';
        }

        if (view()->exists('templates.' . $folderName . '.' . $fileName)) {
            return view('templates.' . $folderName . '.' . $fileName, compact('invitation', 'guest_name'));
        } else {
            abort(404);
        }
    }
}
