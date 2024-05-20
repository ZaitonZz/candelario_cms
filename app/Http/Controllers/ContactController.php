<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        // Honeypot validation
        // if ($request->input('honeypot') !== "") {
        //     return response()->json(['error' => 'Bot detected'], 400);
        // }

        // reCAPTCHA validation
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');
        $recaptchaResponse = $request->input('recaptchaToken');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse
        ]);

        $responseData = $response->json();

        if (!$responseData['success']) {
            return response()->json(['error' => 'CAPTCHA verification failed'], 422);
        }

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message
        ContactMessage::create($validatedData);

        return response()->json(['success' => 'Form submitted successfully']);
    }
    public function index()
    {
        $contact = Contact::first();

        return response()->json($contact);
    }
}
