<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>


    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="{{ url('top')}}"><img class="atlas-logo" src="{{asset('images/atlas.png')}}" alt='Atlas'></a></h1>
                <div id="header-item">
                    <p class="header-username">{{Auth::user()->username}}さん</p>
                    <div class="header-btn">
                    <span class="header-btn1"></span>
                    <span class="header-btn2"></span>
                    </div>
                    @if(Auth::user()->images == 'dawn.png')
                    <img src="{{asset('images/icon1.png')}}" alt="{{Auth::user()->username}}">
                    @else
                    <img src="{{asset('images/'.Auth::user()->images)}}" alt="{{Auth::user()->username}}">
                    @endif
                <div>
        </div>
    </header>


    <div id="row">
        <div id="container">
            <!-- <div class="border" style="border"></div> -->
            @yield('content')

        </div >

        <div id="side-bar">

      <ul class="menu">
        <!-- アコーディオン -->
        <li><a href="/top">ホーム</a></li>
        <li><a href="/profile">プロフィール</a></li>
        <li><a href="/login">ログアウト</a></li>
      </ul>

            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div class='side-follow'>
                <p class=>フォロー数</p>
                <p>{{Auth::user()->followUsers->count()}}名</p>
                </div>
                <p class="side_button"><a class="btn btn-primary" href="/follow-list">フォローリスト</a></p>

                <div class='side-follow'>
                <p>フォロワー数</p>
                <p>{{Auth::user()->followers->count()}}名</p>
                </div>
                <p class="side_button"><a class="btn btn-primary" href="/follower-list">フォロワーリスト</a></p>
            </div>
            <div class="side-border"></div>
            <p class="side_search_button"><a class="btn btn-primary" href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
