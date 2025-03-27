<div id="bottom-footer" class="z-50 fixed bottom-10 right-0 flex hidden flex-col items-end">
    <div class="flex flex-col w-full justify-end overflow-hidden px-2" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
        <div class="mb-4">
            <button id="toggle-audio" onclick="toggleAudio()" class="cursor-pointer rounded-full bg-{{ $color }}-500 px-4 py-2 text-sm text-white hover:bg-{{ $color }}-600">
                <i class="fas fa-pause"></i>
            </button>
            <audio id="background-audio" loop="">
                @if (isset($invitation))
                    @if ($invitation->audio->file)
                        <source src="{{ Storage::url($invitation->audio->file) }}" type="audio/mp3" />
                    @endif
                @else
                    <source src="{{ asset('/') }}assets/audios/play-audio.php" type="audio/mp3" />
                @endif
            </audio>
        </div>

        <button id="scrollUp" onclick="scrollUp()" class="cursor-pointer rounded-full bg-{{ $color }}-500 px-4 py-2 text-sm text-white hover:bg-{{ $color }}-600">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
</div>
