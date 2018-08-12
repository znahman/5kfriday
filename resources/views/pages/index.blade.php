@extends('layouts.app')

@section('content')

    <div class="jumbotron">
    <h1 class="display-4">Welcome to {{$title}}</h1>
        <p class="lead">Fitness <i>does not</i> need to be complicated. </p>
        <hr class="my-4">
        <p>Start logging and connecting today!
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/register" role="button">Register Now!</a>
        </p>
    </div>
    

    <!-- Image Showcases -->
    <section class="showcase">
            <div class="container-fluid p-0">
              <div class="row no-gutters">
      
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/storage/imgs/shoe.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <h2>Simplicity</h2>
                  <p class="lead mb-0">
                    There are some wacky trends in the fitness industry. A simple internet search for advice on your fitness goals will yield a plethora
                    of strange information. Some websites, youtube stars, and instagram models, want you to purchase their workouts or meal plans. 
                    Fitness does not need to be difficult or cost money! It can be as simple as running (or walking) a 5k every Friday. 
                    That's the goal of 5k friday. Social motivation for staying active. All that's required is completing a 5k every Friday
                    and logging your results on 5kfriday.org. 
                    <br>
                    <br>
                    <br>
                  </p>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('/storage/imgs/stopwatch.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                  <h2>Results Tracking</h2>
                  <p class="lead mb-0">
                    Quickly and easily track your 5kfriday times. Observe your progress over time and stay motivated! 
                    Gather achievements to display on your profile and and compete with your friends. Whether you're training for a marathon, 
                    trying to slim down for the summer, or bulking up to a physique Arnold himself would be proud of, a 5k every Friday
                    is the perfect way to check-in with your fitness level. 
                    <br>
                    <br>
                    <br>
                  </p>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('/storage/imgs/friends.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                  <h2>Stay Social</h2>
                  <p class="lead mb-0">
                    Follow your friends on 5kfriday and watch them improve. 
                    Offer encouragement and stay motivated. Friends can share times, run logs, pictures, and more! 
                    Who in your network of friends will maintain the longest streak of Friday logs?
                    There's only one way to find out. Start this week!
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                  </p>
                </div>
              </div>
            </div>
    </section>
@endsection
