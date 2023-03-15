<?php

namespace App\Services;

use App\Constants\ProductConstant;
use App\Models\SeoLanding;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;

class WriteDataService
{
    public function write(): void
    {
        $template = file_get_contents(base_path('tools/template/test.txt'));
        $spreadsheet = IOFactory::load(public_path('template/xlsx/new.xlsx'));
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->toArray() as [$header, $goingId, $goalId]) {
            $replacements = [
                '{going}' => $goingId,
                '{goal}' => $goalId,
            ];

            $content = strtr($template, $replacements);

            $seo = new SeoLanding();
            $seo->setSeoH1(sprintf('بلیط هواپیما %s به %s', $goingId, $goalId));
            $seo->setContent($content);
            $seo->setAdminId(1); // set default
            $seo->setOriginId($goingId);
            $seo->setDestinationId($goalId);
            $seo->setSeoTitle(sprintf('بلیط هواپیما %s به %s | پرواز %s %s', $goingId, $goalId, $goingId, $goalId));
            $seo->setSeoDesc(sprintf('خرید آنلاین بلیط هواپیما %s %s از قاصدک 24 چارتر و سیستمی با پشتیبانی 24ساعته. برای اطلاع از قیمت بلیط ارزان هواپیما %s %s کلیک کنید.', $goingId, $goalId, $goingId, $goalId));
            $seo->setProduct(ProductConstant::TYPE_FLIGHT);
            $seo->setUpdatedAt(Carbon::now());

            $seo->save();
        }
    }
}
