<?php

use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

function cachedTranslate($text, $targetLocale = 'en')
{
    if (empty($text)) {
        return $text;
    }
    // Tạo khóa cache dựa trên nội dung và ngôn ngữ
    $cacheKey = "translation_" . md5($text) . "_{$targetLocale}";

    // Lưu cache trong 1 giờ (3600 giây)
    return Cache::remember($cacheKey, 86400, function () use ($text, $targetLocale) {
        $translator = new GoogleTranslate();
        $translator->setSource(); // Để auto-detect ngôn ngữ
        $translator->setTarget($targetLocale);
        return $translator->translate($text);
    });
}
