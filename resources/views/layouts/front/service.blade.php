@extends('layouts.front.layout')

@section('main')
	<div class="px-4 pt-24 mx-auto mb-8 max-w-7xl sm:px-6 lg:px-8">
		<div class="sm:flex sm:flex-col sm:align-center">
			<h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">MY SERVICES</h1>
			<p class="mt-5 text-xl text-gray-500 sm:text-center">Here a list of the services* i propose if your interested please sign up and contact me ;)</p>
		</div>
		<div class="grid mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">
			@foreach ($services as $service )


			<div class="bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-sm">
          		<div class="p-6">
           			 <h2 class="text-lg font-medium leading-6 text-gray-900">{{ $service->title }}</h2>
            		 <p class="mt-4 text-sm text-gray-500">All the basics for starting a new business</p>
            		 <p class="mt-8">
              			<span class="text-4xl font-extrabold text-gray-900">{{ $service->price }}€</span>
              			<span class="text-base font-medium text-gray-500">*</span>
            		 </p>
            		 <a href="{{ route('contacts.create') }}#" class="block w-full py-2 mt-8 text-sm font-semibold text-center text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">Contact me</a>
          		</div>
          		<div class="px-6 pt-6 pb-8">
            		<h3 class="text-xs font-medium tracking-wide text-gray-900 uppercase">What's it's mean</h3>

					<div class="mt-6">
						{!! $service->description !!}
					</div>

          		</div>
        	</div>

			@endforeach


		</div>
@endsection
