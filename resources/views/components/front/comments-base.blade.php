@props(['comment'])

<div class="flex">
      <div class="flex-shrink-0 mr-3">
        <img class="w-8 h-8 mt-2 rounded-full sm:w-10 sm:h-10" src="{{ Gravatar::get($comment->user->email) }}" alt="">
      </div>
      <div class="flex-1 px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
        <strong>{{ $comment->user->name }}</strong> <span class="text-xs text-gray-400">{{ formatDate($comment->created_at) }}</span>
        <p class="text-sm">
          {{ $comment->body }}
        </p>
		    @if(Auth::check())
			    <div class="flex justify-between px-3 my-4 align-center">
            <div class="flex items-center">
              <div class="flex mr-2 -space-x-2">
                @foreach ($comment->children as $childcom )
                  <img class="w-6 h-6 border border-white rounded-full" src="{{ Gravatar::get($childcom->user->email) }}" alt="">
                @endforeach
              </div>
              <div class="text-sm font-semibold text-gray-500">
                {{ $comment->children->count() }} Replies
              </div>
            </div>
            @if($comment->depth < config('app.commentsNestedLevel'))
              <a
                class="text-sm font-semibold text-gray-500 replycomment"
                href="#"
                data-name="{{ $comment->user->name }}"
                data-id="{{ $comment->id }}">
                @lang('Reply')
              </a>
				    @endif
				    @if(Auth::user()->name == $comment->user->name)
					    <a href="{{ route('front.comments.destroy', $comment->id) }}"
              class="text-sm font-semibold text-red-500 deletecomment"
					    >@lang('delete')</a>
				    @endif
			    </div>
		    @endif

		  <div class="ml-3">
			  <x-front.comments :comments="$comment->children"/>
		  </div>
        </div>
      </div>
    </div>
