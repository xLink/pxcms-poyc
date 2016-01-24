
<div class="container">
    <div class="row">
        @include(partial('poyc::frontend.team._nav'), compact('players'))
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="page-title">
                    {{ $player->name }}'s Dashboard
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="panel-default panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Gamemode Stats</h4>
                </div>
                <table class="panel-body table table-hover">
                    <thead>
                        <tr>
                            <th>Gamemode</th>
                            <th>Win Ratio</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Takedowns</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($gamemodes as $name => $mode)
                        @if (is_string($mode))
                            @continue
                        @endif

                        @set($losses, $mode->losses)
                        @if ($losses <= 0)
                            @set($losses, $mode->wins)
                        @endif

                        <tr>
                            <td>{{ $name }}</td>
                            <td>{{ $mode->wins === 0 ? '0' : 1-round($mode->wins/$losses, 2) }}</td>
                            <td>{{ $mode->wins }}</td>
                            <td>{{ $mode->losses or 'N/A' }}</td>
                            <td>{{ $mode->aggregatedStats->totalChampionKills + $mode->aggregatedStats->totalAssists }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>



    </div>
</div>

