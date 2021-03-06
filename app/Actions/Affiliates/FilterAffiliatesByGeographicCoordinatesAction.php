<?php

namespace App\Actions\Affiliates;

use Illuminate\Support\Collection;

class FilterAffiliatesByGeographicCoordinatesAction
{
    /**
     * @param Collection $affiliates
     * @return Collection
     * 
     */
    public function execute(Collection $affiliates): Collection
    {
        $filteredAffiliates = collect([]);
        $affiliates->each(function ($affiliate) use ($filteredAffiliates) {
            if ($affiliate->isCloseToOffice()) {
                $filteredAffiliates->push($affiliate);
            }
        });
        return $filteredAffiliates->sortBy(['affiliate_id']);
    }
}
