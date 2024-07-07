{{-- @if ($paginator->hasPages())
    <nav aria-label="Page navigation example border">
        <ul class="flex list-style-none justify-end"> --}}
            {{-- Previous Page Link --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600 inline-flex justify-center items-center">
                    <span class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50">Previous</span>
                </li>
            @else
                <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600 inline-flex justify-center items-center">
                    <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                </li>
            @endif --}}

            {{-- Pagination Elements --}}
            {{-- @foreach ($elements as $element) --}}
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="border border-r-0 dark:border-zinc-600 inline-flex justify-center items-center"><span class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50">{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                {{-- @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="border border-violet-500 bg-violet-100 inline-flex justify-center items-center"><span class="relative block px-4 py-2 transition-all duration-300 bg-transparent outline-none page-link text-violet-500 dark:text-zinc-900 dark:hover:text-gray-100 dark:hover:bg-zinc-600 ">{{ $page }}</span></li>
                        @else
                            <li class="border border-l-0 rtl:border-l dark:border-zinc-600 inline-flex justify-center items-center"><a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach --}}

            {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages())
                <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600 inline-flex justify-center items-center"><a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
            @else
                <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600 inline-flex justify-center items-center"><span class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50">Next</span></li>
            @endif
        </ul>
    </nav>
@endif --}}

{{-- @if ($paginator->hasPages())
    <div class="flex flex-wrap gap-3"> --}}

        {{-- Previous and next page navigation --}}
        {{-- <nav aria-label="Page navigation example border">
            <ul class="flex list-style-none"> --}}
                {{-- Previous Page Link --}}
                {{-- @if ($paginator->onFirstPage())
                    <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-300 transition-all duration-300 bg-transparent border-0 outline-none pointer-events-none page-link hover:text-violet-500 focus:shadow-none hover:bg-gray-50/50 dark:text-zinc-100 dark:hover:bg-zinc-600" href="#"><i class="mdi mdi-chevron-double-left"></i></a>
                    </li>
                @else
                    <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="mdi mdi-chevron-double-left"></i></a>
                    </li>
                @endif --}}

                {{-- Pagination Elements --}}
                {{-- @foreach ($elements as $element) --}}
                    {{-- "Three Dots" Separator --}}
                    {{-- @if (is_string($element))
                        <li class="border border-r-0 dark:border-zinc-600">
                            <span class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50">{{ $element }}</span>
                        </li>
                    @endif --}}

                    {{-- Array Of Links --}}
                    {{-- @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="border bg-violet-500 border-violet-500 dark:border-zinc-600">
                                    <span class="relative block px-4 py-2 transition-all duration-300 bg-transparent outline-none page-link text-white dark:text-zinc-900 dark:hover:text-gray-100 dark:hover:bg-zinc-600">{{ $page }}</span>
                                </li>
                            @else
                                <li class="border border-l-0 bg-transparent dark:border-zinc-600">
                                    <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach --}}

                {{-- Next Page Link --}}
                {{-- @if ($paginator->hasMorePages())
                    <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="mdi mdi-chevron-double-right"></i></a>
                    </li>
                @else
                    <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-300 transition-all duration-300 bg-transparent border-0 outline-none pointer-events-none page-link hover:text-violet-500 focus:shadow-none hover:bg-gray-50/50 dark:text-zinc-100 dark:hover:bg-zinc-600" href="#"><i class="mdi mdi-chevron-double-right"></i></a>
                    </li>
                @endif
            </ul>
        </nav> --}}

        {{-- Second set of navigation --}}
        <nav aria-label="Page navigation example border">
            <ul class="flex list-style-none">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-300 transition-all duration-300 bg-transparent border-0 outline-none pointer-events-none page-link hover:text-violet-500 focus:shadow-none hover:bg-gray-50/50 dark:text-zinc-100 dark:hover:bg-zinc-600" href="#"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                @else
                    <li class="border ltr:rounded-l rtl:rounded-r ltr:border-r-0 rtl:border-l-0 dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="border border-r-0 dark:border-zinc-600">
                            <span class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link dark:text-zinc-100 dark:hover:bg-zinc-600 hover:bg-gray-50/50">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="inline-flex items-center justify-center border bg-violet-500 border-violet-500 dark:border-zinc-600">
                                    <span class="relative block px-4 py-2 transition-all duration-300 bg-transparent outline-none page-link text-white dark:text-zinc-900 dark:hover:text-gray-100 dark:hover:bg-zinc-600">{{ $page }}</span>
                                </li>
                            @else
                                <li class="inline-flex items-center justify-center relative border border-l-0 bg-transparent dark:border-zinc-600">
                                    <a class="block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-500 transition-all duration-300 bg-transparent border-0 outline-none page-link hover:text-violet-500 hover:bg-gray-50/50 focus:shadow-none dark:text-zinc-100 dark:hover:bg-zinc-600" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                @else
                    <li class="border ltr:rounded-r rtl:rounded-l dark:border-zinc-600">
                        <a class="relative block px-4 py-2 text-gray-300 transition-all duration-300 bg-transparent border-0 outline-none pointer-events-none page-link hover:text-violet-500 focus:shadow-none hover:bg-gray-50/50 dark:text-zinc-100 dark:hover:bg-zinc-600" href="#"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
{{-- @endif --}}
