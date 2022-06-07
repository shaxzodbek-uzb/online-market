<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
<div class="h-screen bg-gray-200">
	<!-- container -->
    @if(config('online-market.navigation') == 'header')
        @include('online-market::components.navigation')
    @endif
    <div class="flex w-screen h-screen">

        @if(config('online-market.navigation') == 'sidebar')
            @include('online-market::components.sidebar')
        @endif
        <section class="py-1 bg-blueGray-50 w-full">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
            @yield('content')
        </div>
        <footer class="relative pt-8 pb-6 mt-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                <div class="text-sm text-blueGray-500 font-semibold py-1">
                Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
                </div>
            </div>
            </div>
        </div>
        </footer>
        </section>
    </div>
</div>

</body>
</html>