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
            <img class="profile"
                src="https://gratisography.com/wp-content/uploads/2024/10/gratisography-cool-cat-800x525.jpg"
                alt="" class="img-fluid" style="width:100%; " />
            <div class="profile-container">

                <h1 class="name">{{ $teacher->full_name_en }}</h1>
                <h3 class="tagline">{{ $teacher->first_job_name }}</h3>
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
                <div class="summary">
                    <p>{{ $teacher->practical_experiences_en }}</p>
                </div><!--//summary-->
            </section><!--//section-->

            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i
                            class="fa-solid fa-briefcase"></i></span>Experiences</h2>

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{ $teacher->first_job_name }}</h3>
                            <div class="time">2023 - Present</div>
                        </div><!--//upper-row-->
                        <div class="company">{{ $teacher->first_desired_city_name }}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
                            pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo. </p>
                    </div><!--//details-->
                </div><!--//item-->

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">Senior Software Engineer</h3>
                            <div class="time">2018 - 2023</div>
                        </div><!--//upper-row-->
                        <div class="company">Google, London</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
                            pretium quis, sem.</p>

                    </div><!--//details-->
                </div><!--//item-->

                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">UI Developer</h3>
                            <div class="time">2016 - 2018</div>
                        </div><!--//upper-row-->
                        <div class="company">Amazon, London</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu,
                            pretium quis, sem.</p>
                    </div><!--//details-->
                </div><!--//item-->

            </section><!--//section-->

            <section class="section projects-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-archive"></i></span>Projects
                </h2>
                <div class="intro">
                    <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit
                        amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.
                    </p>
                </div><!--//intro-->
                <div class="item">
                    <span class="project-title"><a
                            href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/coderpro-bootstrap-5-startup-template-for-software-projects/"
                            target="_blank">CoderPro</a></span> - <span class="project-tagline">A responsive website
                        template designed to help developers launch their software projects. </span>

                </div><!--//item-->
                <div class="item">
                    <span class="project-title"><a
                            href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/launch-bootstrap-5-template-for-saas-businesses/"
                            target="_blank">Launch</a></span> - <span class="project-tagline">A responsive website
                        template designed to help startups promote their products or services.</span>
                </div><!--//item-->
                <div class="item">
                    <span class="project-title"><a
                            href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/devcard-bootstrap-5-vcard-portfolio-template-for-software-developers/"
                            target="_blank">DevCard</a></span> - <span class="project-tagline">A portfolio website
                        template designed for software developers.</span>
                </div><!--//item-->
                <div class="item">
                    <span class="project-title"><a
                            href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/bootstrap-template-for-mobile-apps-nova-pro/"
                            target="_blank">Nova Pro</a></span> - <span class="project-tagline">A responsive Bootstrap
                        theme designed to help app developers promote their mobile apps</span>
                </div><!--//item-->
                <div class="item">
                    <span class="project-title"><a
                            href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-web-development-agencies-devstudio/"
                            target="_blank">DevStudio</a></span> -
                    <span class="project-tagline">A responsive website template designed to help web
                        developers/designers market their services. </span>
                </div><!--//item-->
            </section><!--//section-->

            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fa-solid fa-rocket"></i></span>Skills
                    &amp; Proficiency</h2>
                <div class="row row-cols-2 row-cols-4 gap-2">
                    <div class="col">
                        <p>Title Here</p>
                    </div>
                </div>
            </section><!--//skills-section-->

        </div><!--//main-body-->
    </div>

    <footer class="footer">
        <div class="text-center">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fa-solid fa-heart"></i> by <a
                    href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->

</body>

</html>
