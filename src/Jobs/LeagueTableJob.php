<?php

namespace Iteearmah\Footystats\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LeagueTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $league;
    private $season;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $league, string $season = null)
    {
        $this->league = $league;
        $this->season = $season;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // API to get league table from footystats.org
        $key = config('footystats.api_key');
        $api = "https://api.footystats.org/league-tables?key={$key}&league_id={$this->league}";
        if ($this->season)
        {
            $api .= "&season_id={$this->season}";
        }
        $leagueTableJson = Http::get($api)->json();
        if (!empty($leagueTableJson['data']))
        {
            $leagueTableData = $leagueTableJson['data']['league_table'];
            foreach ($leagueTableData as $key => $leagueTableDataItem)
            {
               //dd($leagueTableDataItem);
            }
        }
    }
}