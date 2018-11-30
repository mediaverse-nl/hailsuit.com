<?php

if (!function_exists('RouteTranslator')) {

    /**
     * description
     *
     * @param $key
     * @param $value
     * @return
     * @internal param $
     */
    function RouteTranslator($key, $value)
    {
        $siteContent = new \App\SiteContent();

        $trans = $siteContent
            ->where('key_name',  '=', $key);

        if ($trans->count() === 0){
            $newInstance = $siteContent->create([
                'key_name' => $key,
                'text_type' => 'text',
            ]);

            $siteContent->insertTranslation($newInstance, $value);
        }

        $text = $trans
            ->first()
            ->getTranslation();

//        dd($text,Lang::locale());
//        dd(App::getLocale());

//        if ($text == '' || $text == ' '){
//            return $siteContent
//                ->where('key_name', '=', $key)
//                ->first()
//                ->getTranslation(true);
//        }

        return $text;
    }
}
