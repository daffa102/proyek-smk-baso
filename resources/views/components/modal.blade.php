@props(['name', 'title'])

<div x-data="{ show: false, name: '{{ $name }}' }"
     x-show="show"
     x-on:open-modal.window="show = ($event.detail === name || $event.detail.name === name)"
     x-on:close-modal.window="show = false"
     x-on:keydown.escape.window="show = false"
     style="display: none;"
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Backdrop -->
    <div x-show="show" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" 
         x-on:click="show = false"></div>

    <!-- Modal Content -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <div x-show="show"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-w-xl transform overflow-hidden rounded-[2.5rem] bg-white shadow-2xl transition-all">
            
            <!-- Header -->
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                <h3 class="text-xl font-black text-slate-900" id="modal-title">
                    {{ $title }}
                </h3>
                <button x-on:click="show = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            {{ $slot }}
        </div>
    </div>
</div>
