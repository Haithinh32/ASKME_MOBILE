<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 hover:text-black']) }}>
    {{ $slot }}
</button>
