@extends('back.layout')

@section('main')

    <form
        method="post"
        action="{{ Route::currentRouteName() === 'categories.edit' ? route('categories.update', $category->id) : route('categories.store') }}">
        @if(Route::currentRouteName() === 'categories.edit')
            @method('PUT')
        @endif

        @csrf
		<div class="grid grid-cols-3 gap-4">
			<div class="col-span-2">
				<x-back.validation-errors :errors="$errors" />
                @if(session('ok'))
                    <x-back.alert
                        type='success'
                        title="{!! session('ok') !!}">
                    </x-back.alert>
                @endif

				<x-back.card
                    type='info'
                    :outline="true"
                    title=''>
                    <x-back.input
                        title='Title'
                        name='title'
                        :value="isset($category) ? $category->title : ''"
                        input='text'
                        :required="true">
                    </x-back.input>
                    <x-back.input
                        title='Slug'
                        name='slug'
                        :value="isset($category) ? $category->slug : ''"
                        input='text'
                        :required="true">
                    </x-back.input>
                </x-back.card>

				<button type="submit" class="btn btn-primary">@lang('Submit')</button>

			</div>
		</div>

	</form>

@endsection

@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
    <script>
        $(function()
        {
            $('#slug').keyup(function () {
              $(this).val(getSlug($(this).val()))
            })
            $('#title').keyup(function () {
              $('#slug').val(getSlug($(this).val()))
            })
        });
    </script>
@endsection
