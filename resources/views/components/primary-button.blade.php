<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-dark-700 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-dark-600 focus:bg-dark-700 active:bg-dark-900 focus:outline-none focus:ring-2 focus:ring-bmo transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
