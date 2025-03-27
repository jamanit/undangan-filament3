@extends('layouts.app')

@section('content')
    <div>
        <section class="relative min-h-screen lg:py-24 py-20 bg-gradient-to-br from-{{ $primary_color }}-700 to-{{ $primary_color }}-600">
            @if ($siteConfigs['banner']->file)
                <div class="absolute inset-0 bg-[url('{{ Storage::url($siteConfigs['banner']->file) }}')] bg-center bg-cover opacity-50"></div>
            @else
                <div class="absolute inset-0 bg-[url('{{ asset('/') }}assets/hoxia-v1/images/bg/shape-1.png')] bg-center bg-cover opacity-50"></div>
            @endif
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                    <div class="md:col-span-8">
                        <div class="me-6">
                            <h4 class="font-semibold lg:leading-normal leading-normal text-3xl lg:text-5xl text-white">{!! $siteConfigs['title_banner']->value ?? '' !!}</h4>
                            <div class="mt-5 text-white/70 text-lg max-w-xl">{!! $siteConfigs['caption_banner']->value ?? '' !!}</div>
                        </div>
                    </div>

                    <div class="md:col-span-4">
                        @if ($siteConfigs['hero_banner']->file)
                            <img loading="lazy" src="{{ Storage::url($siteConfigs['hero_banner']->file) }}" alt="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="absolute bottom-4 flex justify-center w-full">
                <a href="#services" class="text-white animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>
        </section>

        <section class="relative">
            {{-- SERVICES --}}
            <div id="services" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Services</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Layanan lengkap untuk membuat undangan yang personal dan tak terlupakan.</p>
                </div>

                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    @if ($templates->isEmpty())
                        <p class="text-center text-slate-400 max-w-xl mx-auto">Data is not yet available.</p>
                    @else
                        @foreach ($services as $service)
                            <div class="group relative p-6 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:!bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 transition-all duration-500 ease-in-out rounded-md bg-white dark:bg-slate-800 overflow-hidden">
                                <div class="relative overflow-hidden text-transparent -m-3">
                                    <div class="w-24 h-24 flex items-center justify-center">
                                        <i data-feather="hexagon" class="h-24 w-24 fill-{{ $primary_color }}-500/[0.07] group-hover:fill-white/20"></i>
                                        <div class="absolute text-{{ $primary_color }}-500 rounded-md group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                            <i class="{{ $service->icon }}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <h5><a href="" class="text-lg font-medium group-hover:text-white transition-all duration-500 ease-in-out">{{ $service->title }}</a></h5>
                                    <p class="text-slate-400 group-hover:text-white/50 transition-all duration-500 ease-in-out mt-3">{!! $service->caption !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- TEMPLATES --}}
            <div id="templates" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4 bg-gray-100 dark:bg-slate-900">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Templates</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Sesuaikan undanganmu dengan template elegan untuk momen istimewa.</p>
                </div>

                @if ($templates->isEmpty())
                    <p class="text-center text-slate-400 max-w-xl mx-auto">Data is not yet available.</p>
                @else
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                        @foreach ($templates as $template)
                            <div class="relative overflow-hidden group rounded-md shadow hover:shadow-md dark:shadow-gray-800 transition duration-500 dark:bg-slate-800">
                                <div class="flex items-center justify-center bg-slate-200 dark:bg-slate-800">
                                    @if ($template->image)
                                        <img loading="lazy" src="{{ Storage::url($template->image) }}" alt="" class="h-[250px] oject-contain">
                                    @else
                                        @php
                                            $extensions = ['png', 'PNG', 'jpg', 'jpeg', 'gif', 'bmp'];
                                            $imageUrl = null;
                                            foreach ($extensions as $ext) {
                                                $templateImagePath = public_path('assets/images/templates/' . $template->parameter . '.' . $ext);
                                                if (file_exists($templateImagePath)) {
                                                    $imageUrl = asset('assets/images/templates/' . $template->parameter . '.' . $ext);
                                                    break;
                                                }
                                            }
                                        @endphp
                                        @if ($imageUrl)
                                            <img loading="lazy" src="{{ $imageUrl }}" alt="Template Image" class="h-[250px] object-contain">
                                        @else
                                            <div class="h-[250px]"></div>
                                        @endif
                                    @endif
                                </div>
                                <div class="p-6">
                                    <span class="bg-{{ $primary_color }}-500/5 text-{{ $primary_color }}-500 text-xs font-semibold px-2.5 py-0.5 rounded-full h-5">{{ $template->invitation_type }}</span>
                                    <h5 class="mt-3">
                                        <a href="{{ route('templates.show', $template->parameter) }}" target="_blank" class="title text-lg font-medium hover:text-{{ $primary_color }}-500 duration-500">{{ $template->name }}</a>
                                    </h5>
                                    <div class="mt-4">
                                        <a href="{{ route('templates.show', $template->parameter) }}" target="_blank"
                                            class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                            View template <i class="uil uil-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex itens-center justify-center mt-6">
                        <a href="{{ route('templates.index') }}"
                            class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-600 border border-{{ $primary_color }}-500 hover:border-{{ $primary_color }}-600 text-white focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500">
                            View all templates</a>
                    </div>
                @endif
            </div>

            {{-- PRICES --}}
            <div id="prices" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Prices</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Kami menawarkan harga terbaik untuk undangan yang luar biasa.</p>
                </div>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    @foreach ($prices as $price)
                        <div class="group relative overflow-hidden shadow-lg dark:shadow-gray-800 rounded-md h-fit dark:bg-slate-800">
                            @if ($price->popular_label)
                                <div class="bg-gradient-to-tr from-{{ $primary_color }}-500 to-{{ $primary_color }}-700 text-white py-2 px-6 h6 text-lg font-medium">Popular</div>
                            @endif
                            <div class="p-6">
                                <h6 class="font-medium mb-5 text-xl">{{ $price->title }}</h6>

                                <div class="flex">
                                    <span class="text-lg font-medium">Rp</span>
                                    <span class="price text-4xl h6 font-semibold mb-0 ml-1">{{ number_format($price->price, 0, ',', '.') }}</span>
                                </div>

                                @if ($price->discount)
                                    <span class="text-xs px-4 py-1 rounded-lg bg-yellow-500">Discount {{ $price->discount }}</span>
                                @endif

                                <div class="text-slate-400 mt-4">
                                    {!! $price->description !!}
                                </div>
                                {{-- <a href=""
                                    class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide !bg-{{ $primary_color }}-500 hover:!bg-{{ $primary_color }}-600 border !border-{{ $primary_color }}-500 hover:!border-{{ $primary_color }}-600 text-white focus:ring-[3px] focus:!ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500 w-full mt-5">Buy
                                    Now</a> --}}
                                {{-- <p class="text-sm text-slate-400 mt-1.5"><span class="text-red-600">*</span>T&C Apply</p> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- TESTIMONIAL --}}
            <div id="testimonials" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4 bg-gray-100 dark:bg-slate-900">
                <div class="absolute inset-0 opacity-25 dark:opacity-50 bg-[url('{{ asset('/') }}assets/hoxia-v1/images/map.png')] bg-no-repeat bg-center bg-cover"></div>
                <div class="relative grid grid-cols-1 pb-8 text-center z-1">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Testimonials</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Cerita bahagia dari mereka yang telah membuat undangan bersama kami.</p>
                </div>

                <div class="container relative">
                    <div class="grid grid-cols-1 relative">
                        <div class="tiny-three-item">
                            @foreach ($testimonials as $testimonial)
                                <div class="tiny-slide">
                                    <div class="rounded-md bg-white dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 m-2">
                                        <div class="flex items-center pb-6 border-b border-gray-100 dark:border-gray-800">
                                            {{-- <img loading="lazy" src="{{ asset('/') }}assets/hoxia-v1/images/client/01.jpg" class="h-16 w-16 rounded-full shadow dark:shadow-gray-800" alt=""> --}}
                                            <div class="h-14 w-14 bg-gray-200 rounded-full shadow dark:shadow-gray-800 flex items-center justify-center">
                                                <i class="fas fa-user text-3xl text-gray-400"></i>
                                            </div>
                                            <div class="ps-4">
                                                <a href="" class="text-lg h6 hover:text-{{ $primary_color }}-500 duration-500 ease-in-out">{{ $testimonial->name }}</a>
                                                <p class="text-slate-400 text-xs">{{ $testimonial->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <p class="text-slate-400">{!! $testimonial->text !!}</p>
                                            <ul class="list-none mb-0 text-amber-400 mt-2">
                                                @for ($i = 0; $i < $testimonial->star; $i++)
                                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- CONTACT US --}}
            @include('contact-us')

            {{-- ABOUT US --}}
            <div id="about_us" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4 bg-gray-100 dark:bg-slate-900">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="md:text-3xl md:leading-normal text-2xl leading-normal font-medium">About Us</h3>
                </div>

                <div class="text-slate-400 mx-auto">
                    {!! $siteConfigs['about_us']->value ?? '' !!}
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
