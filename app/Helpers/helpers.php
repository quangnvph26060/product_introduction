<?php

use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('cachedTranslate')) {
    function cachedTranslate($content, $targetLocale = 'en')
    {
        if (empty($content)) {
            return $content;
        }

        // Xác định xem nội dung có chứa HTML không
        $isHtml = strip_tags($content) !== $content;

        // Tạo khóa cache
        $cacheKey = ($isHtml ? "translation_html_" : "translation_") . md5($content) . "_{$targetLocale}";

        // Lưu cache trong 1 ngày (86400 giây)
        return Cache::remember($cacheKey, 86400, function () use ($content, $targetLocale, $isHtml) {
            $translator = new GoogleTranslate();
            $translator->setSource(); // Auto-detect language
            $translator->setTarget($targetLocale);

            if ($isHtml) {
                // Dịch nội dung HTML
                return preg_replace_callback('/>([^<]+)</', function ($matches) use ($translator) {
                    $text = trim($matches[1]);
                    return $text ? '>' . $translator->translate($text) . '<' : '><';
                }, $content);
            } else {
                // Dịch nội dung văn bản thuần
                return $translator->translate($content);
            }
        });
    }
}
