@props(['post'])

 <div class="relative w-full swiper-slide">
	 <div class="absolute top-0 left-0 w-full h-full bg-pink-800 opacity-50"></div>
	 <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full">
		 <div class="text-4xl font-bold text-white">
			 <a href="{{ route('posts.display', $post->slug) }}">
				{{ $post->title }}
			</a>
		</div>
	 </div>
    <img class="object-cover w-full h-96"
         src="{{ asset('storage/photos/'.$post->user->id.'/'.$post->image) }}"
         alt="image"
         />
 </div>
