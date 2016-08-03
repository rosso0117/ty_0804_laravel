<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/validationEngine.jquery.css">
  <link rel="stylesheet" href="/css/styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.0/Chart.min.js"></script>
  <script src="/js/jquery.validationEngine.js"></script>
  <script src="/js/jquery.validationEngine-ja.js"></script>
  <script src="/js/validate.js"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Caffeine</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#about" data-toggle="tab">カフェインとは</a></li>
            <li><a href="#utility" data-toggle="tab">作用</a></li>
            <li><a href="#contain" data-toggle="tab">カフェインを含む飲料</a></li>
            <li><a href="#intake" data-toggle="tab">摂取量目安計算</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield('content')

  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.smooth-scroll.js"></script>
  <script src="/js/jquery-countTo.min.js"></script>
  <script src="/js/script.js"></script>
</body>
</html>
