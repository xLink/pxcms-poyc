    <ul class="nav nav-tabs" role="tablist">
    @foreach ($players as $player)
        <li role="presentation" class="dropdown">
            <a href="{{ route('poyc.player.basic', ['player' => str_slug($player->name)]) }}" class="dropdown-toggle" data-toggle="dropdown" ole="button" aria-haspopup="true" aria-expanded="false">
                {{ $player->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('poyc.player.basic', ['player' => str_slug($player->name)]) }}">Dashboard</a></li>
                <li><a href="{{ route('poyc.player.masteries', ['player' => str_slug($player->name)]) }}">Masteries</a></li>
                <li><a href="{{ route('poyc.player.debug', ['player' => str_slug($player->name)]) }}">Debug</a></li>
            </ul>
        </li>
    @endforeach
    </ul>
