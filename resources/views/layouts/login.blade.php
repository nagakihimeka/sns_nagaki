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
        <h1><a href="{{ url('top')}}"><img class="atlas-logo" src="images/atlas.png"></a></h1>
            <div id="">
                <div id="header-item">
                    <p class="header-username">{{Auth::user()->username}}さん</p>
                    <div class="header-btn">
                    <span class="header-btn1"></span>
                    <span class="header-btn2"></span>
                    </div>
                    <img src="images/icon1.png">
                <div>
                <ul>
                    <!-- アコーディオン -->
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/login">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            <div class="border" style="border"></div>
            @yield('content')

        </div >

        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div class='side-follow'>
                <p class=>フォロー数</p>
                <p>{{Auth::user()->followUsers->count()}}名</p>
                </div>
                <p class="btn side-link-btn"><a href="/follow-list">フォローリスト</a></p>
                <div class='side-follow'>
                <p>フォロワー数</p>
                <p>{{Auth::user()->followers->count()}}名</p>
                </div>
                <p class="btn side-link-btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
