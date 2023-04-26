<?php

namespace App\Http\Livewire\Admin;

use App\Models\Homeslider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $link;
    public $offer;
    public $status;
    public $image;

    public function addSlide()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'link' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);
        $slide = new Homeslider();
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
        $slide->link = $this->link;
        $slide->status = $this->status;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider',$imageName);
        $slide->image = $imageName;
        $slide->save();
        session()->flash('message','Slider has been added');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
