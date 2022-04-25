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
                    私は、自修学館日本語学校2年、東京マルチメディア専門学校２年を卒業後、株式会社ElectricArchitectのシステム開発部部下でWebシステム開発、システムテスト、構築、PCキッティングなどを3年間担当し,実務経験を積んでいます。3年目は転職を決めて大企業で入社しました。
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
                            @if ($stuCount)
                            <strong>
                                {{ $stuCount->count }}
                            </strong>
                            @endif

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
            @foreach ($posts as $post)
                <div class="col-sm-6 col-md-4">
                    <a href="{{ url('posts/'.$post->id.'/details') }}">
                        <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="">
                        <br><br>
                        <small>{{ date('d-M-Y', strtotime($post->created_at)) }}</small>
                        <h6 class="mt-2">
                            {{ $post->title }}
                        </h6>
                        <P>
                            {{ substr($post->content, 0, 200) }} ....
                        </P>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>

@endsection
