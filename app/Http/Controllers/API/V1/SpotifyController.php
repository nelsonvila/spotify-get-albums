<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\ListProviderpendingResuorce;
use App\Http\Services\SpotifyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpotifyController extends Controller
{
    private $service;

    public function __construct(SpotifyService $service)
    {
        $this->service = $service;
    }

    /**
     * Display the discographies by band name.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAlbums(Request $request)
    {
        $response = $this->service->handleAlbumsSearch($request);
        return $response;
    }
}
