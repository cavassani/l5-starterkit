@extends('layouts.app')

@section('content')
    <h3 class="text-light-gray"><i class="fa fa-connectdevelop fa-5x"></i></h3>
    <h1 class="text-primary">{{env('APP_NAME')}}</h1>
    <h3 class="text-light-gray">Base para aplicações com Laravel, Bootstrap, Backbone e Marionnete</h3>
    <br>
    <div>
        <!-- Place this tag where you want the button to render. -->
        <a class="github-button" href="https://github.com/lfalmeida/l5-starterkit/archive/master.zip"
           data-icon="octicon-cloud-download" data-style="mega" aria-label="Download lfalmeida/l5-starterkit on GitHub">Download</a>
        <a class="github-button" href="https://github.com/lfalmeida" data-style="mega"
           data-count-href="/lfalmeida/followers" data-count-api="/users/lfalmeida#followers"
           data-count-aria-label="# followers on GitHub" aria-label="Follow @lfalmeida on GitHub">Follow @lfalmeida</a>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </div>
@endsection

