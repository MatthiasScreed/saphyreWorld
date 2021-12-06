<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ config('app.name') }}</title>
	{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<style type="text/css"> .btcpay-form { display: inline-flex; align-items: center; justify-content: center; } .btcpay-form--inline { flex-direction: row; } .btcpay-form--block { flex-direction: column; } .btcpay-form--inline .submit { margin-left: 15px; } .btcpay-form--block select { margin-bottom: 10px; } .btcpay-form .btcpay-custom-container{ text-align: center; }.btcpay-custom { display: flex; align-items: center; justify-content: center; } .btcpay-form .plus-minus { cursor:pointer; font-size:25px; line-height: 25px; background: #DFE0E1; height: 30px; width: 45px; border:none; border-radius: 60px; margin: auto 5px; display: inline-flex; justify-content: center; } .btcpay-form select { -moz-appearance: none; -webkit-appearance: none; appearance: none; color: currentColor; background: transparent; border:1px solid transparent; display: block; padding: 1px; margin-left: auto; margin-right: auto; font-size: 11px; cursor: pointer; } .btcpay-form select:hover { border-color: #ccc; } #btcpay-input-price { -moz-appearance: none; -webkit-appearance: none; border: none; box-shadow: none; text-align: center; font-size: 25px; margin: auto; border-radius: 5px; line-height: 35px; background: #fff; } #btcpay-input-price::-webkit-outer-spin-button, #btcpay-input-price::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }</style>
	@yield('css')
</head>
<body class="bg-gray-200">


	@yield('modal')

	<header>
		<nav x-data="{isOpen: false}" class="bg-white shadow">
			<div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
				<div class="flex items-center justify-between h-14">
					<a href="{{ route('home') }}" class="flex items-center">
						<img src="{{ asset('/img/WhatsApp-Image-2021-07-25-at-14.09.40.png') }}" class="w-auto h-8 rounded-full shadow " alt="">
						<span href="#" class="ml-4 text-xl text-gray-800 hover:text-gray-700"> | the saphyre 's world</span>
					</a>
					<button @click="isOpen = !isOpen" class="w-8 h-8 p-1 text-gray-300 bg-red-700 rounded-md md:hidden focus:outline-none">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z">
                            </path>
                        </svg>
                    </button>
					<div class="hidden space-x-2 md:block">
							<x-item title="Service" href="{{ route('services') }}" />
							<x-item title="About" href="{{ route('page', 'about-me') }}" />
							<x-item title="Contact" href="{{ route('contacts.create') }}" />
						@guest
							<x-item title="Sign Up" href="{{ route('register') }}" />
							<x-item title="Login" href="{{ route('login') }}" />
						@endguest
						@auth
							@if(auth()->user()->role != 'user')
								<x-item title="Administration" href="{{ url('admin') }}" />
							@endif
								<form action="{{ route('logout') }}" method="POST" hidden>
								@csrf
								</form>
								<a href="{{ route('logout') }}"
								onclick="event.preventDefault(); this.previousElementSibling.submit();"
								class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">@lang('logout')</a>
								<a class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700"
								href="{{ url('profile') }}">@lang('Profile')</a>
						@endauth
					</div>
				</div>
				<div x-show="isOpen" @click.away="isOpen = false" class="md:hidden">
					<div class="px-2 pb-2 space-y-1">
						<a href="{{ route('services') }}" class="items-center block px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-pink-600 ">Services</a>

						<a href="{{ route('page', 'about-me') }}" class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">About</a>

						<a href="{{ route('contacts.create') }}" class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">Contact</a>
						@guest
							<a href="{{ route('register') }}" class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">Sign Up</a>
							<a href="{{ route('login') }}" class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">@lang('Login')</a>
						@endguest
						@auth
							@if(auth()->user()->role != 'user')
									<a href="{{ url('admin') }}"

									class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">@lang('Administration')</a>
								@endif
								<form action="{{ route('logout') }}" method="POST" hidden>
								@csrf
								</form>
								<a href="{{ route('logout') }}"
								onclick="event.preventDefault(); this.previousElementSibling.submit();"
								class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700">@lang('logout')</a>
								<a class="items-center block px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700"
								href="{{ url('profile') }}">@lang('Profile')</a>
						@endauth
					</div>
				</div>
			</div>
		</nav>


		@yield('hero')
	</header>
<div class="">
		@yield('main')
</div>
<footer class="bg-gray-800">
	<div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:py-16 lg:px-8">
		<div class="pb-8 text-gray-800 sm:flex sm:mt-8 sm:items-start">
		<div class="flex flex-col md:flex-shrink">
				<div>
					<div class="px-3 py-2">
					<!-- Col Title -->
						<div class="mb-6 text-xs font-medium text-gray-400 uppercase">
							About me
						</div>
						<p class="my-3 text-sm font-light text-gray-300">
							I'm merely trying to live my life to the best of my abilities and enjoy it as much as I can. Sex is part of the enjoyment, and I'd rather share this little enjoyment than keep it for myself! I hope you too are enjoying your life as much as you can! Come and embark on a sensual and pleasurable journey with me.
						</p>
					</div>
				</div>
		</div>
		<div class="flex flex-col md:flex-1">
			<div class="">
					<div class="px-3 py-2">
						<div class="mb-6 text-xs font-medium text-gray-400 uppercase">
							@lang('Follow me')
						</div>
						@foreach ($follows as $follow)
						<a href="{{ $follow->href }}" target="_blank" rel="noopener noreferrer" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                			{{ $follow->title }}
            			</a>
						@endforeach
					</div>
				</div>
		</div>
		<div class="flex flex-col md:flex-1">
			<div>
				<div class="px-3 py-2">
					<div class="mb-6 text-xs font-medium text-gray-400 uppercase">
					@lang('Site Links')
				</div>
				@foreach ($pages as $page)
					<a href="{{ route('page', $page->slug) }}" class="block my-3 text-sm font-medium text-gray-300 duration-700 hover:text-gray-100">
                		@lang($page->title)
            		</a>
				@endforeach
				</div>
			</div>

		</div>
		<div class="flex flex-col">
			<div class="px-3 py-2">
				@if(Auth::check())
				<div class="mb-6 text-xs font-medium text-gray-400 uppercase">
					@lang('If you lik what you see')
				</div>

				<div class="flex flex-col flex-none space-y-4">
					<p class="text-gray-300">
						i'm kinky but a girl gotta eat i also like crypto if you like to help produce more content
						please considere donate it's help a lot
					</p>
					<form method="POST" action="https://mainnet.demo.btcpayserver.org/api/v1/invoices" class="btcpay-form btcpay-form--inline">
  						<input type="hidden" name="storeId" value="BnLJxMv5YoVtdXEMxXu3q4VDQSrNBfxN5jAxxu6fSC35" />
  						<div class="btcpay-custom-container">
    						<div class="btcpay-custom">
      							<button class="plus-minus" onclick="event.preventDefault(); var el=document.querySelector('#btcpay-input-price'); var price = parseInt(el.value); if((price - 0.00001 )< 0) { el.value = 0} else {el.value = parseInt(el.value) - 0.00001 }">-</button>
      							<button class="plus-minus" onclick="event.preventDefault(); var el=document.querySelector('#btcpay-input-price'); var price = parseInt(el.value); if((price + 0.00001 )> 20) { el.value = 20} else {el.value = parseInt(el.value) + 0.00001 }">+</button>
    						</div>
    						<select name="currency">
      							<option value="BTC" selected>BTC</option>
    						</select>
  						</div>
  						<input type="image" class="submit" name="submit" src="https://mainnet.demo.btcpayserver.org/img/paybutton/pay.svg" style="width:146px" alt="Pay with BtcPay, Self-Hosted Bitcoin Payment Processor">
					</form>
					<span class="text-xs text-red-600">Also i can't not be responsable for the miss use or any problem regarding your wallet if you donate</span>
				</div>
				@endif
			</div>
		</div>

	</div>
	</div>

	<div class="pt-2">
		<div class="flex flex-col max-w-6xl px-3 pt-5 pb-5 m-auto text-sm text-gray-400 border-t border-gray-500 md:flex-row">

			<div class="mt-2">
				© Copyright 2021-year. All Rights Reserved.
			</div>
		<!-- Required Unicons (if you want) -->
            <div class="flex flex-row mt-2 md:flex-auto md:flex-row-reverse">
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-facebook-f"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-twitter-alt"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-youtube"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-linkedin"></i>
                </a>
                <a href="#" class="w-6 mx-1">
                    <i class="uil uil-instagram"></i>
                </a>
            </div>
		</div>
	</div>
</footer>


		@yield('scripts')
</body>
</html>
