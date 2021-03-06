@extends("images.layout")
@section('title',$name)
@section('head')
    @if(Str::contains($mimeType,'video'))

        <meta property="og:type" content="website">
        <meta property="og:video" content="{{$rawUrl}}">
        <meta property="og:video:type" content="{{$mimeType}}">
        <meta property="og:description" content="">
        <meta property="og:image" content="">

        {{-- Twitter: --}}
        <meta name="twitter:card" content="player">
        <meta name="twitter:player:stream:content_type" content="{{$mimeType}}">
        <meta name="twitter:player" content="{{$rawUrl}}">
        <meta name="twitter:player:stream" content="{{$rawUrl}}">
        <meta name="twitter:player:height" content="480">

    @else
        <meta property="og:image" content="{{$rawUrl}}"/>
        <meta property="og:image:type" content="{{$mimeType}}"/>
        <meta property="twitter:image" content="{{$rawUrl}}"/>
    @endif
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div class="is-align-content-center is-align-items-center">
                <div class="has-text-centered mb-4">
                    <h1 class="title page-title mb-1 is-size-3-mobile">
                        <span class="has-text-primary">{{$uuid}}</span>.{{$type}} - <span
                            class="has-text-primary">{{$size}}</span> KB
                    </h1>
                    <h2 class="subtitle page-subtitle mt-2 is-size-5-mobile">{{\Carbon\Carbon::parse($created)->setTimezone("America/Los_Angeles")->toDayDateTimeString()}}</h2>
                </div>
                <br>
                <figure class="is-flex is-justify-content-center">

                    @if(Str::contains($mimeType,'video'))
                        <video class="is-align-self-center" controls>
                            <source src="{{$rawUrl}}" type="{{$mimeType}}">
                        </video>
                    @else
                        <a href="{{$rawUrl}}" target="_blank">
                            <img class="is-align-self-center" src="{{$rawUrl}}">
                        </a>
                    @endif
                </figure>
                <br>
                @if(Str::contains($mimeType,'video'))
                <div class="has-text-centered has-text-danger has-text-weight-bold is-hidden-tablet">
                    Because you're on a mobile device, the video may not load. Sorry!
                </div>
                @endif
                <br>
                <div class="container-sm">
                    <p class="buttons has-addons is-justify-content-center">
                        <button onclick="Copy('{{url()->current()}}')" class="button is-light is-outlined">
                            <span class="icon is-left">
                                <i class="fas fa-copy"></i>
                            </span>
                            <span>Copy Url</span>
                        </button>
                        <button onclick="Copy('{{$rawUrl}}')" class="button is-light is-outlined">
                            <span class="icon is-left">
                                <i class="fas fa-copy"></i>
                            </span>
                            <span>Copy Raw Url</span>
                        </button>
                        <a class="button is-light is-outlined" href="{{$rawUrl}}" download>
                            <span class="icon is-left">
                                <i class="fas fa-download"></i>
                            </span>
                            <span>Download</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script>
        function Copy(text) {
            navigator.clipboard.writeText(text)
        }
    </script>
@endsection
