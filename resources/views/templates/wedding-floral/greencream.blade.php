@extends('templates.wedding-floral.layouts.app')

@push('wedding_couple_name', 'Wanita & Pria')

@section('content')
    @php
        $invitation = $invitation ?? null;
    @endphp

    <div class="flex items-center justify-end bg-primary-green-cream-400">
        <!-- bottom footer -->
        @include('templates.wedding-floral.layouts.bottom-footer', ['color' => 'primary-green-cream'])

        <!-- main background -->
        <div class="z-0 lg:w-1/3 fixed bottom-0 right-0 h-screen w-full">
            <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/0.png" class="inset-0 h-full w-full object-cover" alt="Cover Image" />
        </div>

        <!-- main content -->
        <div id="content" class="z-10 relative h-screen overflow-y-hidden lg:w-1/3">
            <!-- cover section -->
            <section id="cover-section" class="z-10 relative h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative h-full w-full flex items-center justify-center flex-col">
                    <p class="mb-4 text-base text-primary-green-cream-400 font-semibold" data-aos="fade-down">
                        {{ $invitation->template->invitation_type ?? 'UNDANGAN PERNIKAHAN' }}
                    </p>

                    <div class="flex flex-col items-center justify-center mb-4">
                        <div class="z-40 absolute flex flex-col text-center" data-aos="zoom-in">
                            <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">{{ $invitation->weddingCouple->bride_nickname ?? 'Wanita' }}</p>
                            <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">&</p>
                            <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">{{ $invitation->weddingCouple->groom_nickname ?? 'Pria' }}</p>
                        </div>
                        <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/11.png" class="z-30 w-full h-full" data-aos="zoom-in" />
                    </div>

                    <div data-aos="fade-up" data-aos-offset="50">
                        <div class="text-center border-2 border-primary-green-cream-500 rounded-lg p-2 bg-white/75">
                            <p class="text-base text-gray-600">Kepada Yth,</p>
                            <p class="text-base text-gray-600">Bapak/Ibu/Saudara/i</p>
                            <p class="text-base text-gray-600">{{ $guest_name ?? 'Kamu dan Partner' }}</p>
                        </div>

                        <button onclick="openInvitation()" class="cursor-pointer mx-auto mt-6 rounded-full bg-primary-green-cream-500 px-4 py-2 text-base text-white hover:bg-primary-green-cream-600">
                            <i class="fas fa-envelope"></i> BUKA UNDANGAN
                        </button>
                    </div>
                </div>
            </section>

            <!-- quote section -->
            <section id="quote-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative min-h-screen w-full px-4 py-8 flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-right">
                        Quote
                    </p>
                    @if ($invitation)
                        @if (!$invitation->quote)
                            <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                        @else
                            <div class="px-2">
                                <div class="mb-4 text-base text-primary-green-cream-400 text-justify" data-aos="fade-right">
                                    {!! $invitation->quote->text !!}
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="px-2">
                            <div class="mb-4 text-base text-primary-green-cream-400 text-justify" data-aos="fade-right">
                                <p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir."
                                <p>(QS Ar-Rum 21)</p>
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <!-- wedding couple section -->
            <section id="wedding-couple-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 px-4 py-8 relative min-h-screen w-full flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-down">
                        Wedding Couple
                    </p>

                    @if ($invitation)
                        @if (!$invitation->weddingCouple)
                            <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                        @else
                            <div class="px-2">
                                <div class="mb-4 text-center" data-aos="fade-down">
                                    <p class="font-sacramento text-2xl font-semibold text-white">{{ $invitation->weddingCouple->opening_greeting }}</p>
                                    <div class="text-base text-white">{!! $invitation->weddingCouple->text_greeting !!}</div>
                                </div>

                                <div class="mb-4 flex items-center space-x-4 justify-start" data-aos="fade-right">
                                    <img loading="lazy" src="{{ Storage::url($invitation->weddingCouple->bride_photo) }}" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-cream-400 object-cover" />
                                    <div class="text-left">
                                        <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">{{ $invitation->weddingCouple->bride_nickname }}</p>
                                        <p class="text-base text-white font-semibold">{{ $invitation->weddingCouple->bride_full_name }}</p>
                                        <p class="text-base text-white">Putri ke {{ $invitation->weddingCouple->bride_child_number }} dari</p>
                                        <p class="text-base text-white font-semibold">{{ $invitation->weddingCouple->bride_father_name }} & {{ $invitation->weddingCouple->bride_mother_name }}</p>
                                    </div>
                                </div>

                                <div data-aos="fade-left">
                                    <div class="mb-4 flex justify-center">
                                        <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">&</p>
                                    </div>
                                    <div class="mb-4 flex items-center space-x-4 justify-end">
                                        <div class="text-right">
                                            <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">{{ $invitation->weddingCouple->groom_nickname }}</p>
                                            <p class="text-base text-white font-semibold">{{ $invitation->weddingCouple->groom_full_name }}</p>
                                            <p class="text-base text-white">Putra ke {{ $invitation->weddingCouple->groom_child_number }} dari</p>
                                            <p class="text-base text-white font-semibold">{{ $invitation->weddingCouple->groom_father_name }} & {{ $invitation->weddingCouple->groom_mother_name }}</p>
                                        </div>
                                        <img loading="lazy" src="{{ Storage::url($invitation->weddingCouple->groom_photo) }}" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-cream-400 object-cover" />
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="px-2">
                            <div class="mb-4 text-center" data-aos="fade-down">
                                <p class="font-sacramento text-2xl font-semibold text-white">Assalamu'alaikum
                                    Warahmatullahi
                                    Wabarakatuh</p>
                                <p class="text-base text-white">Dengan memohon Rahmat dan Ridho Allah SWT kami bermaksud
                                    untuk
                                    mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:</p>
                            </div>

                            <div class="mb-4 flex items-center space-x-4 justify-start" data-aos="fade-right">
                                <img loading="lazy" src="{{ asset('/') }}assets/images/wedding-couples/girl.jpg" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-cream-400 object-cover" />
                                <div class="text-left">
                                    <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">Wanita</p>
                                    <p class="text-base text-white font-semibold">Nama Lengkap Wanita</p>
                                    <p class="text-base text-white">Putri ke 2 dari</p>
                                    <p class="text-base text-white font-semibold">Bapak & Ibu</p>
                                </div>
                            </div>

                            <div data-aos="fade-left">
                                <div class="mb-4 flex justify-center">
                                    <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">&</p>
                                </div>
                                <div class="mb-4 flex items-center space-x-4 justify-end">
                                    <div class="text-right">
                                        <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">Pria</p>
                                        <p class="text-base text-white font-semibold">Nama Lengkap Pria</p>
                                        <p class="text-base text-white">Putra ke 2 dari</p>
                                        <p class="text-base text-white font-semibold">Bapak & Ibu</p>
                                    </div>
                                    <img loading="lazy" src="{{ asset('/') }}assets/images/wedding-couples/boy.jpg" class="mb-2 h-36 w-28 rounded-b-[30%] rounded-t-[30%] border-4 border-primary-green-cream-400 object-cover" />
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <!-- event section -->
            <section id="event-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-right">
                        Events
                    </p>

                    @if ($invitation)
                        @if ($invitation->events->isEmpty())
                            <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                        @else
                            @php
                                $now = \Carbon\Carbon::now();
                                $upcomingEvent = $invitation->events
                                    ->filter(function ($event) use ($now) {
                                        return \Carbon\Carbon::parse($event->event_date)->greaterThan($now);
                                    })
                                    ->sortBy('event_date')
                                    ->first();
                                $countdownDate = $upcomingEvent ? $upcomingEvent->event_date . ' ' . $upcomingEvent->time : null;
                            @endphp

                            <div id="countdown" class="mb-4 flex justify-center gap-2" data-countdown="{{ $countdownDate }}" data-aos="fade-left">
                                <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                    <span id="days" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                    <div class="text-sm text-gray-600">Hari</div>
                                </div>
                                <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                    <span id="hours" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                    <div class="text-sm text-gray-600">Jam</div>
                                </div>
                                <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                    <span id="minutes" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                    <div class="text-sm text-gray-600">Menit</div>
                                </div>
                                <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                    <span id="seconds" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                    <div class="text-sm text-gray-600">Detik</div>
                                </div>
                            </div>

                            @foreach ($invitation->events->sortBy('event_date') as $event)
                                <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-right">
                                    <p class="mb-2 font-sacramento text-4xl font-semibold text-primary-green-cream-400">{{ $event->type }}</p>
                                    <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <p class="text-lg font-semibold">{{ \Carbon\Carbon::parse($event->time)->locale('id')->format('H:i') }} WIB</p>
                                    <p class="text-base">{{ $event->location }}</p>
                                    <p class="mb-4 text-base">{{ $event->address }}</p>
                                    @if ($event->map_url)
                                        <a href="{{ $event->map_url }}" target="_blank">
                                            <button class="cursor-pointer mx-auto mt-1 rounded-full bg-primary-green-cream-500 px-4 py-2 text-sm text-white hover:bg-primary-green-cream-600">
                                                <i class="fas fa-location-dot"></i> Lihat Lokasi
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div id="countdown" class="mb-4 flex justify-center gap-2" data-countdown="2050-10-23 08:00:00" data-aos="fade-left">
                            <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                <span id="days" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                <div class="text-sm text-gray-600">Hari</div>
                            </div>
                            <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                <span id="hours" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                <div class="text-sm text-gray-600">Jam</div>
                            </div>
                            <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                <span id="minutes" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                <div class="text-sm text-gray-600">Menit</div>
                            </div>
                            <div class="bg-white/75 border-2 border-primary-green-cream-500 rounded-lg p-2 shadow-lg w-15 text-center">
                                <span id="seconds" class="text-xl font-bold text-primary-green-cream-500">00</span>
                                <div class="text-sm text-gray-600">Detik</div>
                            </div>
                        </div>

                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-right">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-primary-green-cream-400">Akad Nikah</p>
                            <p class="text-lg font-semibold">Minggu, 23 Oktober 2025</p>
                            <p class="text-lg font-semibold">08:00 WIB</p>
                            <p class="text-base">Kediaman Mempelai Wanita</p>
                            <p class="mb-4 text-base">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, minus!</p>
                            <a href="#" target="_blank">
                                <button class="cursor-pointer mx-auto mt-1 rounded-full bg-primary-green-cream-500 px-4 py-2 text-sm text-white hover:bg-primary-green-cream-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-left">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-primary-green-cream-400">Resepsi</p>
                            <p class="text-lg font-semibold">Minggu, 23 Oktober 2025</p>
                            <p class="text-lg font-semibold">10:00 WIB</p>
                            <p class="text-base">Gedung Pernikahan</p>
                            <p class="mb-4 text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, praesentium!</p>
                            <a href="#" target="_blank">
                                <button class="cursor-pointer mx-auto mt-1 rounded-full bg-primary-green-cream-500 px-4 py-2 text-sm text-white hover:bg-primary-green-cream-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-right">
                            <p class="mb-2 font-sacramento text-4xl font-semibold text-primary-green-cream-400">Ngunduh Mantu
                            </p>
                            <p class="text-lg font-semibold">Minggu, 23 Oktober 2025</p>
                            <p class="text-lg font-semibold">08:00 WIB</p>
                            <p class="text-base">Kediaman Mempelai Pria</p>
                            <p class="mb-4 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, laudantium.</p>
                            <a href="#" target="_blank">
                                <button class="cursor-pointer mx-auto mt-1 rounded-full bg-primary-green-cream-500 px-4 py-2 text-sm text-white hover:bg-primary-green-cream-600">
                                    <i class="fas fa-location-dot"></i> Lihat Lokasi
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            <!-- gallery & streaming -->
            <section id="gallery-streaming-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="flip-left">
                        Galleries
                    </p>

                    @if ($invitation)
                        @if ($invitation->galleries->isEmpty())
                            <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                        @else
                            <div class="mb-4">
                                <div class="grid grid-cols-3 gap-6">
                                    @foreach ($invitation->galleries->sortBy('order') as $gallery)
                                        <a href="{{ Storage::url($gallery->photo) }}" data-fancybox="gallery" class="group relative">
                                            <div data-aos="flip-left">
                                                <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                                    <img loading="lazy" src="{{ Storage::url($gallery->photo) }}" alt="Image" class="h-[150px] w-full object-cover" />
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="mb-4">
                            <div class="grid grid-cols-3 gap-6">
                                <a href="{{ asset('/') }}assets/images/galleries/img-1.jpg" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img loading="lazy" src="{{ asset('/') }}assets/images/galleries/img-1.jpg" alt="Image 1" class="h-[150px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ asset('/') }}assets/images/galleries/img-2.jpg" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img loading="lazy" src="{{ asset('/') }}assets/images/galleries/img-2.jpg" alt="Image 2" class="h-[150px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ asset('/') }}assets/images/galleries/img-3.jpg" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img loading="lazy" src="{{ asset('/') }}assets/images/galleries/img-3.jpg" alt="Image 3" class="h-[150px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ asset('/') }}assets/images/galleries/img-4.jpg" data-fancybox="gallery" class="group relative">
                                    <div data-aos="flip-left">
                                        <div class="transform overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                                            <img loading="lazy" src="{{ asset('/') }}assets/images/galleries/img-4.jpg" alt="Image 4" class="h-[150px] w-full object-cover" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($invitation)
                        @if ($invitation->streaming)
                            <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="flip-left">
                                Streaming
                            </p>

                            @php
                                $youtubeUrl = $invitation->streaming->youtube_url;
                                if (strpos($youtubeUrl, 'watch?v=') !== false) {
                                    parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $urlParams);
                                    $videoId = $urlParams['v'] ?? '';
                                } elseif (strpos($youtubeUrl, 'shorts/') !== false) {
                                    $pathSegments = explode('/', parse_url($youtubeUrl, PHP_URL_PATH));
                                    $videoId = $pathSegments[2] ?? '';
                                } else {
                                    $videoId = '';
                                }
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            @endphp
                            <div class="mb-4" data-aos="flip-left">
                                <iframe class="rounded-lg" width="100%" height="250" src="{{ $embedUrl }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                        @endif
                    @else
                        <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="flip-left">
                            Streaming
                        </p>
                        <div class="mb-4" data-aos="flip-left">
                            <iframe class="rounded-lg" width="100%" height="250" src="https://www.youtube.com/embed/u_AzmF66dVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    @endif
                </div>
            </section>

            <!-- love story section -->
            <section id="love-story-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-up">
                        Love Stories
                    </p>

                    @if ($invitation)
                        @if ($invitation->loveStories->isEmpty())
                            <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                        @else
                            @foreach ($invitation->loveStories->sortBy('order') as $loveStory)
                                <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                                    <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-primary-green-cream-400">
                                        {{ $loveStory->title }}
                                    </p>
                                    <div class="text-justify text-base">
                                        {!! $loveStory->text !!}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                            <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-primary-green-cream-400">
                                2023 (Lorem ipsum dolor sit amet)
                            </p>
                            <p class="text-justify text-base">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quibusdam debitis magni animi
                                deserunt,
                                consectetur blanditiis quisquam exercitationem! Repellat, officia.
                            </p>
                        </div>
                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                            <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-primary-green-cream-400">
                                2023 (Lorem ipsum dolor sit amet)
                            </p>
                            <p class="text-justify text-base">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quibusdam debitis magni animi
                                deserunt,
                                consectetur blanditiis quisquam exercitationem! Repellat, officia.
                            </p>
                        </div>
                        <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 text-center text-gray-600 shadow-lg" data-aos="fade-up">
                            <p class="mb-4 text-center font-sacramento text-2xl font-semibold text-primary-green-cream-400">
                                2023 (Lorem ipsum dolor sit amet)
                            </p>
                            <p class="text-justify text-base">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quibusdam debitis magni animi
                                deserunt,
                                consectetur blanditiis quisquam exercitationem! Repellat, officia.
                            </p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- message & gift section -->
            <section id="message-gift-section" class="z-10 relative min-h-screen w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative px-4 py-8 min-h-screen w-full flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="zoom-in">
                        Messages
                    </p>
                    <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 shadow-lg" data-aos="zoom-in">
                        <form id="message-form" method="POST">
                            @csrf
                            <input type="hidden" name="invitation_id" id="invitation_id" value="{{ $invitation->id ?? null }}">
                            <div class="mb-4">
                                <label for="name" class="mb-2 block text-left text-sm font-semibold text-gray-600">Nama</label>
                                <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" class="w-full rounded-lg border border-primary-green-cream-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-cream-400" />
                            </div>
                            <div class="mb-4">
                                <label for="message" class="mb-2 block text-left text-sm font-semibold text-gray-600">Pesan</label>
                                <textarea name="message" id="message" placeholder="Berikan ucapan serta doa restu Anda" class="w-full rounded-lg border border-primary-green-cream-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-cream-400" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="presence_confirm" class="mb-2 block text-left text-sm font-semibold text-gray-600">Konfirmasi
                                    Kehadiran</label>
                                <div class="flex space-x-4 text-gray-600">
                                    <label class="flex items-center">
                                        <input type="radio" name="presence_confirm" value="1" class="mr-2" onclick="toggleGuestInput(true)" />
                                        Hadir
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="presence_confirm" value="0" class="mr-2" onclick="toggleGuestInput(false)" />
                                        Maaf, saya tidak bisa hadir
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4" id="guest_input" style="display: none">
                                <label for="guest_total" class="mb-2 block text-left text-sm font-semibold text-gray-600">Jumlah Tamu</label>
                                <input type="number" name="guest_total" id="guest_total" placeholder="Masukkan jumlah tamu (orang)" class="w-full rounded-lg border border-primary-green-cream-400 p-3 focus:outline-none focus:ring-2 focus:ring-primary-green-cream-400" />
                            </div>
                            <button type="button" id="send-message-btn" class="cursor-pointer mt-4 w-full rounded-full bg-primary-green-cream-500 p-2 text-base text-white hover:bg-primary-green-cream-600">
                                <i class="fas fa-message"></i> SEND MESSAGE
                            </button>
                        </form>

                        @if ($invitation)
                            <div id="messages" data-color="text-primary-green-cream-400" class="mt-8 max-h-96 overflow-y-auto space-y-4 rounded-lg border border-gray-300 p-2">
                            </div>
                        @else
                            <div class="mt-8 max-h-96 overflow-y-auto space-y-4 rounded-lg border border-gray-300 p-2">
                                <!-- Pesan akan ditampilkan di sini -->
                                <div class="bg-green-100 p-4 rounded-md shadow-md">
                                    <p class="font-semibold text-primary-green-cream-500 text-sm">Nama Pengirim 1</p>
                                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.
                                        Nullam scelerisque urna nec nisi auctor, a tincidunt libero iaculis.</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-md shadow-md">
                                    <p class="font-semibold text-primary-green-cream-500 text-sm">Nama Pengirim 2</p>
                                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.
                                        Nullam scelerisque urna nec nisi auctor, a tincidunt libero iaculis.</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-md shadow-md">
                                    <p class="font-semibold text-primary-green-cream-500 text-sm">Nama Pengirim 3</p>
                                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.
                                        Nullam scelerisque urna nec nisi auctor, a tincidunt libero iaculis.</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-md shadow-md">
                                    <p class="font-semibold text-primary-green-cream-500 text-sm">Nama Pengirim 4</p>
                                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.
                                        Nullam scelerisque urna nec nisi auctor, a tincidunt libero iaculis.</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-md shadow-md">
                                    <p class="font-semibold text-primary-green-cream-500 text-sm">Nama Pengirim 5</p>
                                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.
                                        Nullam scelerisque urna nec nisi auctor, a tincidunt libero iaculis.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="zoom-in">
                        Gift
                    </p>
                    <div class="mb-4 w-full rounded-lg border-2 border-primary-green-cream-400 bg-white/75 p-4 shadow-lg" data-aos="zoom-in">
                        <p class="mb-8 text-justify text-base text-gray-600">
                            Bagi yang ingin memberikan tanda kasih, dapat mengirimkan melalui fitur di bawah ini:
                        </p>
                        <button id="open-modal" class="cursor-pointer w-full rounded-full bg-primary-green-cream-500 p-2 text-base text-white hover:bg-primary-green-cream-600">
                            <i class="fas fa-gift"></i> SEND GIFT
                        </button>
                    </div>
                </div>
            </section>

            <div id="gift-modal" class="fixed inset-0 z-50 flex hidden justify-center py-4">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative mx-4 max-h-[90vh] w-full max-w-md overflow-hidden rounded-lg bg-white">
                    <div class="flex p-4">
                        <p class="font-sacramento text-4xl font-semibold text-primary-green-cream-400">Gift</p>
                        <button id="close-modal" class="cursor-pointer ml-auto text-3xl font-semibold text-gray-600 hover:text-gray-900">
                            &times;
                        </button>
                    </div>
                    <hr class="border-gray-300" />
                    <div class="max-h-[70vh] overflow-y-auto px-4 pb-8 pt-4">
                        <p class="mb-8 text-base font-semibold">
                            Silahkan transfer hadiah melalui nomor rekening maupun dompet digital berikut:
                        </p>

                        @if ($invitation)
                            @if ($invitation->gifts->isEmpty())
                                <p class="px-4 py-2 bg-slate-500 text-white rounded-lg">Belum ada data.</p>
                            @else
                                @foreach ($invitation->gifts->sortBy('order') as $gift)
                                    @if ($gift->type == 'Rekening')
                                        <div class="relative mb-4">
                                            <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/card-money.jpg" class="h-40 w-full rounded-3xl border-2 border-primary-green-cream-400 object-cover" />
                                            <div class="absolute inset-0 flex flex-col items-start justify-center pl-4">
                                                <p class="px-4 py-1 text-2xl font-semibold text-primary-green-cream-400">{{ $gift->account_name }}</p>
                                                <p class="px-4 py-1 text-2xl">
                                                    {{ $gift->account_number }}
                                                    <i id="copy-icosn" class="fa-regular fa-copy cursor-pointer hover:text-primary-green-cream-400" onclick="copyToClipboard('bg-primary-green-cream-500', '{{ $gift->account_number }}')"></i>
                                                </p>
                                                <p class="px-4 py-1 text-2xl">{{ $gift->account_holder }}</p>
                                            </div>
                                        </div>
                                    @elseif($gift->type == 'Paket')
                                        <div class="relative mb-4">
                                            <div class="flex rounded-3xl border-2 border-primary-green-cream-400 p-2">
                                                <div class="flex items-center px-4">
                                                    <i class="fas fa-gift text-3xl text-primary-green-cream-400"></i>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <p class="px-1 py-1 text-2xl">{{ $gift->recipient_name }}</p>
                                                    <p class="base px-1 py-1 text-gray-600">{{ $gift->recipient_phone_number }}</p>
                                                    <p class="px-1 py-1 text-base">
                                                        <span class="text-base text-gray-600">{{ $gift->recipient_address }}</span>
                                                        <i class="fa-regular fa-copy cursor-pointer text-2xl hover:text-primary-green-cream-400" onclick='copyToClipboard("bg-primary-green-cream-500", "Name: {{ $gift->recipient_name }}, Phone Number: {{ $gift->recipient_phone_number }}, Address: {{ $gift->recipient_address }}")'></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @else
                            <div class="relative mb-4">
                                <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/card-money.jpg" class="h-40 w-full rounded-3xl border-2 border-primary-green-cream-400 object-cover" />
                                <div class="absolute inset-0 flex flex-col items-start justify-center pl-4">
                                    <p class="px-4 py-1 text-2xl font-semibold text-primary-green-cream-400">BSI</p>
                                    <p class="px-4 py-1 text-2xl">
                                        1234567890
                                        <i id="copy-icosn" class="fa-regular fa-copy cursor-pointer hover:text-primary-green-cream-400" onclick="copyToClipboard('bg-primary-green-cream-500', '1234567890')"></i>
                                    </p>
                                    <p class="px-4 py-1 text-2xl">Nama Pemilik</p>
                                </div>
                            </div>

                            <div class="relative mb-4">
                                <div class="flex rounded-3xl border-2 border-primary-green-cream-400 p-2">
                                    <div class="flex items-center px-4">
                                        <i class="fas fa-gift text-3xl text-primary-green-cream-400"></i>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <p class="px-1 py-1 text-2xl">Nama Penerima</p>
                                        <p class="base px-1 py-1 text-gray-600">081234567890</p>
                                        <p class="px-1 py-1 text-base">
                                            <span class="text-base text-gray-600">Lorem ipsum dolor sit amet consectetur Voluptas quaerat nulla velit.</span>
                                            <i class="fa-regular fa-copy cursor-pointer text-2xl hover:text-primary-green-cream-400" onclick='copyToClipboard("bg-primary-green-cream-500", "Name: Nama Penerima, Phone Number: 081234567890, Address: Lorem ipsum dolor sit amet consectetur Voluptas quaerat nulla velit.")'></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="relative mt-8">
                            <p class="text-base font-semibold">Perhatian!</p>
                            <ul class="list-disc pl-4 text-sm text-gray-600">
                                <li>
                                    Pastikan nama dan nomor rekening sudah sesuai dengan nama mempelai ketika melakukan
                                    proses
                                    transfer.
                                </li>
                                <li>
                                    Mohon untuk melakukan konfirmasi hadiah anda dengan mengirim bukti transfer/resi
                                    pengiriman
                                    kepada
                                    mempelai melalui personal message. Terima kasih.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- closing section -->
            <section id="closing-section" class="z-10 relative h-full w-full overflow-hidden">
                <div class="absolute h-full w-full flex justify-start items-center">
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/41.png" class="z-10 absolute w-full inset-x-0 top-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/42.png" class="z-20 absolute w-full inset-x-0 top-0" data-aos="fade-left" />

                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/43.png" class="z-20 absolute w-full inset-x-0 bottom-0" data-aos="fade-right" />
                    <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/44.png" class="z-10 absolute w-full inset-x-0 bottom-0" data-aos="fade-left" />
                </div>

                <div class="z-30 relative px-4 py-8 flex flex-col items-center justify-center">
                    <p class="mb-4 mt-6 px-2 text-center font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-down">
                        Closing
                    </p>
                    <div class="px-2">
                        <div class="mb-4 text-center">
                            <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/45.png" class="z-20 w-full inset-x-0 mb-4" data-aos="fade-down" />
                            <div class="mb-16 text-base text-white" data-aos="fade-down">
                                {!! $invitation->closing->closing_text ?? 'Menjadi sebuah kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dalam hari bahagia ini. Terima kasih atas segala ucapan, doa, dan perhatian yang diberikan.' !!}
                            </div>
                            <p class="mb-4 text-base font-semibold text-white" data-aos="fade-up">
                                {{ $invitation->closing->closing_greeting ?? 'Sampai jumpa di hari besar kami!' }}
                            </p>
                            <p class="mb-4 font-sacramento text-4xl font-semibold text-primary-green-cream-400" data-aos="fade-up">
                                {{ $invitation->weddingCouple->bride_nickname ?? 'Wanita' }} & {{ $invitation->weddingCouple->groom_nickname ?? 'Pria' }}
                            </p>
                            <img loading="lazy" src="{{ asset('/') }}assets/floral-template/images/green-cream/46.png" class="z-20 w-full inset-x-0 mb-4" data-aos="fade-up" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- footer -->
            @include('templates.wedding-floral.layouts.footer', ['color' => 'primary-green-cream'])

        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection
