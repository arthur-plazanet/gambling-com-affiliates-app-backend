<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Affiliate extends Model
{
    use HasFactory;

    const EARTH_RADIUS = 6371000;
    const OFFICE_LATITUDE = 53.3340285;
    const OFFICE_LONGITUDE = -6.2535495;

    protected $fillable = [
        'affiliate_id',
        'name',
        'latitude',
        'longitude'
    ];

    /**
     * Function to know if the Affiliate geographic coordinates
     * are close to the Dublin office.
     * @return bool
     *
     */

    public function isCloseToOffice(): bool
    {
        $officeLatitude = deg2rad(Affiliate::OFFICE_LATITUDE);
        $officeLongitude = deg2rad(Affiliate::OFFICE_LONGITUDE);
        $pointLatitude = deg2rad($this->latitude);
        $pointLongitude = deg2rad($this->longitude);
        $absoluteLongitude = abs($officeLongitude - $pointLongitude);
        $earthRadius = Affiliate::EARTH_RADIUS;

        $centralAngle = acos(sin($officeLatitude) * sin($pointLatitude)
            + cos($officeLatitude) * cos($pointLatitude) * cos($absoluteLongitude));
        $distance = $earthRadius * $centralAngle;
        return $distance <= 100000;
    }
}
