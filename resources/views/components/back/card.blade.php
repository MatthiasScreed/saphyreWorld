@props([
    'outline' => true,
    'type',
    'title',
])

<div class="card @if($outline) card-outline @endif card-{{ $type }} overflow-hidden
  bg-white m-4 rounded-2xl">
	<div class="px-8 py-4 mt-3">
		<div class="flex items-center justify-between h-20 border-blue-400 broder-t">
        <p class="mr-20 text-lg text-gray-700">{{ __($title) }}</p>
      	</div>

      <div class="flex justify-between px-5 my-2 text-sm text-gray-600">
        {{ $slot }}
      </div>
	</div>

    </div>
