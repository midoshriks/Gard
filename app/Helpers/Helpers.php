<?php

use Spatie\MediaLibrary\MediaCollections\Models\Media;

if (!function_exists('display')) {

    // $lang = app()->getLocale();
    // dd($lang);

    function display(String $text = null)
    {
        $orig_text = $text;
        $locale =  app()->getLocale() == "" ? 'ar' : app()->getLocale();
        // dd($locale);
        if (isset($locale)) {
            app()->setLocale($locale);
        }
        // dd($locale);
        $language = app()->getLocale();
        // dd($language);
        $text = \Illuminate\Support\Str::limit($text, 150);

        if (!empty($text)) {
            $cacheId = str_replace(' ', '_', $text) . '.' . $language . '.language';
            $cacheExpiration = (int) config('system_settings.cache_expiration', 1440); // Cache for 1 day (60 * 24)
            return Cache::remember($cacheId, $cacheExpiration, function () use ($text, $language) {

                $row = \DB::table('languages')->where('phrase', '=', $text)->first();

                if ($row && optional($row)->$language) {
                    return $row->$language;
                } else {
                    if (!$row) {
                        $text2 = str_replace('_', ' ', $text);
                        $text2 = ucfirst($text);
                        \DB::insert('insert into languages (phrase, en, ar) values (?, ?, ?)', [$text, $text2, $text2]);
                        $row = \DB::table('languages')->where('phrase', '=', $text)->first();
                        return $row->$language;
                    }
                }

            });
        } else {
            return $orig_text;
        }
        return $text;
    }
}
