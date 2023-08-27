<?php

namespace App\Http\Controllers\API\v1;

use App\DataTransferObject\CandidateData;
use App\DataTransferObject\FilterDataTableData;
use App\Http\Controllers\Controller;
use App\Services\CandidateServices;

class CandidateController extends Controller
{
    protected $candidateServices;
    public function __construct(CandidateServices $_candidateServices)
    {
        $this->candidateServices = $_candidateServices;
    }

    public function StoreCandidate(CandidateData $request)
    {
        return $this->candidateServices->createCandidate($request);
    }

    public function UpdateCandidate(CandidateData $request)
    {
        return $this->candidateServices->updateCandidate($request);
    }

    public function DeleteCandidate($candidateId = null)
    {
        return $this->candidateServices->deleteCandidate($candidateId);
    }

    public function GetCandidate($candidateId = null)
    {
        return $this->candidateServices->getCandidate($candidateId);
    }

    public function GetDataTableCandidate(FilterDataTableData $request)
    {
        return $this->candidateServices->getDataTableCandidate($request);
    }
}
