<?php

namespace App\Http\Livewire\Admin;

use App\Models\Homeslider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;

    public function deleteSlide()
    {
        $slide = Homeslider::find($this->slide_id);
        unlink('assets/imgs/slider/'.$slide->image);
        $slide->delete();
        session()->flash('message','Slider has been deleted');
    }

    public function render()
    {
        $slides = Homeslider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-home-slider-component',['slides'=>$slides]);
    }
}
