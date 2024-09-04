<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
{{-- aria-current="page"  --}}
<a {{ $attributes }}
    class="hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium text-gray-300 rounded-md">{{ $slot }}</a>
