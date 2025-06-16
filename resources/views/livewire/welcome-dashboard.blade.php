<div class="min-h-screen bg-base-200 flex flex-col items-center p-4 sm:p-8">

    <div class="text-center my-4 md:my-8"><h1 class="text-4xl md:text-5xl font-bold text-primary">SEA Catering
            Project</h1>
        <p class="py-4 text-base md:text-lg">Project initialization successful. Welcome to your launchpad!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl">

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body flex flex-col">
                <h2 class="card-title">Technology Status</h2>
                <ul class="list-none space-y-2 mt-4 flex-grow">
                    <li class="flex items-center text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Laravel v12</span>
                    </li>
                    <li class="flex items-center text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Livewire v3</span>
                    </li>
                    <li class="flex items-center text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Tailwind CSS v3</span>
                    </li>
                    <li class="flex items-center text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Daisy UI</span>
                    </li>
                </ul>
                <div wire:poll.1s="refreshTime" class="mt-4 p-4 bg-base-200 rounded-lg text-center">
                    <p>Current Server Time:</p>
                    <p class="font-mono text-lg">{{ $currentTime }}</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body flex flex-col">
                @if($allLevelsCompleted)
                    <div class="flex flex-grow">
                        <div class="text-center m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-success inline-block"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h2 class="card-title text-3xl mt-4 block">Luar Biasa!</h2>
                            <p class="mt-2">Anda telah menyelesaikan semua persiapan. <br> Saatnya membangun aplikasi
                                sesungguhnya!</p>
                        </div>
                    </div>
                @else
                    <h2 class="card-title">Next Steps (Level {{ $currentLevel }} Checklist)</h2>
                    @if(isset($tasks[$currentLevel]))
                        <div class="form-control flex-grow space-y-2 mt-4">
                            @foreach($tasks[$currentLevel] as $index => $task)
                                <label class="label cursor-pointer justify-start gap-4">
                                    <input type="checkbox"
                                           class="checkbox checkbox-primary"
                                           wire:model.live="tasks.{{ $currentLevel }}.{{ $index }}.completed"
                                        @disabled($currentLevel < $highestLevelReached) />
                                    <span
                                        class="label-text text-sm md:text-base whitespace-normal break-words">{{ $task['text'] }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="card-actions justify-between items-center mt-4 min-h-[48px]">
                            <div wire:loading wire:target="nextLevel, previousLevel, finish" class="w-full text-center">
                                <span class="loading loading-spinner loading-md"></span>
                            </div>

                            <div wire:loading.remove wire:target="nextLevel, previousLevel, finish"
                                 class="w-full flex justify-between items-center">

                                {{-- Tombol Kembali --}}
                                @if($currentLevel > 1)
                                    <button wire:click="previousLevel" class="btn btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                                        </svg>
                                        <span class="hidden sm:inline ml-2">Kembali</span>
                                    </button>
                                @else
                                    <div></div>
                                @endif
                                @if($currentLevel < $highestLevelReached)
                                    <button wire:click="nextLevel" class="btn btn-primary">
                                        <span class="hidden sm:inline mr-2">Lanjut</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                        </svg>
                                    </button>
                                @elseif($this->isCurrentLevelComplete)
                                    @if($currentLevel < 5)
                                        <button wire:click="nextLevel" class="btn btn-primary">
                                            <span
                                                class="hidden sm:inline mr-2">Lanjut ke Level {{ $currentLevel + 1 }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                            </svg>
                                        </button>
                                    @elseif($currentLevel == 5)
                                        <button wire:click="finish" class="btn btn-success">
                                            <span class="hidden sm:inline mr-2">Selesai</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="flex-grow">Level tidak ditemukan.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
