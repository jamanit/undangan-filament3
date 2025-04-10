@extends('layouts.app')

@section('content')
    <div>
        <div class="relative py-[2.3rem] bg-gradient-to-br from-{{ $primary_color }}-700 to-{{ $primary_color }}-600"></div>

        <section class="relative md:pb-24 pb-16">
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
                @endif

                {{ $templates->links('vendor.pagination.custom') }}
            </div>

            {{-- CONTACT US --}}
            @include('contact-us')
        </section>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
