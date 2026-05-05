@props(['active' => false])
<button class="py-3 {{ $active ? 'border-b-3 border-amber-400' : 'border-transparent' }} ">
    <a class="{{ $active ? 'text-stone-800':' text-stone-400 hover:text-stone-800' }}
    " aria-current="{{ $active ? 'false':'page' }}"
        {{ $attributes }}> {{ $slot }}
    </a>
</button>