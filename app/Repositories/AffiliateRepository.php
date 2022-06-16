<?php

namespace App\Repositories;

use App\Interfaces\AffiliateRepositoryInterface;
use App\Models\Affiliate;

class AffiliateRepository implements AffiliateRepositoryInterface
{
    protected $file;

    public function __construct()
    {
        $this->file = file(config('constants.AFFILIATES_FILE_PATH'));
    }

    public function getAllAffiliates()
    {
        $affiliates = collect([]);

        foreach ($this->file as $line) {
            $affiliateData = json_decode($line, true);
            $affiliates->push(new Affiliate([
                'affiliate_id' => $affiliateData['affiliate_id'],
                'name' => $affiliateData['name'],
                'latitude' => $affiliateData['latitude'],
                'longitude' => $affiliateData['longitude'],
            ]));
        }

        return $affiliates;
    }
}
