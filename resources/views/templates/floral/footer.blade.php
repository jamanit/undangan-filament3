<footer class="z-10 relative bg-gray-800">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col items-center text-white">
            <div class="mb-4 flex space-x-4">
                <a href="#" class="hover:text-{{ $primary_color }}-400" title="WhatsApp" target="_blank">
                    <i class="fab fa-whatsapp text-2xl"></i>
                </a>
                <a href="#" class="hover:text-{{ $primary_color }}-400" title="Instagram" target="_blank">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="#" class="hover:text-{{ $primary_color }}-400" title="Website" target="_blank">
                    <i class="fas fa-globe text-2xl"></i>
                </a>
            </div>
            <div class="text-center">
                <p class="text-sm">
                    Copyright &copy; 2024 <span class="font-semibold text-{{ $primary_color }}-400">{{ env('APP_NAME', 'App Name') }}</span>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
