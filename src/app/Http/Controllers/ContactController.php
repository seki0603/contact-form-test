<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = new Contact($request->all());
        // 電話番号を1つに結合
        $contact->tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        // 修正時の処理
        if ($request->has('return')) {
            $tel = $request->input('tel');
            $tel1 = substr($tel, 0, 3);
            $tel2 = substr($tel, 3, 4);
            $tel3 = substr($tel, 7);

            return redirect('/')->withInput($request->except('tel') + [
                'tel1' => $tel1,
                'tel2' => $tel2,
                'tel3' => $tel3,
            ]);

            // 送信時の処理
        } elseif ($request->has('send')) {
            $contact = $request->only([
                'category_id',
                'first_name',
                'last_name',
                'gender',
                'email',
                'tel',
                'address',
                'building',
                'detail'
            ]);
            Contact::create($contact);
            return view('thanks');
        }
    }
}
