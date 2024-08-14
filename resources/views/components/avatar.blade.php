@props(['src' => null, 'story' => null])

<div
    {{$attributes->merge([
        'class' => "shrink-0 inline-flex items-center justify-center 
                  overflow-hidden rounded-full border border-gray-200
                  dark:border-secondary-500 text-base "])
                  ->class($story ? 'bg-gradient-to-r p-[2px] ring-2 ring-white from-purple-400 via-pink-500 to-red-500 rounded-full' : '')
    }}>

    @if ($src)
    <img
        @class(['shrink-0 w-full h-full object-cover object-center rounded-full'])
        src="{{ $src }}" />
    @else
    <svg class="w-7 h-7 shrink-0 text-gray-300 bg-gray-100 rounded-full" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
        <path fill="#A7A9AE" fill-rule="nonzero" d="M256 0c70.69 0 134.69 28.655 181.018 74.982C483.345 121.31 512 185.31 512 256s-28.655 134.69-74.982 181.018C390.69 483.345 326.69 512 256 512s-134.69-28.655-181.018-74.982C28.655 390.69 0 326.69 0 256S28.655 121.31 74.982 74.982C121.31 28.655 185.31 0 256 0zm-49.371 316.575c-.992-1.286 2.594-10.118 3.443-11.546-9.722-8.651-17.404-17.379-19.041-35.34l-1.043.022c-2.408-.032-4.729-.586-6.903-1.825-3.481-1.979-5.93-5.379-7.583-9.212-3.5-8.043-15.031-34.738 2.537-32.628-9.823-18.345 12.409-49.684-25.935-61.275 31.46-39.845 97.839-101.281 146.483-39.654 53.245 5.16 69.853 68.437 34 103.093 2.101.076 4.08.56 5.832 1.498 6.665 3.57 6.884 11.318 5.132 17.819-1.733 5.429-3.934 9.104-6.01 14.397-2.524 7.147-6.215 8.478-13.345 7.708-.362 17.67-8.528 26.343-19.518 36.724l3.007 10.187c-14.737 31.261-75.957 32.518-101.056.032zM78.752 394.224c12.076-51.533 45.656-33.396 110.338-73.867 22.982 47.952 116.386 51.437 135.54 0 55.35 35.384 98.967 20.923 109.958 72.138 28.965-37.841 46.176-85.158 46.176-136.495 0-62.068-25.158-118.26-65.83-158.934C374.26 56.394 318.068 31.236 256 31.236S137.74 56.394 97.066 97.066C56.394 137.74 31.236 193.932 31.236 256c0 52.123 17.744 100.099 47.516 138.224z" />
    </svg>
    @endif
</div>