@if($paginator->hasPages())
		<div class="flex items-center justify-center space-x-1">
			@if($paginator->onFirstPage())
				<span  class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md">
					Previous
				</span>
			@else
				<a href="{{ $paginator->previousPageUrl() }}" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md">
					Previous
				</a>
			@endif

			@foreach ($elements as $element)

				@if(is_string($element))
					<span href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
						{{ $element }}
					</span>
				@endif
				@if(is_array($element))
					@foreach ($element as $page => $url)
						@if($page == $paginator->currentPage())
							<span class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
								{{ $page }}
							</span>
						@else
							<a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
								{{ $page }}
							</a>
						@endif
					@endforeach
				@endif
				@endforeach



    		@if($paginator->hasMorePages())
				<a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
					Next
				</a>
			@else
				<span class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
					Next
				</span>
			@endif
		</div>

@endif
