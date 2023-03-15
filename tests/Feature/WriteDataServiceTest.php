<?php

namespace Tests\Feature;

use App\Constants\ProductConstant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class WriteDataServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_write_method_creates_seo_landing_records()
    {
        // Arrange
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $expectedGoings = ['1093'];
        $expectedGoals = ['33'];

        // Act
        $response = $this->get(route('index'));

        // Assert
        $response->assertStatus(ResponseAlias::HTTP_OK);
        foreach ($expectedGoings as $goingId) {
            foreach ($expectedGoals as $goalId) {
                $this->assertDatabaseHas('seo_landings', [
                    'seo_h1' => "بلیط هواپیما $goingId به $goalId",
                    'origin_id' => $goingId,
                    'destination_id' => $goalId,
                    'seo_title' => "بلیط هواپیما $goingId به $goalId | پرواز $goingId $goalId",
                    'seo_desc' => "خرید آنلاین بلیط هواپیما $goingId $goalId از قاصدک 24 چارتر و سیستمی با پشتیبانی 24ساعته. برای اطلاع از قیمت بلیط ارزان هواپیما $goingId $goalId کلیک کنید.",
                    'product' => ProductConstant::TYPE_FLIGHT,
                ]);
            }
        }

        $this->assertFileExists(public_path('template/xlsx/new.xlsx'));
    }
}
