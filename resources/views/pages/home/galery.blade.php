<x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="galeri" />
            <x-sections.header.hr />
        </x-sections.header>

        @if ($image->isNotEmpty())
            <div class="grid grid-cols-12 gap-4">
                @foreach ($image as $item)
                    <div class="col-span-6 md:col-span-4">
                        <div class="aspect-square md:aspect-video overflow-hidden rounded-xl cursor-pointer">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
            <x-sections.footer>
                {{-- <x-sections.footer.description value="lihat galeri kami yang lainnya" /> --}}
                <x-sections.footer.link href="{{ route('index') }}" />
            </x-sections.footer>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
