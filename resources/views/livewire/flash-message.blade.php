<div>
  
    
    @if (session()->has('message'))
    <div  x-data="{isVisible:true}"
          x-init="
          setTimeout(() => {
              isVisible = false
          }, 1000)
          "
          x-show.transition.duration.1000ms="isVisible">
            <div class="bg-green-300 text-green-800 px-3 py-2 rounded">
                {{ session('message') }}
            </div>
    </div>
    @endif

</div>