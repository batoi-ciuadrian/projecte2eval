<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
            Videoclub
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
        </button>
        @if( Auth::check() )
            {!! Menu::make(config('menu'), 'navbar-nav ml-auto') !!}
        @endif
    </div>
</nav>