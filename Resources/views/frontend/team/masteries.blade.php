
<div class="container">
    <div class="row">
        @include(partial('poyc::frontend.team._nav'), compact('players'))

        <div class="page-header">
            <h4 class="page-title"><img src="http://avatar.leagueoflegends.com/EUW1/{{ strtolower($player->name) }}.png" height="16" width="16" alt=""> {{ $player->name }}'s Top 10 Champion Masteries</h4>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Champion Name</th>
                    <th>Level</th>
                    <th>Points</th>
                    <th>Last Played Champion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masteries as $mastery)
                <tr>
                    <td>{{ $champions[$mastery->championId]->championStaticData->name }}</td>
                    <td>{{ $mastery->championLevel }}</td>
                    <td>{{ $mastery->championPoints }}</td>
                    <td>{!! array_get(date_array(($mastery->lastPlayTime/1000)), 'fuzzy') !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
