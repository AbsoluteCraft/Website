@extends('layouts.master', ['page' => 'apply'])

@section('content')
    <main class="apply">
        <div class="container">
            <p>The Builder rank is given to players who are part of TeamAbsolute, AbsoluteCraft's building team. We only allow players with a good standard of work into the team. If you have been on the server frequently and staff have seen your work on the plots and you are friendly to other players, this is a good sign that you will get accepted.</p>
        </div>
        <section class="application">
            <div class="container">
                <form action="https://absolutecraft.co.uk/apply/builder" method="post" class="form-horizontal">
                    <p class="subtitle">Contact Information</p>
                    <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label">First name:</label>
                        <div class="col-sm-5">
                            <input type="text" name="first_name" id="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-2 control-label">Last name:</label>
                        <div class="col-sm-5">
                            <input type="text" name="last_name" id="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username:</label>
                        <div class="col-sm-5">
                            <p class="input-filled player">boveybrawlers</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail Address:</label>
                        <div class="col-sm-5">
                            <p class="input-filled">dan@danbovey.uk</p>
                        </div>
                    </div>
                    <p class="subtitle">Location</p>
                    <div class="form-group">
                        <label for="location" class="col-sm-2 control-label">Location:</label>
                        <div class="col-sm-5">
                            <p class="input-filled">United Kingdom</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth:</label>
                        <div class="col-sm-5">
                            <p class="input-filled">January 9, 1995</p>
                        </div>
                        <p class="help-block">Please make sure these details are accurate</p>
                    </div>
                    <p class="subtitle">Previous Experience</p>
                    <div class="form-group application-tests">
                        <label for="time_played" class="control-label">How long do you spend on Minecraft in an average week?</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="time_played" value="1-2 Hours" checked="">
                                1-2 Hours
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="time_played" value="2-3 Hours">
                                2-3 Hours
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="time_played" value="3-6 Hours">
                                3-6 Hours
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="time_played" value="10-20 Hours">
                                10-20 Hours
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="time_played" value="20+ Hours">
                                20+ Hours
                            </label>
                        </div>
                    </div>
                    <div class="form-group application-tests">
                        <label for="servers_active" class="control-label">How many Minecraft servers do you actively play on?</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="servers_active" value="1" checked="">
                                1
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="servers_active" value="2-3">
                                2-3
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="servers_active" value="4-5">
                                4-5
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="servers_active" value="6 or more">
                                6 or more
                            </label>
                        </div>
                    </div>
                    <div class="form-group application-tests">
                        <label for="staff_active" class="control-label">Do you hold any staff/builder ranks on other Minecraft servers?</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="staff_active" value="1">
                                Yes
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="staff_active" value="0">
                                No
                            </label>
                        </div>
                        <p class="help-block">This does not include donation ranks</p>
                    </div>
                    <div class="form-group application-tests">
                        <label for="message" class="control-label">Please provide details of previous builds and your experience with working with others on Minecraft projects, creating cinematics/timelapses or what you think you can bring to the team:</label>
                        <textarea name="message" id="message" class="form-control" rows="10"></textarea>
                    </div>
                    <p class="subtitle">Previous Builds</p>
                    <p>This is the essential bit. You should include screenshots of the things you've built in Minecraft. Top marks for a complete gallery uploaded to <a href="http://www.imgur.com" target="_blank">imgur.com</a>. You should include multiple links to images or videos of your builds with evidence that you built it or the co-ordinates of your plot in the AbsoluteCraft plot world - or both for extra !</p>
                    <div class="form-group">
                        <label for="imgur" class="col-sm-2 control-label">Previous Build Images:</label>
                        <div class="col-sm-5">
                            <input type="text" name="imgur" id="imgur" class="form-control" value="http://imgur.com/">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="plot_id" class="col-sm-2 control-label">Plot ID:</label>
                        <div class="col-sm-5">
                            <input type="text" name="plot_id" id="plot_id" class="form-control">
                        </div>
                        <p class="help-block">You can find your plot ID (e.g. 1;1) on the sign on a corner of your plot</p>
                    </div>
                    <div class="form-group">
                        <label for="planetminecraft" class="col-sm-2 control-label">Planet Minecraft Profile:</label>
                        <div class="col-sm-5">
                            <input type="text" name="planetminecraft" id="planetminecraft" d="planetminecraft" class="form-control" value="http://www.planetminecraft.com/member/">
                        </div>
                        <p class="help-block">If you have a Planet Minecraft page, link it here. If you don't, you should sign up and <a href="http://www.planetminecraft.com/member/TeamAbsolute">subscribe to us!</a></p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                    <input name="_token" type="hidden" value="o0hSrRTyoIC9GTqxktwp6jFyte7JasoQ6bDzEj56">
                </form>
            </div>
        </section>
    </main>
@stop