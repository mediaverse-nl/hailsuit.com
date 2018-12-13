<?php

if (!function_exists('Translator')) {

    /**
     * description
     *
     * @param richtext  / richtext  / text
     * @return
     */
    function Translator($key, $textType = false, $textEditor = false, $value = false)
    {
        $siteContent = new \App\SiteContent();

        $trans = $siteContent
            ->where('key_name',  '=', $key);

        if ($textType == false){
            $textType = 'text';
        }

        if ($trans->count() === 0){
            $newInstance = $siteContent->create([
                'key_name' => $key,
                'text_type' => $textType,
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
