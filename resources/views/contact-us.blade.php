<div id="contact_us" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
    <div class="grid grid-cols-1 pb-8 text-center">
        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Contact Us</h3>
        <p class="text-slate-400 max-w-xl mx-auto">Kami siap membantu mewujudkan undangan impianmu. Jangan ragu untuk menghubungi!</p>
    </div>

    <div class="relative">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">
                @if ($siteConfigs['website_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-phone"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">Phone</h5>
                            <div>
                                <a target="_blank" href="tel:{{ $siteConfigs['phone_number']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    {{ $siteConfigs['phone_number']->value }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['email']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-envelope"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">Email</h5>
                            <div>
                                <a target="_blank" href="mailto:{{ $siteConfigs['email']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    {{ $siteConfigs['email']->value }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['whatsapp_number']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-whatsapp"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">WhatsApp</h5>
                            <div>
                                <a target="_blank" href="https://wa.me/{{ $siteConfigs['whatsapp_number']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    {{ $siteConfigs['whatsapp_number']->value }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['instagram_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-whatsapp"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">Instagram</h5>
                            <div>
                                <a target="_blank" href="{{ $siteConfigs['instagram_url']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    Visit Instagram
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['facebook_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-facebook"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">Facebook</h5>
                            <div>
                                <a target="_blank" href="{{ $siteConfigs['facebook_url']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    Visit Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['tiktok_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="fa-brands fa-tiktok"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">TikTok</h5>
                            <div>
                                <a target="_blank" href="{{ $siteConfigs['tiktok_url']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">
                                    Visit TikTok
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['x_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="fa-brands fa-x"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">X</h5>
                            <div>
                                <a target="_blank" href="{{ $siteConfigs['x_url']->value }}"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">Visit
                                    X
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($siteConfigs['address']->value && $siteConfigs['map_url']->value)
                    <div class="flex items-center gap-4">
                        <div class="relative text-transparent">
                            <div class="w-14 h-14 bg-{{ $primary_color }}-500/5 dark:bg-slate-800 text-{{ $primary_color }}-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i class="uil uil-map-marker"></i>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title h5 text-lg font-medium">Location</h5>
                            <p class="text-slate-400 mt-3">{{ $siteConfigs['address']->value }}</p>

                            <div>
                                <a target="_blank" href="{{ $siteConfigs['map_url']->value }}" data-type="iframe"
                                    class="read-more lightbox relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-{{ $primary_color }}-500 hover:text-{{ $primary_color }}-500 after:bg-{{ $primary_color }}-500 duration-500 ease-in-out">View
                                    on Map</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="container mt-6">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-7 md:col-span-6">
                    <img loading="lazy" src="{{ asset('/') }}assets/hoxia-v1/images/contact.svg" alt="">
                </div>

                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="bg-white dark:bg-slate-800 rounded-md shadow dark:shadow-gray-700 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>

                            <form id="inbox-form" method="post">
                                @csrf
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid grid-cols-1">
                                    <div class="lg:col-span-6 mb-5">
                                        <label for="name" class="font-medium">Name</label>
                                        <input name="name" id="name" type="text" class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-{{ $primary_color }}-500 dark:border-gray-800 dark:focus:border-{{ $primary_color }}-500 focus:ring-0 mt-2" placeholder="Enter Name">
                                    </div>

                                    <div class="lg:col-span-6 mb-5">
                                        <label for="email" class="font-medium">Email</label>
                                        <input name="email" id="email" type="email" class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-{{ $primary_color }}-500 dark:border-gray-800 dark:focus:border-{{ $primary_color }}-500 focus:ring-0 mt-2" placeholder="Enter Email">
                                    </div>

                                    <div class="mb-5">
                                        <label for="message" class="font-medium">Message</label>
                                        <textarea name="message" id="message" class="form-input w-full text-[15px] py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-{{ $primary_color }}-500 dark:border-gray-800 dark:focus:border-{{ $primary_color }}-500 focus:ring-0 mt-2" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="sendInboxButton"
                                    class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-{{ $primary_color }}-500 hover:bg-{{ $primary_color }}-600 border border-{{ $primary_color }}-500 hover:border-{{ $primary_color }}-600 text-white focus:ring-[3px] focus:ring-{{ $primary_color }}-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500">
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#inbox-form').on('submit', function(e) {
                e.preventDefault();

                let sendInboxButton = $('#sendInboxButton');
                let formData = $(this).serialize();

                sendInboxButton.attr('disabled', true).text('Sending...');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('inboxes.store') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                        $('#inbox-form')[0].reset();

                        sendInboxButton.attr('disabled', false).text('Send');
                    },
                    error: function(xhr) {
                        let errorInbox = xhr.responseJSON.message || 'Something went wrong! Please try again later.';

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            errorInbox = '';

                            $.each(errors, function(key, value) {
                                errorInbox += value[0] + '<br>';
                            });
                        }

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: errorInbox,
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                        sendInboxButton.attr('disabled', false).text('Send');
                    }
                });
            });
        });
    </script>
@endpush
