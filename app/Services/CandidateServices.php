<?php

namespace App\Services;

use App\DataTransferObject\CandidateData;
use App\DataTransferObject\FilterDataTableData;
use App\Models\Candidates;
use Illuminate\Support\Facades\DB;

class CandidateServices
{
    public function createCandidate(CandidateData $data)
    {
        try {
            DB::beginTransaction();

            $created = Candidates::create($data->all());

            DB::commit();

            return setResponse([
                'message' => 'Created successfully !',
                'data' => CandidateData::from($created)
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return setResponse([
                'message' => 'Data create failed !',
                'code' => 422,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function updateCandidate(CandidateData $data)
    {
        try {
            DB::beginTransaction();

            $record = Candidates::find($data->id);
            if (!$record)
                return response()->json([
                    'message' => 'Data not found'
                ], 404);

            $record->update($data->all());

            DB::commit();

            return setResponse([
                'message' => 'Update successfully !',
                'data' => CandidateData::from($record)
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return setResponse([
                'message' => 'Data update failed !',
                'code' => 422,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function deleteCandidate($candidateId)
    {
        try {
            DB::beginTransaction();

            $record = Candidates::find($candidateId);
            if (!$record)
                return response()->json([
                    'message' => 'Data not found'
                ], 404);

            $record->delete();

            DB::commit();

            return setResponse([
                'message' => 'Delete candidate ' . $record->full_name . ' success !'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return setResponse([
                'message' => 'Failed to delete !',
                'code' => 422,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function getCandidate($candidateId)
    {
        try {
            if(!$candidateId) throw new \Exception('Data tak found'); 

            $record = Candidates::find($candidateId);

            return setResponse([
                'message' => 'Data found !',
                'data' => CandidateData::from($record)
            ]);

        } catch (\Throwable $th) {

            return setResponse([
                'message' => 'Data not found',
                'detail' => $th->getMessage(),
                'code' => 404,
            ]);
        }
    }

    public function getDataTableCandidate(FilterDataTableData $tableParams)
    {
        return createTables($tableParams, [
            'model' => new Candidates(),
            'func' => 'getDataTable'
        ]);
    }
}
