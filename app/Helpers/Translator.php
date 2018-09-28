<?php

if (!function_exists('Translator')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function Translator($key)
    {
        $lang = Lang::locale();
        $langs = new \App\AppLanguage();
        $translation = new \App\Translation();

        $langs->getLangFromCode($lang);

        foreach($langs->get() as $lg){
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

        $translation->where('', '', '')->where('', '', '')->first()->text;

        return 'sadsadsad';
    }
}
