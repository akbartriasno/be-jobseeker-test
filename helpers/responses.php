<?php
/**
 * This helper was made for masking response()->json() for easy to use
 * This helper provide many message response for default code
 *
 * Created by: Akbar Triasno Syamsul
 *
 * @param array     $params
 * @param int       $params
 *
 * $params can be array if you set the array value
 * $params can be int if you just send the response code
 *
 * Parameters inside $params variable
 * @var array       $data       | the return data
 * @var int         $code       | custom response code
 * @var string      $message    | custom response message
 * @var string      $title      | custom response title
 *
 * @return json
 */
function setResponse($params = null) {

    if (!$params)
        return response()->json([], 400);

    $data = (isset($params['data'])) ? $params['data'] : null;
    $code = (isset($params['code'])) ? $params['code'] : 200;
    $message = (isset($params['message'])) ? $params['message'] : null;
    $title = (isset($params['title'])) ? $params['title'] : null;

    if (!is_array($params)) {
        if (is_int($params))
            $code = $params;
    }

	switch ($code) {
		case 200:
			$defaultStatus = 'OK';
			$defaultMessage = 'Success';
		break;
		case 201:
			$defaultStatus = 'OK';
			$defaultMessage = 'Success Created';
		break;
        case 304:
			$defaultStatus = 'Not Modified';
			$defaultMessage = 'There was no new data to return.';
		break;
        case 400:
			$defaultStatus = 'Bad Request';
			$defaultMessage = 'The request was invalid or cannot be otherwise served.';
		break;
        case 401:
			$defaultStatus = 'Unauthorized';
			$defaultMessage = 'Missing or incorrect authentication credentials.';
		break;
        case 403:
			$defaultStatus = 'Forbidden';
			$defaultMessage = 'The request but it has been refused or access is not allowed.';
		break;
        case 404:
			$defaultStatus = 'Not Found';
			$defaultMessage = 'The URI requested is invalid or the resource requested.';
		break;
        case 406:
			$defaultStatus = 'Not Acceptable';
			$defaultMessage = 'Invalid request format.';
		break;
        case 410:
			$defaultStatus = 'Gone';
			$defaultMessage = 'This resource is gone. API endpoint has been turned off.';
		break;
        case 420:
			$defaultStatus = 'Enhance Your Calm';
			$defaultMessage = 'Rate limited.';
		break;
        case 422:
			$defaultStatus = 'Unprocessable Entity';
			$defaultMessage = 'The data is unable to be processed.';
		break;
        case 429:
			$defaultStatus = 'Too Many Requests';
			$defaultMessage = 'The apps rate limit having been exhausted for the resource.';
		break;
        case 500:
			$defaultStatus = 'Internal Server Error';
			$defaultMessage = 'Something is broken.';
		break;
        case 502:
			$defaultStatus = 'Bad Gateway';
			$defaultMessage = 'The apps is down, or being upgraded.';
		break;
        case 503:
			$defaultStatus = 'Service Unavailable';
			$defaultMessage = 'The server was overloaded with requests. Try again later.';
		break;
        case 504:
			$defaultStatus = 'Gateway timeout';
			$defaultMessage = 'The request couldn`t be serviced due to some failure within the internal stack.';
		break;
		default:
			$defaultStatus = 'Undefined';
			$defaultMessage = 'Undefined';
		break;
	}

	$title = ($title) ? $title : $defaultStatus;
	$message = ($message) ? $message : $defaultMessage;

	$result = [
        'title' => $title,
		'message'=>$message,
        'type' => ($code == 200) ? 'success' : 'error',
		'code' => $code,
		'data' => $data
    ];

	return response()->json($result, $code);
}
