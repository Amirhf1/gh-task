<?php

namespace App\Http\Controllers;

use App\Services\WriteDataService;

class WriteDataController extends Controller
{
    protected WriteDataService $writeDataService;

    public function __construct(WriteDataService $writeDataService)
    {
        $this->writeDataService = $writeDataService;
    }

    public function index()
    {
        return $this->writeDataService->write();
    }
}
