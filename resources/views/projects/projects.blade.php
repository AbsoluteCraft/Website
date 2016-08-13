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
                @foreach ($projects as $project)
                    <figure class="project">
                        <img src="{{ asset('uploads/projects/' . $project->image) }}">
                        <figcaption>
                            <h2 class="two-line">{{ $project->title }}</h2>
                            <p>{{ $project->description }}</p>
                            <a href="{{ $project->link }}">View project</a>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </main>
@stop
