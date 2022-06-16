<?php

namespace App\Http\Controllers;

use App\Http\Resources\AffiliateResource;
use App\Interfaces\AffiliateRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AffiliateController extends Controller
{
    private AffiliateRepositoryInterface $affiliateRepository;

    public function __construct(AffiliateRepositoryInterface $affiliateRepository)
    {
        $this->affiliateRepository = $affiliateRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json(AffiliateResource::collection($this->affiliateRepository->getAllAffiliates()));
    }
}
