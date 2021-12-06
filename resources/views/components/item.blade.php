@props([
	'href',
	'title',
	'block' => false,
	'active' => false
])

<a href="{{ $href }}"
   class="@if($active) border-pink-900 border-b-1 text-gray-900 @else text-gray-700 hover:text-gray-900 border-pink-800 hover:border-b-1  @endif inline-flex items-cente px-1 pt-1 text-sm font-medium  @if($block) block @endif">
	{{ $title }}
</a>
