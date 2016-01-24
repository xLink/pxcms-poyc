<?php namespace Cms\Modules\Poyc\Services;

use LeagueWrap\Api as lApi;

class LeagueApi {

    protected $api = null;
    protected $cache;

    public function __construct()
    {
        $this->cache = new LeagueLaravelCache();

        if (app()->environment('local')) {
            $this->api = new lApi(env('LEAGUE_API_LOCAL'));
        } else if (app()->environment('production')) {
            $this->api = new lApi(env('LEAGUE_API_PRODUCTION'));
        }

        // set region
        $this->api->setRegion('euw');

        // Set a limit of 10 requests per 10 seconds
        $this->api->limit(10, 10);

        // Set a limit of 500 requests per 600 (10 minutes) seconds
        $this->api->limit(500, 600);
    }



}
