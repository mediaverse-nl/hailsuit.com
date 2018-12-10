<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ContactController extends Controller
{
    use FormBuilderTrait;

    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $form = $this->formBuilder->create(ContactStoreForm::class, [
//            'method' => 'POST',
//            'url' => route('contact.store')
//        ]);
        return view('contact.index');
    }

    //make a request to the database.
    /**
     * @param ContactStoreRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactStoreRequest $request)
    {
//        dd($request->message);

        Mail::to($request->email)->send(new ContactFormMail($request));

        return redirect()->back();
    }

}
