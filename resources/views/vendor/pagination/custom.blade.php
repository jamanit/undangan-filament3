@if ($paginator->hasPages())
    <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
        <div class="md:col-span-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex items-center -space-x-px">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <span class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-800 rounded-s-3xl border border-gray-100 dark:border-gray-800">
                                <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}"
                                class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-800 rounded-s-3xl hover:!text-white border border-gray-100 dark:border-gray-800 hover:!border-{{ $primary_color }}-500 dark:hover:!border-{{ $primary_color }}-500 hover:!bg-{{ $primary_color }}-500 dark:hover:!bg-{{ $primary_color }}-500">
                                <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li><span class="w-[40px] h-[40px] inline-flex justify-center items-center">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><span class="z-10 w-[40px] h-[40px] inline-flex justify-center items-center text-white bg-{{ $primary_color }}-500 border border-{{ $primary_color }}-500">{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}"
                                            class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 hover:!text-white bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-800 hover:!border-{{ $primary_color }}-500 dark:hover:!border-{{ $primary_color }}-500 hover:!bg-{{ $primary_color }}-500 dark:hover:!bg-{{ $primary_color }}-500">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}"
                                class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-800 rounded-e-3xl hover:!text-white border border-gray-100 dark:border-gray-800 hover:!border-{{ $primary_color }}-500 dark:hover:!border-{{ $primary_color }}-500 hover:!bg-{{ $primary_color }}-500 dark:hover:!bg-{{ $primary_color }}-500">
                                <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </a>
                        </li>
                    @else
                        <li>
                            <span class="w-[40px] h-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-800 rounded-e-3xl border border-gray-100 dark:border-gray-800">
                                <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif
