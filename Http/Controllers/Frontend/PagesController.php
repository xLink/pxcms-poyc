<?php namespace Cms\Modules\Poyc\Http\Controllers\Frontend;

class PagesController extends BaseController
{
    public $layout = '1-column';
    protected $service;

    public function boot()
    {
        parent::boot();
        $this->service = app('Cms\Modules\Poyc\Services\TeamService');
    }

    private function getData($playerName)
    {
        $players = $this->service->getTeamInfo();
        $player = head(array_filter($players, function($row) use($playerName) {
            return str_slug($row->name) == $playerName;
        }));

        return compact('players', 'player');
    }

    public function getIndex()
    {


        return $this->setView('frontend.team.dashboard', [
            'players' => $this->service->getTeamInfo()
        ]);
    }

    public function getBasicData($playerName)
    {
        $data = $this->getData($playerName);
        if (array_get($data, 'player', null) === null) {
            return abort(404);
        }

        // get ranked details
        $stats = $this->service->getSummonerStats($data['player']->id);

        $gamemodes = [
            'Unranked 3s' => 'Unranked3x3',
            'Aram' => 'AramUnranked5x5',
            'Ranked Team 3s' => 'RankedTeam3x3',
            'Ranked Team 5s' => 'RankedTeam5x5',
            'Solo Queue' => 'RankedSolo5x5',
        ];

        // dd($stats);

        foreach ($gamemodes as $key => $mode) {
            if ($gamemodes[$key] != $mode) {
                continue;
            }

            foreach ($stats as $row) {
                if ($row->playerStatSummaryType == $mode) {
                    $gamemodes[$key] = $row;
                    continue;
                }
            }
        }
// dd($gamemodes);
        // get matches details


        return $this->setView('frontend.team.basic', $data+[
            'stats' => $stats,
            'gamemodes' => $gamemodes,
        ]);
    }

    public function getMasteries($playerName)
    {
        $data = $this->getData($playerName);
        if (array_get($data, 'player', null) === null) {
            return abort(404);
        }

        $masteries = $this->service
                ->getMasteries($data['player']->id);

        // get a list of champions
        $championIds = [];
        foreach  ($masteries as $mastery) {
            $championIds[] = $mastery->championId;
        }

        // grab the champion data
        $champions = $this->service
            ->getChampionData($championIds);

        return $this->setView('frontend.team.masteries', $data+[
            'masteries' => $masteries,
            'champions' => $champions,
        ]);
    }

    public function getDebug($playerName)
    {
        $data = $this->getData($playerName);
        if (array_get($data, 'player', null) === null) {
            return abort(404);
        }

        return $this->setView('frontend.team.debug', $data+[
        ]);
    }


}
