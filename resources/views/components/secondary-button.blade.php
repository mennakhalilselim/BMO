<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 bg-dark-900 border border-dark-600 text-dark-400 hover:text-white rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm hover:bg-dark-600 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
