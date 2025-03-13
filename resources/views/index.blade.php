@extends('layouts.app')

@section('content')
    <div>
        <section class="relative min-h-screen lg:py-24 py-20 bg-gradient-to-br from-violet-700 to-violet-600">
            @if ($siteConfigs['banner']->file)
                <div class="absolute inset-0 bg-[url('{{ Storage::url($siteConfigs['banner']->file) }}')] bg-center bg-cover opacity-30"></div>
            @else
                <div class="absolute inset-0 bg-[url('{{ asset('/') }}assets/hoxia-v1/images/bg/shape-1.png')] bg-center bg-cover opacity-30"></div>
            @endif
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                    <div class="md:col-span-7">
                        <div class="me-6">
                            <h4 class="font-semibold lg:leading-normal leading-normal text-3xl lg:text-5xl text-white">{!! $siteConfigs['title_banner']->value ?? '' !!}</h4>
                            <div class="mt-5 text-white/70 text-lg max-w-xl">{!! $siteConfigs['caption_banner']->value ?? '' !!}</div>

                            {{-- <div class="mt-6">
                                <a href="#templates" class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-sky-500 hover:bg-sky-600 border border-sky-500 hover:border-sky-600 text-white focus:ring-[3px] focus:ring-sky-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500">
                                    See Templates
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="md:col-span-5">
                        @if ($siteConfigs['hero_banner']->file)
                            <img src="{{ Storage::url($siteConfigs['hero_banner']->file) }}" alt="">
                        @else
                            {{-- <img src="{{ asset('/') }}assets/hoxia-v1/images/1.png" alt=""> --}}
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="relative md:pb-24 pb-16">
            <div id="services" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Services</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                </div>

                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    <div class="group relative p-6 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:!bg-purple-500 dark:hover:bg-violet-500 transition-all duration-500 ease-in-out rounded-md bg-white dark:bg-slate-800 overflow-hidden">
                        <div class="relative overflow-hidden text-transparent -m-3">
                            <i data-feather="hexagon" class="h-24 w-24 fill-violet-500/[0.07] group-hover:fill-white/20"></i>
                            <div class="absolute top-2/4 -translate-y-2/4 start-8 text-violet-500 rounded-md group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                <i class="uil uil-server"></i>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h5><a href="" class="text-lg font-medium group-hover:text-white transition-all duration-500 ease-in-out">Web Hosting</a></h5>
                            <p class="text-slate-400 group-hover:text-white/50 transition-all duration-500 ease-in-out mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                        </div>
                    </div>

                    <div class="group relative p-6 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:!bg-violet-500 dark:hover:bg-violet-500 transition-all duration-500 ease-in-out rounded-md bg-white dark:bg-slate-800 overflow-hidden">
                        <div class="relative overflow-hidden text-transparent -m-3">
                            <i data-feather="hexagon" class="h-24 w-24 fill-violet-500/[0.07] group-hover:fill-white/20"></i>
                            <div class="absolute top-2/4 -translate-y-2/4 start-8 text-violet-500 rounded-md group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                <i class="uil uil-cloud-heart"></i>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h5><a href="" class="text-lg font-medium group-hover:text-white transition-all duration-500 ease-in-out">Domains</a></h5>
                            <p class="text-slate-400 group-hover:text-white/50 transition-all duration-500 ease-in-out mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                        </div>
                    </div>

                    <div class="group relative p-6 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:!bg-violet-500 dark:hover:bg-violet-500 transition-all duration-500 ease-in-out rounded-md bg-white dark:bg-slate-800 overflow-hidden">
                        <div class="relative overflow-hidden text-transparent -m-3">
                            <i data-feather="hexagon" class="h-24 w-24 fill-violet-500/[0.07] group-hover:fill-white/20"></i>
                            <div class="absolute top-2/4 -translate-y-2/4 start-8 text-violet-500 rounded-md group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                <i class="uil uil-envelope-check"></i>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h5><a href="" class="text-lg font-medium group-hover:text-white transition-all duration-500 ease-in-out">Emails</a></h5>
                            <p class="text-slate-400 group-hover:text-white/50 transition-all duration-500 ease-in-out mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                        </div>
                    </div>

                    <div class="group relative p-6 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:!bg-violet-500 dark:hover:bg-violet-500 transition-all duration-500 ease-in-out rounded-md bg-white dark:bg-slate-800 overflow-hidden">
                        <div class="relative overflow-hidden text-transparent -m-3">
                            <i data-feather="hexagon" class="h-24 w-24 fill-violet-500/[0.07] group-hover:fill-white/20"></i>
                            <div class="absolute top-2/4 -translate-y-2/4 start-8 text-violet-500 rounded-md group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                <i class="uil uil-users-alt"></i>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h5><a href="" class="text-lg font-medium group-hover:text-white transition-all duration-500 ease-in-out">Supported</a></h5>
                            <p class="text-slate-400 group-hover:text-white/50 transition-all duration-500 ease-in-out mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="templates" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Templates</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                </div>

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    <div class="relative overflow-hidden group rounded-md shadow hover:shadow-md dark:shadow-gray-800 transition duration-500 dark:bg-slate-800">
                        <img src="{{ asset('/') }}assets/hoxia-v1/images/blog/1.jpg" alt="">

                        <div class="p-6">
                            <span class="bg-violet-500/5 text-violet-500 text-xs font-semibold px-2.5 py-0.5 rounded-full h-5 ms-1">VPS Hosting</span>

                            <h5 class="mt-3"><a href="blog-detail.html" class="title text-lg font-medium hover:text-violet-500 duration-500">Quickly formulate backend</a></h5>

                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>

                            <div class="mt-4">
                                <a href="blog-detail.html"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">Read
                                    More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="prices" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Prices</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                </div>

                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
                    <div class="group p-6 relative overflow-hidden shadow-lg dark:shadow-gray-800 rounded-md h-fit dark:bg-slate-800">
                        <h6 class="font-medium mb-5 text-xl">Free</h6>

                        <div class="flex mb-5">
                            <span class="text-lg font-medium">$</span>
                            <span class="price text-5xl h6 font-semibold mb-0">0</span>
                            <span class="text-lg font-medium self-end mb-1">/mo</span>
                        </div>

                        <ul class="list-none text-slate-400">
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">We offers a free month of service for new customers.</span></li>
                        </ul>
                        <a href=""
                            class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-transparent hover:!bg-violet-500 border border-gray-100 dark:border-gray-800 hover:!border-violet-500 dark:hover:!border-violet-500 text-slate-900 dark:text-white hover:text-white focus:ring-[3px] focus:!ring-violet-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500 w-full mt-5">Free
                            Demo</a>
                    </div>

                    <div class="group p-6 relative overflow-hidden shadow-lg dark:shadow-gray-800 rounded-md h-fit dark:bg-slate-800">
                        <h6 class="font-medium mb-5 text-xl">Single</h6>

                        <div class="flex mb-5">
                            <span class="text-lg font-medium">$</span>
                            <span class="price text-5xl h6 font-semibold mb-0">9</span>
                            <span class="text-lg font-medium self-end mb-1">/mo</span>
                        </div>

                        <ul class="list-none text-slate-400">
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">We offers a free 7 days of service for new customers.</span></li>
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Our Talented & Experienced Marketing Agency</span></li>
                        </ul>
                        <a href=""
                            class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-transparent hover:!bg-violet-500 border border-gray-100 dark:border-gray-800 hover:!border-violet-500 dark:hover:!border-violet-500 text-slate-900 dark:text-white hover:text-white focus:ring-[3px] focus:!ring-violet-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500 w-full mt-5">Subscribe
                            Now</a>
                    </div>

                    <div class="group relative overflow-hidden shadow-lg dark:shadow-gray-800 rounded-md h-fit dark:bg-slate-800">
                        <div class="bg-gradient-to-tr from-violet-500 to-violet-700 text-white py-2 px-6 h6 text-lg font-medium">Popular</div>
                        <div class="p-6">
                            <h6 class="font-medium mb-5 text-xl">Professional</h6>

                            <div class="flex mb-5">
                                <span class="text-lg font-medium">$</span>
                                <span class="price text-5xl h6 font-semibold mb-0">49</span>
                                <span class="text-lg font-medium self-end mb-1">/mo</span>
                            </div>

                            <ul class="list-none text-slate-400">
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">We offers a free 14 days of service for new customers.</span></li>
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Full Access</span></li>
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Source Files</span></li>
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Free Appointments</span></li>
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Enhanced Security</span></li>
                                <li class="mb-1 flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-0.5">Free Installment</span></li>
                            </ul>
                            <a href="" class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide !bg-violet-500 hover:!bg-violet-600 border !border-violet-500 hover:!border-violet-600 text-white focus:ring-[3px] focus:!ring-violet-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500 w-full mt-5">Buy Now</a>

                            <p class="text-sm text-slate-400 mt-1.5"><span class="text-red-600">*</span>T&C Apply</p>
                        </div>
                    </div>

                    <div class="group p-[1px] relative overflow-hidden shadow-lg dark:shadow-gray-800 rounded-md bg-gradient-to-tr from-violet-500 to-violet-700 h-fit">
                        <div class="p-6 bg-white dark:bg-slate-800 rounded-md">
                            <h6 class="font-medium mb-5 text-xl">Custom</h6>

                            <p class="text-slate-400 mb-5">Pricing plan will be as per client or company requirements</p>

                            <ul class="list-none">
                                <li class="mb-1 font-medium flex"><i class="uil uil-check-circle text-violet-500 text-[20px] align-middle me-2"></i> <span class="mt-1">Custom Pricing</span></li>
                            </ul>
                            <a href=""
                                class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-transparent hover:!bg-violet-500 border border-gray-100 dark:border-gray-800 hover:!border-violet-500 dark:hover:!border-violet-500 text-slate-900 dark:text-white hover:text-white focus:ring-[3px] focus:!ring-violet-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500 w-full mt-5">Talk
                                to us</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="testimonials" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="absolute inset-0 opacity-25 dark:opacity-50 bg-[url('{{ asset('/') }}assets/hoxia-v1/images/map.png')] bg-no-repeat bg-center bg-cover"></div>
                <div class="relative grid grid-cols-1 pb-8 text-center z-1">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Testimonials</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                </div>

                <div class="container relative">
                    <div class="grid grid-cols-1 relative">
                        <div class="tiny-three-item">
                            <div class="tiny-slide">
                                <div class="rounded-md bg-white dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 m-2">
                                    <div class="flex items-center pb-6 border-b border-gray-100 dark:border-gray-800">
                                        <img src="{{ asset('/') }}assets/hoxia-v1/images/client/01.jpg" class="h-16 w-16 rounded-full shadow dark:shadow-gray-800" alt="">

                                        <div class="ps-4">
                                            <a href="" class="text-lg h6 hover:text-violet-500 duration-500 ease-in-out">Thomas Israel</a>
                                            <p class="text-slate-400">C.E.O</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-slate-400">I didn't know a thing about icon design until I read this book. Now I can create any icon I need in no time. Great resource!</p>
                                        <ul class="list-none mb-0 text-amber-400 mt-2">
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tiny-slide">
                                <div class="rounded-md bg-white dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 m-2">
                                    <div class="flex items-center pb-6 border-b border-gray-100 dark:border-gray-800">
                                        <img src="{{ asset('/') }}assets/hoxia-v1/images/client/05.jpg" class="h-16 w-16 rounded-full shadow dark:shadow-gray-800" alt="">

                                        <div class="ps-4">
                                            <a href="" class="text-lg h6 hover:text-violet-500 duration-500 ease-in-out">Barbara McIntosh</a>
                                            <p class="text-slate-400">C.E.O</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-slate-400">There are so many things I had to do with my old software that I just don't do at all with Techwind. Suspicious but I can't say I don't love it.</p>
                                        <ul class="list-none mb-0 text-amber-400 mt-2">
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tiny-slide">
                                <div class="rounded-md bg-white dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 m-2">
                                    <div class="flex items-center pb-6 border-b border-gray-100 dark:border-gray-800">
                                        <img src="{{ asset('/') }}assets/hoxia-v1/images/client/02.jpg" class="h-16 w-16 rounded-full shadow dark:shadow-gray-800" alt="">

                                        <div class="ps-4">
                                            <a href="" class="text-lg h6 hover:text-violet-500 duration-500 ease-in-out">Carl Oliver</a>
                                            <p class="text-slate-400">C.E.O</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-slate-400">The best part about Techwind is every time I pay my employees, my bank balance doesn't go down like it used to. Looking forward to spending this extra cash when I figure out why my card is being declined.</p>
                                        <ul class="list-none mb-0 text-amber-400 mt-2">
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tiny-slide">
                                <div class="rounded-md bg-white dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 m-2">
                                    <div class="flex items-center pb-6 border-b border-gray-100 dark:border-gray-800">
                                        <img src="{{ asset('/') }}assets/hoxia-v1/images/client/04.jpg" class="h-16 w-16 rounded-full shadow dark:shadow-gray-800" alt="">

                                        <div class="ps-4">
                                            <a href="" class="text-lg h6 hover:text-violet-500 duration-500 ease-in-out">Jill Webb</a>
                                            <p class="text-slate-400">C.E.O</p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-slate-400">I'm trying to get a hold of someone in support, I'm in a lot of trouble right now and they are saying it has something to do with my books. Please get back to me right away.</p>
                                        <ul class="list-none mb-0 text-amber-400 mt-2">
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contact_us" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-medium">Contact Us</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Create, collaborate, and turn your ideas into incredible products with the definitive platform for digital design.</p>
                </div>

                <div class="relative">
                    <div class="container">
                        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                            <div class="lg:col-span-7 md:col-span-6">
                                <img src="{{ asset('/') }}assets/hoxia-v1/images/contact.svg" alt="">
                            </div>

                            <div class="lg:col-span-5 md:col-span-6">
                                <div class="lg:ms-5">
                                    <div class="bg-white dark:bg-slate-800 rounded-md shadow dark:shadow-gray-700 p-6">
                                        <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>

                                        <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                            <p class="mb-0" id="error-msg"></p>
                                            <div id="simple-msg"></div>
                                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                                <div class="lg:col-span-6 mb-5">
                                                    <label for="name" class="font-medium">Your Name:</label>
                                                    <input name="name" id="name" type="text" class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-violet-500 dark:border-gray-800 dark:focus:border-violet-500 focus:ring-0 mt-2" placeholder="Name :">
                                                </div>

                                                <div class="lg:col-span-6 mb-5">
                                                    <label for="email" class="font-medium">Your Email:</label>
                                                    <input name="email" id="email" type="email" class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-violet-500 dark:border-gray-800 dark:focus:border-violet-500 focus:ring-0 mt-2" placeholder="Email :">
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1">
                                                <div class="mb-5">
                                                    <label for="subject" class="font-medium">Your Question:</label>
                                                    <input name="subject" id="subject" class="form-input w-full text-[15px] py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-violet-500 dark:border-gray-800 dark:focus:border-violet-500 focus:ring-0 mt-2" placeholder="Subject :">
                                                </div>

                                                <div class="mb-5">
                                                    <label for="comments" class="font-medium">Your Comment:</label>
                                                    <textarea name="comments" id="comments" class="form-input w-full text-[15px] py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-violet-500 dark:border-gray-800 dark:focus:border-violet-500 focus:ring-0 mt-2" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" id="submit" name="send"
                                                class="inline-block px-8 py-2.5 text-[16px] font-medium tracking-wide bg-violet-500 hover:bg-violet-600 border border-violet-500 hover:border-violet-600 text-white focus:ring-[3px] focus:ring-violet-500 focus:ring-opacity-25 focus:outline-none rounded-md text-center align-middle transition-all duration-500">Send
                                                Message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container lg:mt-24 mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">
                            @if ($siteConfigs['website_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-phone"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">Phone</h5>
                                        <div>
                                            <a target="_blank" href="tel:{{ $siteConfigs['phone_number']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                {{ $siteConfigs['phone_number']->value }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['email']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-envelope"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">Email</h5>
                                        <div>
                                            <a target="_blank" href="mailto:{{ $siteConfigs['email']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                dsadddsada{{ $siteConfigs['email']->value }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['whatsapp_number']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-whatsapp"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">WhatsApp</h5>
                                        <div>
                                            <a target="_blank" href="https://wa.me/{{ $siteConfigs['whatsapp_number']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                {{ $siteConfigs['whatsapp_number']->value }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['instagram_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-whatsapp"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">Instagram</h5>
                                        <div>
                                            <a target="_blank" href="{{ $siteConfigs['instagram_url']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                Visit Instagram
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['facebook_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-facebook"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">Facebook</h5>
                                        <div>
                                            <a target="_blank" href="{{ $siteConfigs['facebook_url']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                Visit Facebook
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['tiktok_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="fa-brands fa-tiktok"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">TikTok</h5>
                                        <div>
                                            <a target="_blank" href="{{ $siteConfigs['tiktok_url']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">
                                                Visit TikTok
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['x_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="fa-brands fa-x"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">X</h5>
                                        <div>
                                            <a target="_blank" href="{{ $siteConfigs['x_url']->value }}"
                                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">Visit
                                                X
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($siteConfigs['address']->value && $siteConfigs['map_url']->value)
                                <div class="flex items-center gap-4">
                                    <div class="relative text-transparent">
                                        <div class="w-14 h-14 bg-violet-500/5 dark:bg-slate-800 text-violet-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                            <i class="uil uil-map-marker"></i>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h5 class="title h5 text-lg font-medium">Location</h5>
                                        <p class="text-slate-400 mt-3">{{ $siteConfigs['address']->value }}5</p>

                                        <div>
                                            <a target="_blank" href="{{ $siteConfigs['map_url']->value }}" data-type="iframe"
                                                class="read-more lightbox relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-violet-500 hover:text-violet-500 after:bg-violet-500 duration-500 ease-in-out">View
                                                on Map</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="about_us" class="container relative md:pt-24 md:pb-12 pt-16 pb-8 scroll-mt-4">
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
