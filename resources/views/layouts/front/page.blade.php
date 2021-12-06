@extends('layouts.front.layout')

@section('main')

	<div class="container w-full mx-auto my-10 overflow-hidden bg-white border rounded md:max-w-3xl">
        <div class="w-full px-4 text-xl leading-normal text-gray-800 md:px-6">
          <span class="text-base font-bold text-gray-700 md:text-sm">
              <
              <span>
                  <a class="text-base font-bold text-gray-700 no-underline md:text-sm hover:underline" href="{{ route('home') }}">BACK</a>
                  <p></p>
                  <h1 class="pt-6 pb-2 font-sans text-3xl font-bold text-gray-900 break-normal md:text-4xl">@lang($page->title)</h1>
              </span>
                <div class="my-4">
                    {!! $page->body !!}
                </div>
            </div>
        </span>
        </div>
    </div>

@endsection
