@extends('layouts.front.layout')

@section('css')
	<link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
@endsection


@section('modal')

	@include('partials.warning-modal')

@endsection


@section('hero')
	@isset($heros)
	<div class="w-full h-full swiper mySwiper">
		<div class="swiper-wrapper">
			@foreach ($heros as $hero)
				<x-front.hero :post="$hero"/>
			@endforeach
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
      	<div class="swiper-button-next"></div>
	</div>
	@endisset


 {{-- <div class="max-w-5xl py-2 mx-auto lg:py-32">
	<h2 class="mb-4 text-4xl font-semibold leading-none text-white lg:text-5xl">
		Welcome to My site where show stuff that i like
	</h2>
	<div class="flex flex-wrap items-center justify-start max-w-2xl mx-auto md:mx-0">
		<div class="w-full mb-4 lg:pr-5 lg:w-1/2 lg:mb-0">
			<p class="mb-2 tracking-wide text-white">
				and other kinky stuff
			</p>
		</div>
	</div>
</div> --}}
<div class="max-w-5xl px-4 py-12 mx-auto lg:py-16 lg:px-0">
	<div class="flex flex-row justify-center mt-4 mr-16">
		@foreach ($categories as $category )
			<a href="{{ route('category', $category->slug) }}" class="mr-2 text-sm font-medium text-gray-700">{{ $category->title }}</a>
		@endforeach
	</div>
</div>
@endsection


@section('main')
<div class="bg-white">
	<div class="max-w-5xl px-4 py-12 mx-auto lg:py-16 lg:px-0">
			<div class="flex flex-wrap pt-4 -mx-2">
				@foreach ($posts as $post )
					<article class="w-1/2 px-2 mb-2 text-center md:w-1/3 lg:w-1/6">
						<a href="{{ route('posts.display', $post->slug) }}" class="flex flex-col w-full px-3 text-center group ">
							<img class="block object-cover w-full h-auto filter blur group-hover:blur-none" src="{{ getImage($post, true) }}" alt="">
							<div class="flex items-center justify-center flex-1 my-3 ">
								<span class="text-center">{{ $post->title }}</span>
							</div>
						</a>
					</article>
				@endforeach
			</div>
			<div class="w-full px-3 py-2 ">
				{{ $posts->links('layouts.front.pagination') }}
			</div>
	</div>
</div>
@endsection


@section('scripts')
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<script>
		window.onload = function () {
			if(localStorage.getItem('popState') != 'shown'){
				document.getElementById('modal-warning').style.display = "block";
				localStorage.setItem('popState', 'shown')
			}else {
				document.getElementById('modal-warning').style.display = "none";
			}
		// Show the modal only if new user
    document.getElementById('closemodal').onclick = function () {
        document.getElementById('modal-warning').style.display = "none"

   	 };
	};


		const swiper = new Swiper('.mySwiper', {
			cssMode: true,
			direction: 'horizontal',
			loop:true,
			slidesPerView: 1,
			pagination: {
				el: '.swiper-pagination',
				type: 'bullets',
				clickable:true,

			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',

			},
			mousewheel: true,
			keyboard: true,
		});
		swiper.slideNext();
	</script>
@endsection
