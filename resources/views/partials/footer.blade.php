<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="logo col-xs-2">
                <img src="{{ asset('img/avatar.png') }}" alt="{{ trans('general.name') }} Avatar">
            </div>
            <nav class="nav col-sm-2">
                <h2>{{ trans('nav.help_support') }}</h2>
                <a href="#" data-sh-module="kb" style="border:none;cursor:inherit">{{ trans('nav.support') }}</a>
                <a href="#" data-sh-group="kb" data-sh-page="kb-rules" style="border:none;cursor:inherit">{{ trans('nav.rules') }}</a>
                <a href="#" data-sh-module="status" style="border:none;cursor:inherit">{{ trans('nav.status') }}</a>
            </nav>
            <nav class="nav col-sm-2">
                <h2>Legal</h2>
                <a href="terms">{{ trans('nav.terms') }}</a>
                <a href="privacy">{{ trans('nav.privacy') }}</a>
            </nav>
            <form class="form-inline col-sm-6">
                <h2>{{ trans('nav.newsletter') }}</h2>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-primary btn-join">Join</button>
            </form>
        </div>
    </div>
</footer>