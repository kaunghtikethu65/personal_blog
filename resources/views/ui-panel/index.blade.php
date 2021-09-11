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

                </p>
                <p>

                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="total-project mb-2">
                            <i class="fa fa-project-diagram fontawesome"></i>
                            <br>
                            {{-- 本来追加したプロジェクトの数のみ表示する*count()functionを使う --}}
                            <strong>{{ count($projects) }}</strong>
                            <p>Total Projects</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="total-student">
                            <i class="fas fa-users fontawesome"></i>
                            <br>
                            {{-- 本来追加した友達又は学生(任意)数のみ表示する --}}
                            <strong>{{ $stuCount->count }}</strong>
                            <p>Total Students</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7" id="mySkills">
                <br>
                <h3 class="text-center">MY SKILLS</h3>

                <!-- MY Skillsの標示処理 -->
                <!-- 参照コントローラー __UiController -->
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

    <!-- MY Projectsの標示処理 -->
    <!-- 参照コントローラー__UiController -->
    <div class="project">
        <h3 class="text-center">MY PROJECTS</h3>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-4 mb-1">
                    <a href="{{ $project->url }}" target="_blank">
                        <div class="single-project">
                            <i class="fas fa-project-diagram fontawesome"></i>
                            <br>
                            <strong>{{ $project->name }}</strong>
                        </div>
                    </a>
                </div>
            @endforeach

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
