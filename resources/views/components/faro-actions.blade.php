@props([
    'type' => 'index',
    'colors' => [
        'index' => 'bg-gray-500 hover:bg-yellow-500',
        'create' => 'bg-gray-500 hover:bg-green-500',
    ],
    'redirect' => 'index',
    'link' => [
        'index' => '/faro',
        'create' => '/faro/create',
    ]
])

<a {{ $attributes->merge(['href' => "{$link[$redirect]}"]) }} 
    {{ $attributes->merge([
        'class' => "{$colors[$type]} flex items-center justify-center md:h-auto md:p-3 text-center p-1 h-8 rounded-md text-sm text-white transition ease-in-out"]) }}>
    {{ $slot }}
</a>