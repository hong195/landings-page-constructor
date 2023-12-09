<?php

namespace App\Observers;

use App\Models\Application;
use App\Models\Landing;
use App\Services\AmoCRM\AmoCrmService;
use Revolution\Google\Sheets\Facades\Sheets;

class ApplicationObserver
{
    public function __construct(private readonly AmoCrmService $amoCrmService){}

    public function saved(Application $application): void
    {
        $this->sendToGoogleSheets($application);

        $landing = Landing::findOrFail($application->data['landing_id']);
        $this->amoCrmService->send(
            $application->data['name'] ?? '',
            $application->data['phone'] ?? '',
                $landing->name,
        );
    }

    private function sendToGoogleSheets(Application $application) : void
    {
        $dataToAppend = [
            $application->data['name'] ?? '',
            $application->data['phone'] ?? '',
            $application->data['type'] ?? '',
            $application->created_at->toDateTimeString(),
        ];

        Sheets::spreadsheet(config('google.sheets.post_spreadsheet_id'))
            ->sheet(config('google.sheets.post_sheet_id'))
            ->append([$dataToAppend]);
    }
}
