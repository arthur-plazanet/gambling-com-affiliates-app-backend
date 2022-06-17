<?php

namespace App\Http\Controllers;

use App\Actions\Affiliates\FilterAffiliatesByGeographicCoordinatesAction;
use App\Http\Resources\AffiliateResource;
use App\Interfaces\AffiliateRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AffiliateController extends Controller
{
    /**
     * @var AffiliateRepositoryInterface
     */
    private AffiliateRepositoryInterface $affiliateRepository;

    /**
     * @var FilterAffiliatesByGeographicCoordinatesAction
     */
    private FilterAffiliatesByGeographicCoordinatesAction $filterAffiliatesByGeographicCoordinatesAction;

    /**
     * @param AffiliateRepositoryInterface $affiliateRepository
     * @param FilterAffiliatesByGeographicCoordinatesAction $filterAffiliatesByGeographicCoordinatesAction
     *
     */
    public function __construct(
        AffiliateRepositoryInterface $affiliateRepository,
        FilterAffiliatesByGeographicCoordinatesAction $filterAffiliatesByGeographicCoordinatesAction
    ) {
        $this->affiliateRepository = $affiliateRepository;
        $this->filterAffiliatesByGeographicCoordinatesAction = $filterAffiliatesByGeographicCoordinatesAction;
    }

    /**
     * @return JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        return response()->json(AffiliateResource::collection($this->filterAffiliatesByGeographicCoordinatesAction->execute($this->affiliateRepository->getAllAffiliates())));
    }
}
