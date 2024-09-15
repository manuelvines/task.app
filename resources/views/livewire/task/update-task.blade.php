<?php

use App\Models\Task;

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new  class extends Component {
 
    public $task;
    public $title;
    public $description;
    

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
    }

    public function save()
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);
        
        $this->task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        return redirect('/task');


        
    }	

   
}; ?>

<div>



    <div class="w-10/12 mx-auto">
       <form wire:submit="save">   
            <div class="mb-4">
                  <x-input
                    label="Título" 
                    wire:model="title"
                    placeholder="your name"/>
            </div>
          
            <div class="mb-4">
                <x-input  
                label="Descripción" 
                wire:model="description"
                placeholder=""
                />
            </div>
            <x-button type="submit" black icon="save" label="Actualizar" />
        </form>
         
    </div>

</div>

