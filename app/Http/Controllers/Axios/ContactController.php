<?php

namespace App\Http\Controllers\Axios;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendGeneralContactRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @param SendGeneralContactRequest $request
     *
     * @return JsonResponse
     */
    public function sendGeneralContactForm(SendGeneralContactRequest $request): JsonResponse
    {
        //Getting mail data
        $mailData = $request->toArray();
        //Setting the receiver via config
        $receiver = config('mail.generalContactReceiver');
        //Sending the mail
        Mail::to($receiver)->send(new ContactFormMail($mailData));
        //Returning to view
        return response()->json(['message' => 'Uw bericht is verstuurd!']);
    }
}
