<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="logo col-xs-2">
                <img src="{{ app_asset('img/avatar.png') }}" alt="{{ trans('general.name') }} Avatar">
            </div>
            <nav class="nav col-sm-2">
                <h2>{{ trans('nav.help_support') }}</h2>
                <a href="#" data-sh-module="kb" style="border:none;cursor:inherit">{{ trans('nav.support') }}</a>
                <a href="#" data-sh-group="kb" data-sh-page="kb-rules" style="border:none;cursor:inherit">{{ trans('nav.rules') }}</a>
                <a href="#" data-sh-module="status" style="border:none;cursor:inherit">{{ trans('nav.status') }}</a>
            </nav>
            <nav class="nav col-sm-2">
                <h2>Legal</h2>
                <a href="{{ route('terms') }}">{{ trans('nav.terms') }}</a>
                <a href="{{ route('privacy') }}">{{ trans('nav.privacy') }}</a>
            </nav>
            <form class="form-inline col-sm-6 validate" action="//absolutecraft.us10.list-manage.com/subscribe/post?u=bc99df9c74d3261fdc46864d9&amp;id=220613f72e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                <h2>{{ trans('nav.newsletter') }}</h2>
                <div id="mc_embed_signup">
                    <div class="form-group">
                        <input type="email" name="EMAIL" class="form-control required email" id="mce-EMAIL" placeholder="Email">
                    </div>
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary btn-join">
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bc99df9c74d3261fdc46864d9_220613f72e" tabindex="-1" value=""></div>
                </div>
            </form>
        </div>
    </div>
</footer>