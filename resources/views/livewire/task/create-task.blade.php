<?php

use Livewire\Volt\Component;
use WireUi\Traits\WireUiActions;
use App\Models\Task;

new class extends Component {
    
    public $title        = '';
    public $description  = '';

    public function save()
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);
        
        auth()->user()->tasks()->create(
            [
                'title' =>  $this->title,
                'description' => $this->description
            ]
        );
        
        
        /*
        $this->dispatchBrowserEvent('task-created');
        */
  
        $this->reset('title', 'description');

       //$this->emit('taskCreated');

       return redirect('/task');
    
    } 

   

}; ?>

<div>
    <div class="w-10/12 mx-auto">
       <form wire:submit="save" method="POST">   
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
            <x-button type="submit" black icon="save" label="Guardar" />
        </form>
         
    </div>

</div>
