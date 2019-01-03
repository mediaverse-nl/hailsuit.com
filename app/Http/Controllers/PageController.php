<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools;

class PageController extends Controller
{
    use SEOTools;

    protected $faq;

    public function __construct(FAQ $faq)
    {
        $this->faq = $faq;
    }

    public function terms(){
        return view('pages.terms');
    }

    public function privacy(){
        return view('pages.privacy');
    }

    public function cookie(){
        return view('pages.cookie');
    }

    public function warranty(){
        return view('pages.warranty');
    }

    public function returns(){
        return view('pages.returns');
    }

    public function delivery(){
        return view('pages.delivery');
    }

    public function app(){
        return view('app');
    }

    public function faq(){
        $this->seo()->setTitle(Translator('seo_faq_title', 'text', true, 'home').' | hailsuit.com');
        $this->seo()->setDescription(Translator('seo_faq_description', 'text', true, ''));
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->twitter()->setSite(Translator('seo_twitter_username', 'text', true, '@username'));

        $faq = $this->faq->get();

        return view('faq')
            ->with('faqs', $faq);
    }
}
