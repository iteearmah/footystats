<?php

namespace Iteearmah\Footystats\Console\Commands;

use Illuminate\Console\Command;
use Iteearmah\Footystats\Jobs\LeagueTableJob;

class LeagueTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:league-table {--league=} {--season=} {--history}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch league table from api';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function handle()
    {
        $league = $this->option('league');
        $season = $this->option('season');

        dispatch(new LeagueTableJob($league, $season));
    }
}