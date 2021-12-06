@props(['route', 'sub', 'icon'])

<li class="item">
	<a href="{{ route($route) }}" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-teal-600 nav-link {{ currentRouteActive($route) }}">
		<i class="
			@isset($sub)
			far fa-circle
			@endisset
			nav-icon
			@isset($icon)
			fas fa-{{ $icon }}
			@endisset
			"></i>
			{{ $slot }}
	</a>
</li>
