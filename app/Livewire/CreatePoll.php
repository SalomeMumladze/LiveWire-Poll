<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

class CreatePoll extends Component
{
    public $title;
    public $options = [];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index){
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
            ->map(fn($optionName)=>['name' => $optionName])
            ->all()
        );
        // this fragment replaced foreach
        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(['name' => $optionName]);
        // }

        $this->reset(['title', 'options']);
    }
    
}
