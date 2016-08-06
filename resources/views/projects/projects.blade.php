@extends('layouts.master', ['page' => 'projects', 'title' => 'Projects'])

@section('content')
    <main class="projects">
        <div class="container">
            <div class="projects-intro col-md-8 col-md-offset-2">
                <h1>Projects</h1>
                <p>TeamAbsolute are regular entrants to Planet Minecraft's quarterly project contests and we occasionally create unique builds just for fun.</p>
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <figure class="project">
                    <img src="http://i.imgur.com/OAKXvJH.jpg" alt="Marauder's Cove">
                    <figcaption>
                        <h2 class="two-line">Marauder's<br><span>Cove</span></h2>
                        <p>A Caribbean island</p>
                        <a href="http://www.planetminecraft.com/project/marauders-cove">View project</a>
                    </figcaption>
                </figure>
                <figure class="project">
                    <img src="http://i.imgur.com/WuFLJIp.jpg" alt="Drifting Away">
                    <figcaption>
                        <h2>Drifting <span>Away</span></h2>
                        <p>A fantasy town under the ocean</p>
                        <a href="http://www.planetminecraft.com/project/drifting-away">View project</a>
                    </figcaption>
                </figure>
                <figure class="project">
                    <img src="http://i.imgur.com/oaICNOk.jpg" alt="Koronis">
                    <figcaption>
                        <h2><span>Koronis</span></h2>
                        <p>A space station SG map</p>
                        <a href="http://www.planetminecraft.com/project/koronis">View project</a>
                    </figcaption>
                </figure>
                <figure class="project">
                    <img src="http://i.imgur.com/GiujZhm.jpg" alt="Nebulus">
                    <figcaption>
                        <h2><span>Nebulus</span></h2>
                        <p>An ancient civilization</p>
                        <a href="http://www.planetminecraft.com/project/nebulus">View project</a>
                    </figcaption>
                </figure>
                <figure class="project">
                    <img src="https://i.imgur.com/9mYsowq.jpg" alt="Retaliation">
                    <figcaption>
                        <h2><span>Retaliation</span></h2>
                        <p>A hellish PvP map</p>
                        <a href="http://www.planetminecraft.com/project/retaliation-2434939">View project</a>
                    </figcaption>
                </figure>
                <figure class="project">
                    <img src="https://i.imgur.com/d0mdvAC.jpg" alt="The Cruise">
                    <figcaption>
                        <h2>The <span>Cruise</span></h2>
                        <p>A unique survival games map</p>
                        <a href="http://www.planetminecraft.com/project/the-cruise-mcsg-contest">View project</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </main>
@stop