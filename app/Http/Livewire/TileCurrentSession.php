<?php

namespace App\Http\Livewire;

use App\Models\Session;
use Livewire\Component;
use App\Models\SessionDrill;

class TileCurrentSession extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {
        $session = Session::select('id','name')
            ->orderBy('created_at','desc')
            ->first();
            
        $drills = SessionDrill::select('drills.id','drills.name','drills.description','drills.link','session_drills.id as session_drill_id')
            ->join("drills","drills.id","=","session_drills.drill_id")
            ->where("session_id","=",$session->id)
            ->get();

        return view('livewire.tile-current-session',compact('session','drills'));
    }
}
