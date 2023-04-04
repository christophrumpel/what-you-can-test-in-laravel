<?php

use App\Http\Controllers\CsvUploadController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

uses(RefreshDatabase::class);

it('uploads CSV file', function () {
    // Arrange
    Storage::fake('uploads');
    $file = UploadedFile::fake()->image('statistics.csv');

    // Act
    $this->post(action(CsvUploadController::class), [
        'file' => $file,
    ])->assertOk();

    // Assert
    Storage::disk('uploads')->assertExists($file->hashName());
});
