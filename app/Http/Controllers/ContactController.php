<?php

namespace App\Http\Controllers;

use App\Forms\ContactStoreForm;
use Illuminate\Http\Request;
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
        $form = $this->formBuilder->create(ContactStoreForm::class, [
            'method' => 'POST',
            'url' => route('contact.store')
        ]);

        return view('contact.index')->with('form', $form);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        return redirect()->back();
    }

}
