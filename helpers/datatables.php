<?php

/**
 * This helper was made for get list data from database with easy use
 * Support for pagination data
 *
 * Created by: Akbar Triasno Syamsul
 *
 * @param array     $request
 * @param array     $components
 *
 * Parameters inside $request variable
 * @var int         $request->post('start')     | the start of get data from database
 * @var int         $request->post('length')    | data length to display
 * @var string      $request->post('sort')      | data sorting to display
 * @var string      $request->post('field')     | field to sorting
 * @var string      $request->post('search')    | query for search value
 *
 * Parameters inside $components variable
 * @var array       $components['model']        | call a model
 * @var string      $components['func']         | name of function inside model
 *
 * @return json
 */
function createTables($request = null, $components = null, $extraParam = null, $mode = 'list')
{
    if (!$request)
        return setResponse(400);

    if (!$components)
        return setResponse(400);

    // Try to validate model parameter
    try {
        $model = $components['model'];
    } catch (Exception $e) {
        return setResponse([
            'code' => 400,
            'message' => '_model_ parameter is not defined'
        ]);
    }

    // Try to validate func parameter
    try {
        $func = $components['func'];
    } catch (Exception $e) {
        return setResponse([
            'code' => 400,
            'message' => '_func_ parameter is not defined'
        ]);
    }

    // Method for catch data request, default: GET
    $method = (isset($components['method'])) ? $components['method'] : 'get';

    // Get params
    $start = $request->start;
    $perpage = $request->length;
    $sort = $request->sort;
    $field = $request->field;
    $search = $request->search;
    $searchCol = $request->searchCol;

    // Try to manage on search query
    $pattern = '/[^a-zA-Z0-9 !@#$%^&*\/\.\,\(\)-_:;?\+=]/u';
    $search = preg_replace($pattern, '', $search);

    if (!$perpage)
        return setResponse(400);

    // Get result for page showing
    $page = ($start / $perpage) + 1;

    if ($page >= 0) {
        if ($mode == 'list') {
            $result = $model->$func([
                'start' => $start,
                'length' => $perpage,
                'field' => $field,
                'sort' => $sort,
                'count' => false
            ], $search, $searchCol, $extraParam);
            $total = $model::all()->count();

            $data = [
                'data' => [
                    'page' => $page,
                    'length' => $perpage,
                    'totalRecords' => $total,
                    'totalDisplayRecords' => count($result),
                    'searchKeyword' => $search,
                    'searchColumn' => $searchCol,
                    'data' => $result
                ]
            ];
        } else {
            $total = $model->$func([
                'start' => $start,
                'length' => $perpage,
                'field' => $field,
                'sort' => $sort,
                'count' => true
            ], $search, $searchCol, $extraParam);

            $data = [
                'data' => [
                    'totalRecords' => $total
                ]
            ];
        }
    } else {
        $result = $model::orderBy($field, $sort)->get();
        $total = $model::all()->count();

        $data = [
            'data' => [
                'page' => $page,
                'totalRecords' => $total,
                'totalDisplayRecords' => count($result),
                'data' => $result
            ]
        ];
    }

    return setResponse($data);
}
