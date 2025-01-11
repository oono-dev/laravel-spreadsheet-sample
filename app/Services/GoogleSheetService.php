<?php

namespace App\Services;

class GoogleSheetService
{
    public static function instance() 
    {
        $credentials_path = storage_path('app/private/'.config('services.spreadsheet.credentials_name'));
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);

        return new \Google_Service_Sheets($client);
    }
}
