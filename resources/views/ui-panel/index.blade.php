@extends('ui-panel.master')
@section('title', 'index')
@section('content')

<!-- ABOUT ME & SKILLS SECTION-->
<div class="aboutme">
    <div class="row">
        <div class="col-md-5" id="aboutMe">
            <br>
            <h3 class="text-center">ABOUT ME</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat fugiat
                soluta consectetur reprehenderit facere, quis error quidem harum quam
                laborum inventore quasi minima ipsum asperiores laboriosam ipsa enim dolor
                perferendis.
            </p>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat fugiat
                soluta consectetur reprehenderit facere, quis error quidem harum quam
                laborum inventore quasi minima ipsum asperiores laboriosam ipsa enim dolor
                perferendis.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="total-project mb-2">
                        <i class="fa fa-project-diagram fontawesome"></i>
                        <br>
                        <strong>5</strong>
                        <p>Total Projects</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="total-student">
                        <i class="fas fa-users fontawesome"></i>
                        <br>
                        <strong>500</strong>
                        <p>Total Students</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7" id="mySkills">
            <br>
            <h3 class="text-center">MY SKILLS</h3>

            <!-- MY Skillsの標示処理 -->
            <!-- 参照コントローラー //UiController -->
            @foreach ($skills as $skill)
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="progress mt-2 border border-white">
                            <div class="progress-bar" style="width: {{ $skill->percent }}%;">
                                {{ $skill->percent }}%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">{{ $skill->name }}</div>
                </div>
            @endforeach
            {{ $skills->links('pagination::bootstrap-4') }}

        </div>
    </div>
</div>

<br><br><br>

<!-- MY PROJECTS SECTION -->
<div class="project">
    <h3 class="text-center">MY PROJECTS</h3>
    <div class="row">
        <div class="col-sm-6 col-md-4 mb-2">
            <a href="https://www.google.com" target="_blank">
                <div class="project-image-div">
                    <img src="images/yms.jpg" class="project-img" alt="">
                    <div class="overlay">
                        <div class="text">Google</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-2">
            <a href="https://www.youtube.com" target="_blank">
                <div class="project-image-div">
                    <img src="images/yms.jpg" class="project-img" alt="">
                    <div class="overlay">
                        <div class="text">youtube</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-2">
            <a href="https://www.facebook.com" target="_blank">
                <div class="project-image-div">
                    <img src="images/yms.jpg" class="project-img" alt="">
                    <div class="overlay">
                        <div class="text">facebook</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<br><br><br>
<!-- LATEST POSTS SECTION  -->
<div class="latest-post">
    <h3 class="text-center">LATEST POSTS FROM BLOGS</h3>
    <br>
    <p class="text-center">
        Hey Guys! I warmly welcome you to read some of my blog posts. Here are very
        interesting
        and exciting posts you can read that i am supporting for you guys!
    </p>
    <br>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <a href="post-details.html">
                <div class="latest-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSY-Fqgt98110_CnRGAMtbzlYAKLsT1EIRqL5b4A9ESe3fhsaym&usqp=CAU"
                        alt="">
                    <small>25 October, 2017 | By KHT </small>
                    <p><strong>SOMETHING JUST LIKE THIS WHEN YOU FALL IN LOVE WITH
                            SOMEONE</strong></p>
                    <P>
                        Computers have become ubiquitous in almost every facet of our lives.
                        At
                        work, desk jockeys spend hours in front of their desktops, while
                        delivery people scan bar codes with handhelds and workers in the
                        field
                        stay
                    </P>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="post-details.html">
                <div class="latest-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRK2tvT1fAPcQNFpZvDaqmAgxkGCqGWADA0OMwdzULJWRScYI2A&usqp=CAU"
                        alt="">
                    <small>25 October, 2021 | By KHT</small>
                    <p><strong>SOMETHING JUST LIKE THIS WHEN YOU FALL IN LOVE WITH
                            SOMEONE</strong></p>
                    <P>
                        Computers have become ubiquitous in almost every facet of our lives.
                        At
                        work, desk jockeys spend hours in front of their desktops, while
                        delivery people scan bar codes with handhelds and workers in the
                        field
                        stay
                    </P>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="post-details.html">
                <div class="latest-post">
                    <img src="https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg"
                        alt="">
                    <small>25 October, 2017 | By YMS </small>
                    <p><strong>SOMETHING JUST LIKE THIS WHEN YOU FALL IN LOVE WITH
                            SOMEONE</strong></p>
                    <P>
                        Computers have become ubiquitous in almost every facet of our lives.
                        At
                        work, desk jockeys spend hours in front of their desktops, while
                        delivery people scan bar codes with handhelds and workers in the
                        field
                        stay
                    </P>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="post-details.html">
                <div class="latest-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQXE_7Go4FovH9bstguTZSXGwPapB5CwcraJtmLQICkJe9weEk&usqp=CAU"
                        alt="">
                    <small>25 October, 2017 | By YMS </small>
                    <p><strong>SOMETHING JUST LIKE THIS WHEN YOU FALL IN LOVE WITH
                            SOMEONE</strong></p>
                    <P>
                        Computers have become ubiquitous in almost every facet of our lives.
                        At
                        work, desk jockeys spend hours in front of their desktops, while
                        delivery people scan bar codes with handhelds and workers in the
                        field
                        stay
                    </P>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="post-details.html">
                <div class="latest-post">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQK60mFUNV8eXgrHZYzJwIKiYTPPhPW_jqFKlUcEcQGvxrF6F21&usqp=CAU"
                        alt="">
                    <small>25 October, 2017 | By YMS </small>
                    <p><strong>SOMETHING JUST LIKE THIS WHEN YOU FALL IN LOVE WITH
                            SOMEONE</strong></p>
                    <P>
                        Computers have become ubiquitous in almost every facet of our lives.
                        At
                        work, desk jockeys spend hours in front of their desktops, while
                        delivery people scan bar codes with handhelds and workers in the
                        field
                        stay
                    </P>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
