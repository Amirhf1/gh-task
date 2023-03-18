<?php

namespace Tests\Feature;

use App\Constants\ProductConstant;
use App\Services\WriteDataService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class WriteDataServiceTest extends TestCase
{
    use RefreshDatabase;

    protected WriteDataService $writeDataService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->writeDataService = new WriteDataService();
    }

    public function test_write_method_creates_seo_landing_records()
    {
        // Arrange
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $expectedGoings = 1093;
        $expectedGoals = 33;

        // Act
        $response = $this->get(route('index'));

        // Assert
        $response->assertStatus(ResponseAlias::HTTP_OK);
        $this->assertDatabaseHas('seo_landings', [
            'seo_h1' => sprintf('بلیط هواپیما %s به %s', $this->writeDataService->findCity($expectedGoings), $this->writeDataService->findCity($expectedGoals)),
            'origin_id' => $expectedGoings,
            'destination_id' => $expectedGoals,
            'seo_title' => "بلیط هواپیما $expectedGoings به $expectedGoals | پرواز $expectedGoings $expectedGoals",
            'seo_desc' => "خرید آنلاین بلیط هواپیما $expectedGoings $expectedGoals از قاصدک 24 چارتر و سیستمی با پشتیبانی 24ساعته. برای اطلاع از قیمت بلیط ارزان هواپیما $expectedGoings $expectedGoals کلیک کنید.",
            'product' => ProductConstant::TYPE_FLIGHT,
        ]);

        $this->assertFileExists(public_path('template/xlsx/new.xlsx'));
    }
}
