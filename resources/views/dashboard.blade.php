<x-dashboard>
    <livewire:time-weather-tile position="a1:a2" />
    <livewire:tile-current-session position="b1:d1" />
    <livewire:chart-tile chartFactory="{{App\Charts\TagsChart::class}}" position="b2:d2" height="90%"/>
</x-dashboard>