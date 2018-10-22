<?php

if (!function_exists('Translator')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function Translator($key, $textEditor = false)
    {
        $lang = Lang::locale();
        $langs = new \App\AppLanguage();
        $translation = new \App\Translation();

        $currentLang = $langs->getLangFromCode($lang);

        foreach($currentLang->get() as $lg){
            $trans = $translation
                ->where('key_name',  '=', $key)
                ->where('language_id', '=', $lg->id);

            if ($trans->count() === 0){
                $translation->insert([
                    'key_name' => $key,
                    'language_id' => $lg->id,
                    'text' => '',
                ]);
            }
        }

        $text = $translation->where('language_id', '=', $currentLang->id)
            ->where('key_name', '=', $key)
            ->first()->text;

        if ($textEditor){
            return view('components.text-editor')
                ->with('text', $text);
        }

        return $text;
    }
}
