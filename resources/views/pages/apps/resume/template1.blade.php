<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resume</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Google Font -->
    <link
        href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/resume/css/bootstrap.min.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/resume/orbit-5.css') }}">
</head>

<body>

    <div class="wrapper mt-lg-5">
        <div class="title text-center bg-white">
            <img src="https://madaresonajo.com/build/images/logo.png" alt="" width="600" height="75">
        </div>
        <div class="sidebar-wrapper">
            @if ($teacher->sex_id === 2)
                <img class="profile" src="{{ asset('assets/media/avatars/blank-female.jpg') }}" alt=""
                    height="230" class="img-fluid" style="width:100%; " />
            @else
                <img class="profile" src="{{ asset('assets/media/avatars/blank.png') }}" alt="" height="230"
                    class="img-fluid" style="width:100%; " />
            @endif

            <div class="profile-container">

                @php
                    $nameParts = explode(' ', $teacher->full_name_en);
                    $firstLastName = $nameParts[0] . ' ' . end($nameParts);
                @endphp

                <h4 class="text-center text-justify">{{ $firstLastName }}</h4>
                <h3 class="tagline">{{ $teacher->first_job_name }} , {{ $teacher->second_job_name }} ,
                    {{ $teacher->third_job_name }}</h3>
            </div><!--//profile-container-->

            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list ">
                    <li class="email d-flex align-items-center gap-2 ">
                        <i class="fa-solid fa-envelope"></i><a
                            href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>
                    </li>
                    <li class="phone d-flex align-items-center gap-2"><i class="fa-solid fa-phone"></i><a
                            href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></li>

                    {{-- <li class="linkedin d-flex align-items-center gap-2"><i class="fa-brands fa-linkedin-in"></i><a
                            href="#" target="_blank">linkedin.com/in/alandoe</a></li> --}}
                    <!--                    <li class="github"><i class="fa-brands fa-github"></i><a href="#" target="_blank">github.com/username</a></li>-->
                    <!--                    <li class="twitter"><i class="fa-brands fa-x-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>-->
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <div class="item">
                    <h4 class="degree">{{ $edutcation->institute }}</h4>
                    <h5 class="meta">{{ $edutcation->city }}</h5>
                    <div class="time">{{ $edutcation->graduation_date }}</div>
                </div><!--//item-->

            </div><!--//education-container-->

            {{-- <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <li>English <span class="lang-desc">(Native)</span></li>
                    <li>French <span class="lang-desc">(Professional)</span></li>
                    <li>Spanish <span class="lang-desc">(Professional)</span></li>
                </ul>
            </div><!--//interests--> --}}

            {{-- <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <li>Climbing</li>
                    <li>Snowboarding</li>
                    <li>Cooking</li>
                </ul>
            </div><!--//interests--> --}}

        </div><!--//sidebar-wrapper-->

        <div class="main-wrapper">

            <section class="section summary-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-user"></i></span>Career
                    Profile</h2>
                <div class="profile">
                    <p>
                        I'm {{ $teacher->full_name_en }}, my national number is "{{ $teacher->national_number }}".
                        I was born in {{ $teacher->place_birth }} on {{ $teacher->birth_date }}.
                        You can contact me via email at {{ $teacher->email }} or phone at {{ $teacher->phone }}.
                        I have {{ $teacher->experience_years }} years of experience and currently reside at
                        {{ $teacher->address }}.
                    </p>
                </div>

            </section><!--//section-->

            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i
                            class="fa-solid fa-briefcase"></i></span>Experiences</h2>

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            {{-- <h3 class="job-title">{{ $teacher->first_job_name }}</h3> --}}
                            {{-- <div class="time">2023 - Present</div> --}}
                        </div><!--//upper-row-->
                        <div class="company">{{ $teacher->first_desired_city_name }}</div>
                    </div><!--//meta-->
                    <div class="details">
                        @php
                            $experiences = explode('</p>', $teacher->practical_experiences_en);
                        @endphp

                        @foreach ($experiences as $experience)
                            @if (trim($experience))
                                {!! $experience . '</p>' !!}
                            @endif
                        @endforeach

                    </div><!--//details-->
                </div><!--//item-->
            </section><!--//section-->
            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-rocket"></i></span>Skills
                    &amp; Proficiency</h2>
                <div class="row row-cols-2 row-cols-4 gap-2">
                    <div class="col-12">
                        @php
                            $skill = explode('</p>', $teacher->skills_abilities_en);
                        @endphp

                        @foreach ($skill as $skills_abilities_en)
                            @if (trim($skills_abilities_en))
                                {!! $skills_abilities_en . '</p>' !!}
                            @endif
                        @endforeach


                    </div>
                </div>
            </section><!--//skills-section-->

        </div><!--//main-body-->
    </div>


</body>

</html>
