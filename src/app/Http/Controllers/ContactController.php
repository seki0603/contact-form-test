<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = new Contact($request->all());
        $contact->tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->all();
        Contact::create($contact);

        return view('thanks');
    }
}
