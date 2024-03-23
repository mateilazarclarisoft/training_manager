<?php

namespace App\Charts;

use App\Models\Tag;
use App\Models\SessionDrill;
use Fidum\ChartTile\Charts\Chart;
use Fidum\ChartTile\Contracts\ChartFactory;

class TagsChart implements ChartFactory
{
    public static function make(array $settings): ChartFactory
    {
        return new static;
    }

    public function chart(): Chart
    {
        $chart = new Chart();

        $tags = Tag::select('id','name')->get();

        $data = [];

        foreach ($tags as $tag){
            $data[] = SessionDrill::select('session_drills.id')
                ->join("drills","drills.id","=","session_drills.drill_id")
                ->join("drill_tags","drill_tags.drill_id","=","drills.id")
                ->join("tags","drill_tags.tag_id","=","tags.id")
                ->where("tag_id",$tag->id)
                ->count();
        }

        $total = array_sum($data);
        $data = array_map(
            function($element,$total){
                return (int)($element*100/$total);
            },
            $data,
            array_fill(0,count($data),$total)
        );


        $chart->labels($tags->pluck('name'))
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => true,
                'tooltip' => [
                    'show' => true // or false, depending on what you want.
                ],
                'animation' => [
                    'duration' => 0,
                ],
                'legend' => [
                    'display' => true,
                    'position' => 'right',
                ],
                'scales' => [
                    'xAxes' => ['display' => false],
                    'yAxes' => ['display' => false],
                ],
            ])
            ->dataset('Tags', 'doughnut', $data)
            ->backgroundColor(['#FF9CEE', '#B28DFF', '#6EB5FF', '#BFFCC6','#FFFF83','#FFD683','#FF8398','#AE513D','#A4E6E8']);
#
        return $chart;
    }
}