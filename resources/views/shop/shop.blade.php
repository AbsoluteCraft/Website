@extends('layouts.master', ['page' => 'shop', 'title' => 'Token Shop'])

@section('content')
    <main class="shop">
        <div class="container">
            <div class="row">
                <div class="shop-intro col-lg-8 col-lg-offset-2">
                    <img src="{{ assets('tokens.svg') }}" alt="Stack of Tokens">
                    @if(!Auth::check())
                        <p>You can collect tokens by playing on AC and spend them here to upgrade your experience and unlock awesome perks to our exclusive gamemodes!</p>
                    @else
                        <h3 class="tokens">{{ $tokens }} <small>tokens</small></h3>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="item col-md-6 col-lg-4">
                    <button type="button" data-toggle="modal" data-target="#adapt-super-fish">
                        <img src="{{ upload('shop/adapt-super-fish.svg') }}" alt="">
                        <h4 class="name">Adapt - Super Fish</h4>
                        <p class="price">500</p>
                    </button>
                </div>
                <div class="item col-md-6 col-lg-4">
                    <button data-toggle="modal" data-target="#vip-rank">
                        <img src="{{ upload('shop/vip.svg') }}" alt="">
                        <h4 class="name">VIP rank</h4>
                        <p class="price">£5.00</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="adapt-super-fish" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Adapt - Super Fish</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ upload('shop/adapt-super-fish.svg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <p>The fish is now lucky! Slap people with the fish for extra damage and humiliation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="price text-vip">500 Tokens</p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Buy</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="vip-rank" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">VIP rank</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ upload('shop/vip.svg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <p>Our one and only donation rank!</p>
                                <ul>
                                    <li>A <span class="text-vip">[VIP]</span> prefix in server chat</li>
                                    <li>Access to hats, pets, particle effects and nicknames</li>
                                    <li>Join the server even when it's full</li>
                                    <li>3 extra plots (6 in total) in the Plot world</li>
                                    <li>No expiration date - Lifetime rank!</li>
                                </ul>
                                <p>Feel free to donate £5.00 or more if you are generous!</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="price text-vip">£5.00 or above</p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        @if(Auth::check())
                            <button type="button" class="btn btn-info btn-donate" data-rank="vip"><span class="fa fa-lock"></span> &nbsp; Buy securely with PayPal</button>
                        @else
                            <a href="{{ route('auth.login') }}" class="btn btn-success">Login or register to donate</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <span class="hide" id="csrf">{{ csrf_token()  }}</span>
        <span class="hide" id="shop-donate-url">{{ route('shop.donate') }}</span>
    </main>
@stop