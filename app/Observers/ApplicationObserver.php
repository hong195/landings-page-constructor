<?php

namespace App\Observers;

use App\Models\Application;
use Revolution\Google\Sheets\Facades\Sheets;

class ApplicationObserver
{
    public function created(Application $application): void
    {
        $this->sendToGoogleSheets($application);
    }

    public function updated(Application $application): void
    {
        $this->sendToGoogleSheets($application);
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
