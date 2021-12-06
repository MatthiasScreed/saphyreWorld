@extends('layouts.front.layout')

@section('css')

@endsection

@section('main')
	<div class="w-full my-10 overflow-hidden bg-white border rounded md:w-6/12 md:mx-auto">
		<div class="flex justify-between w-full p-3">
			<div class="flex">
				<div class="flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-500 rounded-full">
					<img src="{{ asset('img/WhatsApp-Image-2021-07-25-at-14.09.40.png') }}" alt="">
				</div>
				<span class="pt-1 ml-2 text-sm font-bold">{{ $post->user->name }}</span>
			</div>
			<a href="{{ route('home') }}">
				<span class="px-2 rounded cursor-pointer hover:bg-gray-300"><i class="pt-2 text-lg fas fa-ellipsis-h"></i></span>
			</a>
		</div>
		<img class="w-full bg-cover"	src="{{ getImage($post) }}" alt="">
		<div class="px-3 pb-2">
			<div class="flex justify-between w-full pt-2">
				<div>
					<i class="mr-3 fas fa-archive"></i>
					@foreach ($post->categories as $category)
						<a href="{{ route('category', $category->slug) }}">
							{{ $category->title }}
						</a>
					@endforeach

				</div>


				<div>
					<i class="mr-3 fas fa-tags"></i>
					@foreach ($post->tags as $tag )
						<a href="{{ route('tag', $tag->slug) }}" class="mr-3">
							{{ $tag->tag }}
						</a>
					@endforeach
				</div>
			</div>
			<div class="flex justify-between pt-2 sm:justify-end">
				@isset($post->previous)
					<a href="{{ route('posts.display', $post->previous->slug) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
						<span>Previous</span>
						{{ $post->previous->title }}
					</a>
				@endisset
				@isset($post->next)
					<a href="{{ route('posts.display', $post->next->slug) }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
						<span>Next One</span>
						{{ $post->next->title }}
					</a>
				@endisset
			</div>
		</div>
		<div class="pt-1">
			<div class="px-3 mb-2 text-sm ">
				<h1 class="mr-2 font-medium">{{ $post->title }}</h1>
				<span>{!! $post->body !!}</span>
			</div>
		</div>
		<div id="comments">
			<div id="commentsList">
				@if($post->valid_comments_count > 0)
					<div id="showbutton" class="mb-2 text-sm text-center text-gray-400 cursor-pointer">
						<a id="showcomments" href="{{ route('posts.comments', $post->id) }}">@lang('View all comments')</a>
					</div>
					<div id="showicon" class="py-3 mr-3 text-center" hidden>
						<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
					</div>
				@endif
			</div>
			@if(Auth::check())
			<div id="respond" class="w-full max-w-xl px-4 py-2 mx-auto">
				<div class="flex flex-wrap mb-6 -mx-3">
					<h3 class="flex flex-col px-4 pt-3 pb-2 text-lg text-gray-800">@lang('Add Comment')
						<span id="forName"></span>
						<span><a id="abort" hidden href="#">@lang('Abort reply')</a></span>
					</h3>
					<div id="alert" class="alert-box" style="display: none">
						<p></p>
						<span class="alert-box__close"></span>
					</div>
					<form id="messageForm" method="post" action="{{ route('post.comments.store', $post->id) }}" autocomplete="off" class="w-full px-3 mt-2 mb-2 md:w-full">
						<input id="commentId" name="commentId" type="hidden" value="">
						<div class="w-full px-3 mt-2 mb-2 md:w-full">
							<textarea id="message" class="w-full h-20 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white" name="message" placeholder="@lang('Your Message')" required></textarea>
						</div>
						<div class="flex items-start w-full px-3 md:w-full">
							<div class="flex items-start w-1/2 px-2 mr-auto text-gray-700">
               					<svg fill="none" class="w-5 h-5 mr-1 text-gray-600" viewBox="0 0 24 24" stroke="currentColor">
                  					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
               					</svg>
              					<p class="pt-px text-xs md:text-sm">Some HTML is okay.</p>
           					</div>
            				<div id="forSubmit" class="-mr-1">
               					<input type='submit' name="submit" id="submit" class="px-4 py-1 mr-1 font-medium tracking-wide text-gray-700 bg-white border border-gray-400 rounded-lg hover:bg-gray-100" value='Post Comment'>
            				</div>
							<p id="commentIcon" class="h-text-center" hidden>
                    			<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                			</p>
						</div>
					</form>
				</div>
			</div>
		@endif
	</div>
		</div>

@endsection

@section('scripts')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		(() => {
			// Variables
			const headers = {
				'X-CSRF-TOKEN': '{{ csrf_token() }}',
				'Content-Type': 'application/json',
				'Accept': 'application/json',
				'X-Requested-With': 'XMLHttpRequest'
			}

			const commentId = document.getElementById('commentId');
          	const alert = document.getElementById('alert');
          	const message = document.getElementById('message');
          	const forName = document.getElementById('forName');
          	const abort = document.getElementById('abort');
          	const commentIcon = document.getElementById('commentIcon');
          	const forSubmit = document.getElementById('forSubmit');

			// Add comment
			const addComment = async e => {
				e.preventDefault();

				// Get datas
				const datas = {
					message: message.value
				};

				if(document.querySelector('#commentId').value != '') {
					datas['commentId'] = commentId.value;
				}

				// Icon
				commentIcon.hidden = false;
				forSubmit.hidden =true;

				// Send request
				const response = await fetch('{{ route('post.comments.store', $post->id )}}', {
					method: 'POST',
					headers: headers,
					body: JSON.stringify(datas)
				});

				// Wait for response
              	const data = await response.json();

				// Icon
              	commentIcon.hidden = true;
              	forSubmit.hidden = false;

				// Manage response
				if (response.ok) {
					purge();
					if(data == 'ok') {
						showComments();
						showAlert('success', '@lang('Your comment has been saved')');
					} else {
						showAlert('info', "@lang('Thanks love for your comment. It will appear soon')");
					}
				} else {
					if(response.status == 422) {
						showAlert('error', data.error.message[0]);
					} else {
						errorAlert();
					}
				}
			}

			const errorAlert = () =>  Swal.fire({
                icon: 'error',
                title: '@lang('Whoops!')',
                text: '@lang('Something went wrong!')'
            });
          	// Show alert
          	const showAlert = (type, text) => {
              	alert.style.display = 'block';
              	alert.className = '';
              	alert.classList.add('alert-box', 'alert-box--' + type);
              	alert.firstChild.textContent = text;
          	}

			// Hide alert
          	const hideAlert = () => alert.style.display = 'none';

			// Prepare show comments
			const prepareShowComments = e => {
				e.preventDefault();

				document.getElementById('showbutton').toggleAttribute('hidden');
				document.getElementById('showicon').toggleAttribute('hidden');
				showComments();
			}

			// Show comments
			const showComments = async () => {

				//send request
				const response = await fetch('{{ route('posts.comments', $post->id) }}', {
					method: 'GET',
					headers: headers
				});

				//Wait for response
				const data = await response.json();

				document.getElementById('commentsList').innerHTML = data.html;
				@if(Auth::check())
					document.getElementById('respond').hidden = false;
				@endif
			}

			// Reply to comment
          	const replyToComment = e => {
              	e.preventDefault();

              	forName.textContent = `@lang('Reply to') ${e.target.dataset.name}`;
              	commentId.value = e.target.dataset.id;

              	abort.hidden = false;
              	message.focus();
          	}
          	// Abort reply
          	const abortReply = (e) => {
              	e.preventDefault();
              	purge();
          	}
          	// Purge reply
          	const purge = () => {
              	forName.textContent = '';
              	commentId.value = '';
              	message.value = '';
              	abort.hidden = true;
          	}



			// Delete comment
			const deleteComment = async e => {
    			e.preventDefault();
    			Swal.fire({
      			title: '@lang('Really delete this comment?')',
      			icon: "warning",
      			showCancelButton: true,
      			confirmButtonColor: "#DD6B55",
      			confirmButtonText: "@lang('Yes')",
      			cancelButtonText: "@lang('No')",
      			preConfirm: () => {
          			return fetch(e.target.getAttribute('href'), {
              			method: 'DELETE',
              			headers: headers
          			})
          			.then(response => {
              			if (response.ok) {
                  			showComments();
              			} else {
                  			errorAlert();
              			}
          			});
      			}
    			});
			}

			// Listener wrapper
			const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
				const element = document.querySelector(selector);
				if(element) {
					document.querySelector(selector).addEventListener(type, e => {
						if(eval(condition)) {
							callback(e);
						}
					}, capture);
				}
			};

			// Set listeners
			window.addEventListener('DOMContentLoaded', () => {
				wrapper('#showcomments', 'click', prepareShowComments);
				wrapper('#abort', 'click', abortReply);
				wrapper('#message', 'focus', hideAlert);
				wrapper('#messageForm', 'submit', addComment);
				wrapper('#commentsList', 'click', replyToComment, "e.target.matches('.replycomment')");
				wrapper('#commentsList', 'click', deleteComment, "e.target.matches('.deletecomment')");
			})
		})()
	</script>
@endsection
