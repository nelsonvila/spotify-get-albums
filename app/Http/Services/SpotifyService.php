<?php


namespace App\Http\Services;


use App\Http\Resources\AlbumResource;
use Illuminate\Support\Facades\Http;

class SpotifyService
{
    private $clientId;
    private $clientSecret;
    private $accessToken;
    private $redirectUri = 'http://127.0.0.1:8000/';

    public function __construct()
    {
        $this->clientId = config('spotify.clientId');
        $this->clientSecret = config('spotify.clientSecret');
        $this->accessToken = $this->getToken();
    }

    public function getToken()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)
            ])->asForm()
                ->post('https://accounts.spotify.com/api/token', [
                    'redirect_uri' => $this->redirectUri,
                    'grant_type' => 'client_credentials'
                ]);

            return $response->json()['access_token'];
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function handleAlbumsSearch($request)
    {
        if($request->q!=null){
            $bandName = str_replace('-', '%20', $request->q);
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken])
                ->get('https://api.spotify.com/v1/search?q=' . $bandName . '&type=album&market=ES&limit=50&offset=5');
            return AlbumResource::collection($response->object()->albums->items);
        }
        return response()->json(["message" => "No band name specified"], 400);


    }

}
