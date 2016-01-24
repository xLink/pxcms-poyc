
<div class="container">
    <div class="row">
        @include(partial('poyc::frontend.team._nav'), compact('players'))

        <div class="page-header">
            <h4 class="page-title"><img src="http://avatar.leagueoflegends.com/EUW1/{{ strtolower($player->name) }}.png" height="16" width="16" alt=""> {{ $player->name }}'s Debug Page</h4>
        </div>

        @debug($player)
    </div>
</div>
