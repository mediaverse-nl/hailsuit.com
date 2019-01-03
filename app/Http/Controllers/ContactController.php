<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\ContactFormMail;
use App\Mail\contactFormMailCopy;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ContactController extends Controller
{
    use SEOTools;

    use FormBuilderTrait;

    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource..
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $this->seo()->setTitle(Translator('seo_contact_title', 'text', true, 'home').' | hailsuit.com');
        $this->seo()->setDescription(Translator('seo_contact_description', 'text', true, ''));
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->twitter()->setSite(Translator('seo_twitter_username', 'text', true, '@username'));

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
        Mail::to($request->email)->send(new ContactFormMail($request)); //the confirmation mail
        Mail::to('info@hailsuit.com')->send(new ContactMessageMail($request)); //the mail to the
        return redirect()->back();
    }

}
