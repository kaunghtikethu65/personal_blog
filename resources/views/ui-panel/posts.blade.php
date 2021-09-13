@extends('ui-panel.master')
@section('title', 'posts')
@section('content')

    <div class="row">
        <!-- BLOGS -->
        <div class="col-md-8">
            <div class="blog">
                <img src="images/post1.jpg" alt="">
                <br><br>
                <h6>HOW TO BECOME A PROFESSTIONAL WEB DEVELOPER</h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit debitis ducimus
                    animi, molestias sequi quaerat? Minima modi numquam eligendi dignissimos
                    doloribus beatae, autem adipisci, quidem laudantium corrupti nulla delectus
                    dolore.
                </p>
                <a href="post-details.html">
                    <button class="btn-info btn btn-sm">Read More <i class="fas fa-angle-double-right"></i> </button>
                </a>
            </div>
        </div>

        <!-- SIDE BAR -->
        <div class="col-md-4">
            <div class="siderbar">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <button class="btn btn-success">
                            Submit <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <br>
                <h5>Categories</h5>
                <ul>
                    <li> <a href="">HTML</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
