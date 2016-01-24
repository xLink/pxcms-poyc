<?php namespace Cms\Modules\Poyc\Services;


class TeamService extends LeagueApi {

    public function getTeamInfo() {
        $summoners = $this
            ->api
            ->summoner()
            ->remember(3600, $this->cache)
            ->info([
                52740229, // xlinkuk
                24240708, // dyce
                37587971, // jimmy
                24055678, // stoo
                43852385, // gav
                33931020, // darkcos
                19730953, // blaine
                24240329, // winslow
                18996045, // mop
                22231876, // pete
            ]);

        return $summoners;
    }

    public function getMasteries($summonerId, $count = 10) {
        $champions = $this
            ->api
            ->championMastery()
            ->remember(3600, $this->cache)
            ->topChampions($summonerId, $count);

        return $champions;
    }

    public function getAllChampions() {
        $this->api->attachStaticData(true);
        $champions = $this
            ->api
            ->champion()
            ->remember(3600, $this->cache)
            ->all();

        return last((array) $champions);
    }

    public function getChampionData($championIds) {
        $champions = $this->getAllChampions();

        $champions = array_filter($champions['champions'], function($champ) use($championIds) {

            return in_array($champ->id, $championIds);
        });

        return $champions;
    }

    public function getSummonerStats($summonerId) {
        $stats = $this->api
            ->stats()
            ->summary($summonerId);

        return last((array) $stats)['playerStatSummaries'];
    }

}
