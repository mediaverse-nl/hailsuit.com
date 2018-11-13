<?php

if (!function_exists('Translator')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function Translator($key, $textEditor = false, $value = false)
    {
        $siteContent = new \App\SiteContent();

        $trans = $siteContent
            ->where('key_name',  '=', $key);

        if ($trans->count() === 0){
            $newInstance = $siteContent->create([
                'key_name' => $key,
            ]);

            if ($value){
                $siteContent->insertTranslation($newInstance, $value);
            }else{
                $siteContent->insertTranslation($newInstance, ' ');
            }
        }

        $text = $siteContent
            ->where('key_name', '=', $key)
            ->first()
            ->getTranslation();

        if ($textEditor){
            return view('components.text-editor')
                ->with('text', $text);
        }

        return $text;
    }
}
