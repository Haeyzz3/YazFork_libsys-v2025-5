<div>
    <div class="container mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($collections as $collection)
            <div
                x-data="{ hovered: false }"
                @mouseenter="hovered = true"
                @mouseleave="hovered = false"
                class="rounded-4g p-6 text-center hover:shadow-xl transition-shadow duration-500 group border border-transparent hover:border-maroon-800"
            >
                <i class="{{ $collection['icon'] }} text-usepmaroon text-4xl mb-4" :class="hovered ? '{{ $collection['hoverClass'] }}' : ''"></i>
                <h3 class="text-xl font-bold text-usepmaroon mb-2" :class="hovered ? '{{ $collection['hoverTitleClass'] }}' : ''">
                    <span x-show="!hovered">{{ $collection['title'] }}</span>
                    <span x-show="hovered">{{ $collection['hoverTitle'] ?? $collection['title'] }}</span>
                </h3>
                <div class="text-3xl font-bold text-usepgold mb-2 count-animation">
                    <span class="count" data-target="{{ str_replace(',', '', $collection['count']) }}">1</span>
                </div>
                <p class="text-gray-600 text-center">{{ $collection['description'] }}</p>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.count').forEach(function(el) {
            const target = +el.getAttribute('data-target');
            let count = 1;
            const increment = Math.ceil(target / 100);
            const updateCount = () => {
                count += increment;
                if (count >= target) {
                    el.textContent = target.toLocaleString();
                } else {
                    el.textContent = count.toLocaleString();
                    requestAnimationFrame(updateCount);
                }
            };
            updateCount();
        });
    });
</script>
