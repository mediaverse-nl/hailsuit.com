<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('Translator')) {

    /**
     * description
     *
     * @param richtext  / richtext  / text
     * @return
     */
    function Translator($key, $textType = false, $hideEditorBtn = false, $value = false, $options = null)
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
                'option' => json_encode($options),
            ]);

            if ($value){
                $siteContent->insertTranslation($newInstance, $value);
            }else{
                $siteContent->insertTranslation($newInstance, ' ');
            }
        }else{
            $trans->update([
                'option' => json_encode($options),
                'text_type' => $textType,
            ]);
        }

        $text = $siteContent
            ->where('key_name', '=', $key)
            ->first()
            ->getTranslation();


        if(Auth::check() && $hideEditorBtn == false){
            return view('components.admin-text-tool')
                ->with('trans', $trans)
                ->with('text', $text);
        }

        if (isset($options))
        {
            foreach ($options['mentions'] as $key => $v)
            {
                $text = str_replace('@'.$key, $v, $text);
            }
        }

        return $text;
    }
}
