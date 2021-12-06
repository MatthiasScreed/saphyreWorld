<h3 class="px-3">
	@lang('Comments')
	@if(Auth::guest())
	<div class="flex items-center p-4 mt-3 border-t-2 border-gray-100">
		<span class="text-light-blue-600">@lang('You must be connected to add a comment or reply.')</span>
	</div>
	@endif
	<div class="space-y-4">
		<x-front.comments :comments="$comments"/>
	</div>
</h3>
