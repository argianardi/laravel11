{{-- resources/views/components/navbar/link.blade.php --}}
<a {{ $attributes }}
    class="{{ request()->fullUrlIs(url($href)) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}  px-3 py-2 text-sm font-medium rounded-md">{{ $slot }}</a>
