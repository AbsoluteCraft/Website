@extends('layouts.master', ['page' => 'home'])

@section('content')
    <main class="home">
        <div class="items">
            <div class="row">
                <div class="item item-lg">
                    <div class="item-embed">
                        <div class="lazyframe" data-vendor="youtube" data-src="http://www.youtube.com/embed/MPpLmp9BnEs&showinfo=0&rel=0"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item-embed">
                        <div class="lazyframe" data-vendor="youtube" data-src="http://www.youtube.com/embed/NZRzY8j7MW4&showinfo=0&rel=0"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item-embed">
                        <div class="lazyframe" data-vendor="youtube" data-src="http://www.youtube.com/embed/R2xeRW2AVNc&showinfo=0&rel=0"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item">
                    <div class="item-embed">
                        <a href="http://us10.campaign-archive1.com/?u=bc99df9c74d3261fdc46864d9&id=2f52a0e952"><img src="{{ assets('news-absoluterpg.jpg') }}" alt="July Newsletter 2015"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-embed">
                        <a href="http://us10.campaign-archive2.com/?u=bc99df9c74d3261fdc46864d9&id=5e22c6e83b"><img src="{{ assets('new-hierarchy.jpg') }}" alt="May Newsletter 2015"></a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-embed">
                        <a href="http://us10.campaign-archive1.com/?u=bc99df9c74d3261fdc46864d9&id=1ae22da122"><img src="{{ assets('april-newsletter-2015.jpg') }}" alt="April Newsletter 2015"></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="apply">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h1>{{ trans('home.apply.title') }}</h1>
                        <p>{!! trans('home.apply.content') !!}</p>
                        <a href="{{ trans('home.discord.code') }}" target="_blank" rel="noopener" class="btn btn-success">{{ trans('home.discord.apply') }}</a>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{ assets('apartments.gif') }}" alt="Apartments Render" class="img-responsive">
                    </div>
                </div>
    		</div>
        </section>
    </main>
@stop
