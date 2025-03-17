<footer class="footer bg-slate-900 dark:bg-slate-950 relative text-gray-200">
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid grid-cols-1">
                        <div class="text-center">
                            @if ($siteConfigs['white_logo']->file)
                                <a href="/">
                                    <img src="{{ Storage::url($siteConfigs['white_logo']->file) }}" class="block mx-auto h-16 rounded-sm" alt="">
                                </a>
                            @else
                                <a href="/">
                                    <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-icon-64.png" class="block mx-auto h-16 rounded-sm" alt="">
                                </a>
                            @endif
                            <p class="max-w-xl mx-auto mt-8">Ingin tetap terhubung? Ikuti kami di media sosial atau hubungi tim kami untuk bantuan lebih lanjut!</p>
                        </div>

                        <ul class="list-none text-center mt-8">
                            @if ($siteConfigs['phone_number']->value)
                                <li class="inline">
                                    <a href="tel:{{ $siteConfigs['phone_number']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-phone align-middle" title="{{ $siteConfigs['phone_number']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['email']->value)
                                <li class="inline">
                                    <a href="mailto:{{ $siteConfigs['email']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-envelope align-middle" title="{{ $siteConfigs['email']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['whatsapp_number']->value)
                                <li class="inline">
                                    <a href="https://wa.me/{{ $siteConfigs['whatsapp_number']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-whatsapp align-middle" title="{{ $siteConfigs['whatsapp_number']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['instagram_url']->value)
                                <li class="inline">
                                    <a href="{{ $siteConfigs['instagram_url']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-instagram align-middle" title="{{ $siteConfigs['instagram_url']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['facebook_url']->value)
                                <li class="inline">
                                    <a href="{{ $siteConfigs['facebook_url']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-facebook-f align-middle" title="{{ $siteConfigs['facebook_url']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['tiktok_url']->value)
                                <li class="inline">
                                    <a href="{{ $siteConfigs['tiktok_url']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="fa-brands fa-tiktok text-sm align-middle" title="{{ $siteConfigs['tiktok_url']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['x_url']->value)
                                <li class="inline">
                                    <a href="{{ $siteConfigs['x_url']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="fa-brands fa-x text-sm align-middle" title="{{ $siteConfigs['x_url']->name }}"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($siteConfigs['map_url']->value)
                                <li class="inline">
                                    <a href="{{ $siteConfigs['map_url']->value }}" target="_blank"
                                        class="h-8 w-8 inline-flex items-center justify-center tracking-wide align-middle transition duration-500 ease-in-out text-base text-center border-gray-800 rounded-md border hover:border-{{ $primary_color }}-500 dark:hover:border-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-500 dark:hover:bg-{{ $primary_color }}-500 focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none">
                                        <i class="uil uil-map-marker align-middle" title="{{ $siteConfigs['map_url']->name }}"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-[30px] px-0 border-t border-slate-800">
        <div class="container relative text-center">
            <div class="grid md:grid-cols-1">
                <p class="mb-0">
                    Copyright &copy; 2024 {{ $siteConfigs['site_name']->value ?? 'Site Name' }} by <a href="{{ env('COPYRIGHT_URL', 'Copyright URL') }}" target="_blank" class="font-semibold text-{{ $primary_color }}-400">{{ env('COPYRIGHT_NAME', 'Copyright Name') }}</a>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
