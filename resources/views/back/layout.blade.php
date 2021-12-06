<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/back/style.css') }}">
  @yield('css')
  <title>@lang('Administration')</title>
</head>
<body class="bg-gray-100">


<!-- start navbar -->
<div class="flex flex-row flex-wrap items-center p-6 bg-white border-b border-gray-300 md:fixed md:w-full md:top-0 md:z-20">

    <!-- logo -->
    <div class="flex flex-row items-center flex-none w-56">
      <img src="{{ Gravatar::get(Auth::user()->email) }}" class="flex-none w-10 rounded-full">
      <strong class="flex-1 ml-1 capitalize">{{ Auth::user()->name }}</strong>

      <button id="sliderBtn" class="flex-none hidden text-right text-gray-900 md:block">
        <i class="fad fa-list-ul"></i>
      </button>
    </div>
    <!-- end logo -->

    <!-- navbar content toggle -->
    <button id="navbarToggle" class="right-0 hidden mr-6 md:block md:fixed">
      <i class="fad fa-chevron-double-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar" class="flex flex-row flex-wrap items-center justify-between flex-1 pl-3 animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white md:flex-col md:items-center">
      <!-- left -->
      <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>
      </div>
      <!-- end left -->

      <!-- right -->
      <div class="flex flex-row-reverse items-center">

        <!-- user -->
        <div class="relative dropdown md:static">

          <button class="flex flex-wrap items-center menu-btn focus:outline-none focus:shadow-outline">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="object-cover w-full h-full" src="img/user.svg" >
            </div>

            <div class="flex ml-2 capitalize ">
              <h1 class="p-0 m-0 text-sm font-semibold leading-none text-gray-800">moeSaid</h1>
              <i class="ml-2 text-xs leading-none fad fa-chevron-down"></i>
            </div>
          </button>

          <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

          <div class="absolute right-0 z-20 hidden w-40 py-2 mt-5 text-gray-500 bg-white rounded shadow-md menu md:mt-10 md:w-full animated faster">

            <!-- item -->
            <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
              <i class="mr-1 text-xs fad fa-user-edit"></i>
              edit my profile
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
              <i class="mr-1 text-xs fad fa-inbox-in"></i>
              my inbox
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
              <i class="mr-1 text-xs fad fa-badge-check"></i>
              tasks
            </a>
            <!-- end item -->

            <!-- item -->
            <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
              <i class="mr-1 text-xs fad fa-comment-alt-dots"></i>
              chats
            </a>
            <!-- end item -->

            <hr>

            <!-- item -->
            <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
              <i class="mr-1 text-xs fad fa-user-times"></i>
              log out
            </a>
            <!-- end item -->

          </div>
        </div>
        <!-- end user -->

        <!-- notifcation -->
        <div class="relative mr-5 dropdown md:static">

          <button class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none">
            <i class="fad fa-bells"></i>
          </button>

          <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

          <div class="absolute right-0 z-20 hidden py-2 mt-5 bg-white rounded shadow-md menu md:right-0 md:w-full w-84 animated faster">
            <!-- top -->
            <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
              <h1>notifications</h1>
              <div class="px-1 text-xs text-teal-500 bg-teal-100 border border-teal-200 rounded">
                <strong>5</strong>
              </div>
            </div>
            <hr>
            <!-- end top -->

            <!-- body -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                <i class="text-sm fad fa-birthday-cake"></i>
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">poll..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>4 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                <i class="text-sm fad fa-user-circle"></i>
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mohamed..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>78 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                <i class="text-sm fad fa-images"></i>
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">new imag..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>65 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                <i class="text-sm fad fa-alarm-exclamation"></i>
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">time is up..</h1>
                  <p class="text-xs text-gray-500">text here also</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>1 min ago</p>
                </div>
              </div>

            </a>
            <!-- end item -->


            <!-- end body -->

            <!-- bottom -->
            <hr>
            <div class="px-4 py-2 mt-2">
              <a href="#" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-teal-500">
                view all
              </a>
            </div>
            <!-- end bottom -->
          </div>
        </div>
        <!-- end notifcation -->

        <!-- messages -->
        <div class="relative mr-5 dropdown md:static">

          <button class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none">
            <i class="fad fa-comments"></i>
          </button>

          <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

          <div class="absolute right-0 z-20 hidden py-2 mt-5 bg-white rounded shadow-md menu md:w-full md:right-0 w-84 animated faster">
            <!-- top -->
            <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
              <h1>messages</h1>
              <div class="px-1 text-xs text-teal-500 bg-teal-100 border border-teal-200 rounded">
                <strong>3</strong>
              </div>
            </div>
            <hr>
            <!-- end top -->

            <!-- body -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                <img class="object-cover w-full h-full" src="img/user1.jpg" alt="">
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mohamed said</h1>
                  <p class="text-xs text-gray-500">yeah i know</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>4 min ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                <img class="object-cover w-full h-full" src="img/user2.jpg" alt="">
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">sull goldmen</h1>
                  <p class="text-xs text-gray-500">for sure</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>1 day ago</p>
                </div>
              </div>

            </a>
            <hr>
            <!-- end item -->

            <!-- item -->
            <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

              <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                <img class="object-cover w-full h-full" src="img/user3.jpg" alt="">
              </div>

              <div class="flex flex-1 flex-rowbg-green-100">
                <div class="flex-1">
                  <h1 class="text-sm font-semibold">mick</h1>
                  <p class="text-xs text-gray-500">is typing ....</p>
                </div>
                <div class="text-xs text-right text-gray-500">
                  <p>31 feb</p>
                </div>
              </div>

            </a>
            <!-- end item -->


            <!-- end body -->

            <!-- bottom -->
            <hr>
            <div class="px-4 py-2 mt-2">
              <a href="#" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-teal-500">
                view all
              </a>
            </div>
            <!-- end bottom -->
          </div>
        </div>
        <!-- end messages -->


      </div>
      <!-- end right -->
    </div>
    <!-- end navbar content -->

  </div>
<!-- end navbar -->


<!-- strat wrapper -->
<div class="flex flex-row flex-wrap h-screen">

    <!-- start sidebar -->
  <div id="sideBar" class="relative flex flex-col flex-wrap flex-none w-64 p-6 bg-white border-r border-gray-300 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

      <!-- sidebar toggle -->
      <div class="hidden mb-4 text-right md:block">
        <button id="sideBarHideBtn">
          <i class="fad fa-times-circle"></i>
        </button>
      </div>
      <!-- end sidebar toggle -->

      <p class="mb-4 text-xs tracking-wider text-gray-600 uppercase">homes</p>

      <!-- link -->
      <a href="{{ route('home') }}" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-teal-600">
        <i class="mr-2 text-xs fad fa-chart-pie"></i>
        @lang('Show blog')
      </a>
      <!-- end link -->

      <!-- link -->

      <!-- end link -->

      <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">apps</p>
	  <ul class="list-none">
	  @foreach (config('menu') as $name => $elements)
	  	@if($elements['role'] === 'redac' || auth()->user()->isAdmin())
	  		@isset($elements['children'])
			  <li class="my-3 item">
				<a href="#" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-teal-600 {{ currentChildActive($elements['children']) }}">
        			<i class="mr-2 text-xs fad fa-{{ $elements['icon'] }}"></i>
       				 @lang($name)
					<i class="right fas fa-angle-left"></i>
      			</a>
			  </li>

				<ul class="nav nav-treeview">
                    @foreach($elements['children'] as $child)
                        @if(($child['role'] === 'redac' || auth()->user()->isAdmin()) && $child['name'] !== 'fake')
                            <x-back.menu-item
                                :route="$child['route']"
                                :sub=true>
                                @lang($child['name'])
                            </x-back.menu-item>
                        @endif
                    @endforeach
                </ul>
		@else
		    <x-back.menu-item
                :route="$elements['route']"
                :icon="$elements['icon']">
                @lang($name)
            </x-back.menu-item>
        	@endisset
        @endif
	  @endforeach
	  </ul>




    </div>
    <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->

  <!-- strat content -->
  <div class="flex-1 p-6 overflow-hidden bg-gray-100 md:mt-16">

	<h1 class="m-0 text-dark">@lang($title)</h1>
    <!-- congrats & summary -->

	@yield('main')

  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ asset('js/back/script.js') }}"></script>
<!-- end script -->
@yield('js')
</body>
</html>
