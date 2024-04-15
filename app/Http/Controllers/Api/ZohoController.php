<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ZohoToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ZohoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $token_uri;
    private $config;
    private $base_uri;
    private $version;
    private $auth_token;
    public function __construct()
    {
        $this->token_uri = env('ZOHO_TOKEN_URI');
        $this->base_uri = env('ZOHO_BASE_URI');
        $this->version = env('VERSION');
        $this->config = array(
            'client_id' => env('ZOHO_CLIENT_ID'),
            'client_secret' => env('ZOHO_CLIENT_SECRET'),
            'refresh_token' => env('ZOHO_REFRESH_T0KEN'),
            'grant_type' => 'refresh_token'
        );
    }

    public function access_token()
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => 'ok', 'result' => null];
        $token = ZohoToken::first();
        if (empty($token) || $this->isTokenExpired($token)) {
            $result = $this->generateAccessToken();
            if (!empty($result) && isset($result['result']['access_token'])) {
                $json_data = $this->prepareTokenData($result, $token ? $token->id : null);
            } else {
                $json_data['result'] = $result['result'];
            }
        } else {
            $json_data = $this->prepareSuccessResponse($token->access_token);
        }
        return $json_data;
    }

    private function isTokenExpired($token) {
        $diffSeconds = Carbon::now()->diffInSeconds($token->updated_at);
        return $diffSeconds > 900;
    }

    private function generateAccessToken()
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => 'ok', 'result' => null];
        try {
            $response = Http::post($this->token_uri . http_build_query($this->config));
            if ($response->ok() && isset($response['access_token'])) {
                $json_data = $this->prepareSuccessResponse($response['access_token']);
            } else {
                $json_data['result'] = $response->json();
            }
        } catch (\Throwable $th) {
            $json_data['result'] = $th->getMessage();
        }
        return $json_data;
    }

    private function prepareSuccessResponse($accessToken)
    {
        return [
            'code' => 200,
            'status' => 'success',
            'message' => 'ok',
            'result' => ['access_token' => $accessToken]
        ];
    }

    private function prepareTokenData($data, $id = null)
    {
        $access_token = $data['result']['access_token'];

        if (!empty($id)) {
            $update = ZohoToken::find($id);
            $update->access_token = $access_token;
            $update->updated_at = Carbon::now();
            $update->save();
        } else {
            $insertData = [
                'access_token' => $access_token,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            ZohoToken::create($insertData);
        }

        return $this->prepareSuccessResponse($access_token);
    }

    public function event_types(Request $request)
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => 'ok', 'result' => null];
        $this->auth_token = $request->access_token;
        $url = $this->base_uri . "api/{$this->version}/finance.foundation_jsw/museum-ticketing/report/All_Event_Types";
        try {
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $this->auth_token])->get($url);
            if ($response->ok()) {
                return array_merge($json_data, ['code' => 200, 'status' => 'success', 'message' => 'ok', 'result' => $response->json()]);
            } else {
                return array_merge($json_data, ['status' => 'error', 'result' => $response->json()]);
            }
        } catch (\Throwable $th) {
            return array_merge($json_data, ['status' => 'error', 'result' => $th->getMessage()]);
        }
    }

    public function events(Request $request)
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => 'ok', 'result' => null];
        $event_type_id = $request->event_type_id;
        $id = $request->id;
        $this->auth_token = $request->access_token;
        if (empty($this->auth_token)) {
            $json_data['message'] = 'Authorization Bearer missing';
            return $json_data;
        }
        $url = $this->base_uri . "api/{$this->version}/finance.foundation_jsw/museum-ticketing/report/Events_Detail_For_Immersion";
        if (!empty($event_type_id)) {
            $url .= "?Event_Types.ID=" . $event_type_id;
        } else if (!empty($id)) {
            $url .= "?ID=" . $id;
        }
        return $this->fetchApiData($url);
    }


    public function slots(Request $request)
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => 'ok', 'result' => null];
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if (empty($start_date)) {
            $json_data['message'] = '`start_date` is missing';
            return $json_data;
        }
        $this->auth_token = $request->access_token;
        if (empty($this->auth_token)) {
            $json_data['message'] = 'Authorization Bearer missing';
            return $json_data;
        }
        $url = $this->base_uri . "api/{$this->version}/finance.foundation_jsw/museum-ticketing/report/Museum_Open_Ticket_for_Immersion";
        $date_fields = $this->constructDateFields($start_date, $end_date, 'Date_field');
        if(!empty($date_fields)) {
            $url .= "?$date_fields";
        }
        return $this->fetchApiData($url);
    }

    private function constructDateFields($start_date, $end_date, $filter_type)
    {
        $date_fields = "$filter_type=$start_date";

        if (!empty($end_date)) {
            $date_fields .= ";$end_date&" . $filter_type . "_op=58";
        }

        return $date_fields;
    }


    private function fetchApiData($url)
    {
        $json_data = ['code' => 404, 'status' => 'error', 'message' => null, 'result' => null];
        try {
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $this->auth_token])->get($url);
            if ($response->ok()) {
                return array_merge($json_data, ['code' => 200, 'status' => 'success', 'result' => $response->json()]);
            } else {
                return array_merge($json_data, ['message' => $response->json()]);
            }
        } catch (\Throwable $th) {
            return array_merge($json_data, ['message' => $th->getMessage()]);
        }
    }
}
