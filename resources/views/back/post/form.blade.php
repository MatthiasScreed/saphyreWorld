@extends('back.layout')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
	<style>
        #holder img {
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('main')

	<form
		method="POST"
		action="{{ Route::currentRouteName() === 'posts.edit' ? route('posts.update', $post->id) : route('posts.store') }}">
			        @if(Route::currentRouteName() === 'posts.edit')
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
                    type='primary'
                    title='Title'>
                    <x-back.input
                        name='title'
                        :value="isset($post) ? $post->title : ''"
                        input='text'
                        :required="true">
                    </x-back.input>
                </x-back.card>

				                <x-back.card
                    type='primary'
                    title='Body'>
                    <x-back.input
                        name='body'
                        :value="isset($post) ? $post->body : ''"
                        input='textarea'
                        rows=10
                        :required="true">
                    </x-back.input>
                </x-back.card>

				<button type="submit" class="btn btn-primary">@lang('Submit')</button>
			</div>

			<div>
				<x-back.card
                    type='primary'
                    :outline="false"
                    title='Publication'>
                    <x-back.input
                        name='active'
                        :value="isset($post) ? $post->active : false"
                        input='checkbox'
                        label="Active">
                    </x-back.input>
                </x-back.card>

				                <x-back.card
                    type='warning'
                    :outline="false"
                    title='Categories'
                    :required="true">
                    <x-back.input
                        name='categories'
                        :values="isset($post) ? $post->categories : collect()"
                        input='selectMultiple'
                        :options="$categories">
                    </x-back.input>
                </x-back.card>

				<x-back.card
                    type='danger'
                    :outline="false"
                    title='Tags'>
                    <x-back.input
                        name='tags'
                        :value="isset($post) ? implode(',', $post->tags->pluck('tag')->toArray()) : ''"
                        input='text'>
                    </x-back.input>
                </x-back.card>

				<x-back.card
                    type='success'
                    :outline="false"
                    title='Slug'>
                    <x-back.input
                        name='slug'
                        :value="isset($post) ? $post->slug : ''"
                        input='text'
                        :required="true">
                    </x-back.input>
                </x-back.card>

				<x-back.card
                    type='primary'
                    :outline="false"
                    title='Image'>
                    <div id="holder" class="text-center" style="margin-bottom:15px;">
                        @isset($post)
                            <img style="width:100%;" src="{{ getImage($post, true) }}" alt="">
                        @endisset
                    </div>
                    <div class="mb-3 input-group">
                      <div class="input-group-prepend">
                        <a id="lfm" data-input="image" data-preview="holder" class="text-white btn btn-primary" class="btn btn-outline-secondary" type="button">Button</a>
                      </div>
                      <input id="image" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500 {{ $errors->has('image') ? 'is-invalid' : '' }}" type="text" name="image" value="{{ old('image', isset($post) ? getImage($post) : '') }}" required>
                      @if ($errors->has('image'))
                          <div class="invalid-feedback">
                              {{ $errors->first('image') }}
                          </div>
                      @endif
                    </div>
                </x-back.card>


			</div>
		</div>

	</form>

@endsection

@section('js')




    @include('back.shared.editorScript')
@endsection
