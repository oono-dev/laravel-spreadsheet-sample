<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\GoogleSheet;
use App\Services\GoogleSheetService;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function writeSpreadSheet()
    {
        $sheets = GoogleSheetService::instance();
        $sheet_id = config('services.spreadsheet.sheet_id');

        $output = [
            $this->name,
            $this->email,
        ];

        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $output,
        ]);
        $params = ['valueInputOption' => 'USER_ENTERED'];
        $sheets->spreadsheets_values->append(
            $sheet_id,
            'A1',
            $values,
            $params
        );
    }
}
