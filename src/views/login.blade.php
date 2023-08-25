<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link data-n-head="true" rel="shortcut icon" type="image/ico" href="https://cdn.tirto.id/tirto-front-end-msite-2017/phone/images/favicon.ico">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
  html, body {
      background: #FFF url("{{ config('neon.background-url') }}") no-repeat fixed center;
      background-size: cover;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
  }

  .full-height {
      height: 100vh;
  }

  .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
  }

  .position-ref {
      position: relative;
  }

  .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
  }

  .content {
      text-align: center;
      z-index: 2;
  }

  .title {
      font-size: 1050%;
      color: #FFF;
      /* text-shadow:2px 1px 7px white; */
      letter-spacing: -15px;
      font-family: -apple-system, BlinkMacSystemFont, "Neue Haas Grotesk Text Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-weight: 500;
      padding-bottom: 30px;
  }
  .quote {
      font-size: 1.6rem;
      color: #fff;
      text-shadow:2px 1px 7px black;
      position: fixed;
      top: 20px;
      font-style: italic;
      text-align: right;
  }

  .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
  }

  .m-b-md {
      margin-bottom: 30px;
  }
  a{text-decoration: none;}
  
  span.label {
    font-family: serif;
    font-weight: normal;
  }
  
  .alert-danger{
    color: #813838;
    background-color: #fee2e1;
    border-color: #fdd6d6;
  }
  .alert{
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }
  .background-overlay {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 2;
    background-image: url('img/overlay-vignette.png');
    background-size: 100% 100%;
    opacity: 1;
    transition: opacity .3s ease-out;
  }

  @import url(https://fonts.googleapis.com/css?family=Roboto:500);
.google-btn {
  display: inline-block;
  width: 190px;
  height: 42px;
  background-color: #4285f4;
  border-radius: 2px;
  box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.25);
}
.google-btn .google-icon-wrapper {
  position: absolute;
  margin-top: 1px;
  margin-left: 1px;
  width: 40px;
  height: 40px;
  border-radius: 2px;
  background-color: #fff;
}
.google-btn .google-icon {
  /* position: absolute; */
  margin-top: 11px;
  /* margin-left: 11px; */
  width: 18px;
  height: 18px;
}
.google-btn .btn-text {
  float: right;
  margin: 11px 11px 0 0;
  color: #fff;
  font-size: 14px;
  letter-spacing: 0.2px;
  font-family: "Roboto";
}
.google-btn:hover {
  box-shadow: 0 0 6px #4285f4;
}
.google-btn:active {
  background: #1669F2;
}
  </style>
</head>
<body>
<div class="flex-center position-ref full-height">
  <div class="background-overlay"></div>
  <div class="quote">"{!! str_replace(" - ", '"<br>- ', \Illuminate\Foundation\Inspiring::quote()) !!}</div>
  <div class="content">
    @if (session()->has('error'))
    <div class="alert alert-danger">
      <strong>Whoops!</strong>
      {!! session()->get('error') !!}
    </div>
    @endif
  
    <div class="title">
      {{ config('app.name') }}
    </div>

    <div class="google-btn">
      <a href="{{ $url }}">
        <div class="google-icon-wrapper">
          <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
        </div>
        
        <p class="btn-text"><b>Sign in with google</b></p>
      </a>
    </div>
  </div>
</div>
</body>
</html>
