<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @section('csses')
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/contents/myapp.css') }}" rel="stylesheet">
  @show
</head>

<body>
  <div id="app" class="container-fluid px-0">
    <header class="px-2 bg-danger d-flex align-items-center justify-content-between">
      <a class="btn btn-sm btn-light text-danger border-0" href="{{ route('top') }}">TOP</a>
      <img class="header-logo" src="{{ asset('img/img_siteid.png') }}" alt="">
      <div class="d-flex">
        <div><i class="fas fa-search appHeader-icon notclick"></i></div>
        <div class="notclick"><i class="fas fa-bars appHeader-icon ml-3"></i></div>
      </div>
    </header>

    <div class="content px-2 mb-4">
      @yield('content')
    </div>

    <footer>
      <ul class="footer-links bg-secondary d-flex justify-content-center">
        <li class="border-right pr-1 notclick"><a class="text-white" href="/about/index.html">企業情報</a></li>
        <li class="border-right pl-2 pr-1 notclick"><a class="text-white" href="/sitepolicy.html">サイトのご利用について</a></li>
        <li class="pl-2 notclick"><a class="text-white" href="/privacy.html">プライバシーポリシー</a></li>
      </ul>
      <p class="text-center my-2">(C) JAPAN POST</p>
      <div class="footer-logo-wrap bg-danger w-100">
        <img class="footer-logo" src="{{ asset('img/bg_foot.png') }}" alt="">
      </div>
    </footer>
  </div>

  @section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  @show
</body>

</html>
