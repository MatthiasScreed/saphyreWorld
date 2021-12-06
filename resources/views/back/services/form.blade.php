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
		method="post"
		action="{{ Route::currentRouteName() == 'services.edit' ? route('services.update', $service->id) : route('services.store') }}" >
		@if(Route::currentRouteName() === 'services.edit')
			@method('PUT')
		@endif

		@csrf
		<div class="grid grid-cols-3 gap-4">

			<div class="col-span-2">
				<x-back.validation-errors :errors="$errors" />

						@if(session('ok'))
							<x-back.alert
								type='bg-green-500 text-white'
								title="{!! session('ok') !!}">
							</x-back.alert>
						@endif

				<x-back.card
					type="border-blue-600"
					title="Title">
					<x-back.input
						name="title"
						:value="isset($service) ? $service->title : ''"
						input='text'
						:required="true">
					</x-back.input>
				</x-back.card>

				<x-back.card
					type="border-blue-600"
					title="Description">
					<x-back.input
						name="description"
						:value="isset($service) ? $service->description : ''"
						input='textarea'
						rows=10
						:required="true">
					</x-back.input>
				</x-back.card>
				<x-back.input
						name="user_id"
						value='2'
						input='hidden'
				></x-back.input>
				<button type="submit" class="btn btn-primary">@lang('Submit')</button>
			</div>
			<div>
				<x-back.card
					type="border-yellow-600"
					title="Publication">
					<x-back.input
						name="Publication"
						:value="isset($service) ? $service->active : false"
						input='checkbox'
						label="Active">
					</x-back.input>
				</x-back.card>

				<x-back.card
					type="border-yellow-600"
					title="Price">
					<x-back.input
						name="price"
						:value="isset($service) ? $service->price : ''"
						input='number'
						:required="true">
					</x-back.input>
				</x-back.card>

				<x-back.card
					type="border-purple-600"
					:outline="false"
					title="Slug">
					<x-back.input
						name="slug"
						:value="isset($service) ? $service->slug : ''"
						input='text'
						:required="true">
					</x-back.input>
				</x-back.card>
			</div>

		</div>


	</form>

@endsection

@section('js')




    @include('back.shared.editorScript2')
@endsection
