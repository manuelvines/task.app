<?php

use Livewire\Volt\Component;
use App\Models\Task;

new class extends Component {
    //

    public function with() : array
    {
       return [
           'tasks' => Auth::user()
           ->tasks()
           ->orderBy('completed_at', 'asc')
           ->paginate()
       ];
    }


    public function toggleTask(Task $task)
    {
    
        $task->completed_at = $task->completed_at ? null : now();
        $task->save(); 
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }
    

}; ?>

<div class="w-11/12 mx-auto">

<x-button black label="Agregar tarea" icon="plus" wire:navigate href="{{route('task.create') }}"  />

 

<div class="relative mt-4 overflow-x-auto">
    <table class="w-full mb-4 text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Tarea
                </th>
                <th scope="col" class="px-6 py-3">
                   Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                   Editar
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Completado 
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Borrar 
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task )
                <tr wire:key="{{$task->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $task->title  }}
                    </th>
                    <td class="px-6 py-4">
                        @if($task->completed_at) 
                         <wire:<x-badge positive label="Completado" />
                        @else
                         <wire:<x-badge negative label="Incompleto" />
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('task.edit', $task ) }}" wire:navigate/>
                         Editar
                        </a>  
                    </td>
                    <td class="text-center">
                        @if($task->completed_at) 
                         <x-button.circle negative icon="x" wire:click="toggleTask('{{$task->id}}')"/>  
                        @else
                         <x-button.circle  positive icon="check"  wire:click="toggleTask('{{$task->id}}')"/> 
                        @endif
                    </td>
                    <td class="text-center" >
                        <x-button.circle positive icon="trash"  wire:click="destroy('{{$task->id}}')"/> 
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
</div>


    {{ $tasks->links() }}

</div>
