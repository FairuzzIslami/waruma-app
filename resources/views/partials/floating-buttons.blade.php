{{-- FLOATING BUTTON WHATSAPP (KIRI BAWAH) --}}
<div class="fixed bottom-6 left-6 z-50">
    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
        class="bg-[#25D366] text-white p-3.5 rounded-full border-2 border-secondary shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:scale-110 transition-all flex items-center justify-center">
        <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-7 h-7 object-contain">
    </a>
</div>

{{-- FLOATING SCROLL TO TOP (KANAN BAWAH) --}}
<div class="fixed bottom-6 right-6 z-50">
    <button id="scroll-top-btn" type="button"
        class="hidden bg-primary text-secondary p-3.5 rounded-xl border-2 border-secondary shadow-[4px_4px_0px_0px_rgba(35,35,35,1)] hover:bg-amber-400 transition-all flex items-center justify-center cursor-pointer">
        <img src="{{ asset('assets/icons/arrow-up.svg') }}" alt="Scroll to Top" class="w-6 h-6 object-contain">
    </button>
</div>
