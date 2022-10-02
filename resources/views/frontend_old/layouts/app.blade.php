<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Офицеру.ру</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/fonts/awards/awards.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}"/>

    <meta name="yandex-verification" content="69aad501696c0681"/>

</head>
<body>
<section id="rw-layout" class="rw-layout">

    <!--
    // ===================================^__^=================================== //
       Header
    // ===================================^__^=================================== //
    -->
    <div class="rw-section rw-header">
        <div class="rw-inner clearfix">
            <div class="grid-container">

                <div class="grid desk-8 mob-6 alpha clearfix">
                    <div class="logo-holder">
                        <img src="{{ asset('/assets/placeholder/logo.png') }}" style="   width: 120px;" class="logo"
                             alt=""/>
                    </div>
                    <nav id="the-main-menu" class="main-menu-nav menu-inline" data-breakpoint="1160">
                        <ul class="menu horizontal">
                            <li><a href="/">Главная</a></li>
                            <li><a href="{{route('post')}}">Статьи</a></li>
                             <li><a href="{{route('doc')}}">Документы</a></li>
                        </ul>
                    </nav>
                </div>
                @auth
                    <div class="grid desk-4 mob-6 omega">
                        <nav id="the-user-menu" class="main-menu-nav">
                            <ul class="menu horizontal align-right">

                                <!-- Notifications -->
                                <li class="to-left-more">
                                    <a href="profile-notifications.php.htm"

                                       class="menu-single-icon">
                                        <i class="fa fa-bell"></i>
                                    </a>
                                    <ul class="sub-menu user-notes">

                                        <li>
                                            <div class="note">
                                                <div class="user-message">
                                                    <img src="/assets/placeholder/people/50x50/3.jpg"

                                                         class="avatar" alt=""/>
                                                    <div class="username"><a href="#">Jeff Mitchell</a> on <a href="#">Chicken
                                                            Salad with...</a></div>
                                                    <div class="message">"Elit, sed do eiusmod tempor incididunt..."
                                                    </div>
                                                    <div class="date">28 jan 2014</div>
                                                    <i class="fa fa-comment-o type"></i>
                                                </div>
                                            </div>
                                            <div class="note">
                                                <div class="user-message">
                                                    <img src="/assets/placeholder/people/50x50/4.jpg"

                                                         class="avatar" alt=""/>
                                                    <div class="username"><a href="#">Michelle Nelson</a> followed you
                                                    </div>
                                                    <div class="date">28 jan 2014</div>
                                                    <i class="fa fa-check-square-o type"></i>
                                                </div>
                                            </div>
                                            <div class="note">
                                                <div class="user-message">
                                                    <img src="/assets/placeholder/people/50x50/5.jpg"

                                                         class="avatar" alt=""/>
                                                    <div class="username"><a href="#">Steven Martinez</a> liked <a
                                                                href="#">Spicy
                                                            Rapid Roast Chicken</a></div>
                                                    <div class="date">28 jan 2014</div>
                                                    <i class="fa fa-thumbs-o-up type"></i>
                                                </div>
                                            </div>
                                            <div class="note">
                                                <div class="user-message">
                                                    <img src="/assets/placeholder/people/50x50/8.jpg"

                                                         class="avatar" alt=""/>
                                                    <div class="username"><a href="#">Daniel Thompson</a> added to
                                                        favorites
                                                        <a href="#">Creamy Shrimp and Broccoli Fettuccine</a></div>
                                                    <div class="date">28 jan 2014</div>
                                                    <i class="fa fa-heart-o type"></i>
                                                </div>
                                            </div>
                                            <div class="note">
                                                <div class="user-message">
                                                    <img src="/assets/placeholder/people/50x50/19.jpg"

                                                         class="avatar" alt=""/>
                                                    <div class="username"><a href="#">Maria Bello</a> added <a href="#">Chicken
                                                            and Rice Casserole</a> to the collection <a href="#">Special
                                                            recipes</a></div>
                                                    <div class="date">28 jan 2014</div>
                                                    <i class="fa fa-bookmark-o type"></i>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="go-to-all"><a href="profile-notifications.php.htm"
                                            >View
                                                all notifications</a></li>
                                    </ul>
                                </li>

                                <!-- Messages -->
                                <li class="to-left-more">
                                    <a href="profile-private-messages.php.htm"

                                       class="menu-single-icon">
                                        <i class="fa fa-envelope"></i>
                                        <span class="new-info">2</span>
                                    </a>
                                    <ul class="sub-menu user-notes">
                                        <li>
                                            <div class="note">
                                                <a href="#">
                                                    <div class="user-message">
                                                        <img src="/placeholder/people/50x50/22.jpg"

                                                             class="avatar" alt=""/>
                                                        <div class="username">Steven Martinez</div>
                                                        <div class="message">"Hello, I need help regarding your
                                                            recipe..."
                                                        </div>
                                                        <div class="date">5 minutes ago</div>
                                                        <i class="fa fa-envelope-o type"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="note">
                                                <a href="#">
                                                    <div class="user-message">
                                                        <img src="/assets/placeholder/people/50x50/21.jpg"

                                                             class="avatar" alt=""/>
                                                        <div class="username">Michelle Nelson</div>
                                                        <div class="message">"Elit, sed do eiusmod tempor incididunt..."
                                                        </div>
                                                        <div class="date">5 days ago</div>
                                                        <i class="fa fa-envelope-o type"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="note">
                                                <a href="#">
                                                    <div class="user-message">
                                                        <img src="/assets/placeholder/people/50x50/1.jpg"

                                                             class="avatar" alt=""/>
                                                        <div class="username">Jeff Mitchell</div>
                                                        <div class="message">"Elit, sed do eiusmod tempor incididunt..."
                                                        </div>
                                                        <div class="date">28 jan 2014</div>
                                                        <i class="fa fa-envelope-o type"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="note">
                                                <a href="#">
                                                    <div class="user-message">
                                                        <img src="/assets/placeholder/people/50x50/11.jpg"

                                                             class="avatar" alt=""/>
                                                        <div class="username">Daniel Thompson</div>
                                                        <div class="message">"Quis nostrud exercitation ullamco..."
                                                        </div>
                                                        <div class="date">28 jan 2014</div>
                                                        <i class="fa fa-envelope-o type"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>

                                        <li class="go-to-all"><a href="profile-private-messages.php.htm"
                                            >View
                                                all messages</a></li>
                                    </ul>
                                </li>

                                <!-- Submission -->
                                <li class="to-left-more">
                                    <a href="#" class="menu-single-icon"><i class="fa fa-plus"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="submit-recipe.php.htm"
                                            >Submit
                                                recipe</a></li>
                                        <li><a href="submit-request.php.htm"
                                            >Request
                                                a recipe</a></li>
                                        <li><a href="submit-forum-topic.php.htm"
                                            >New
                                                forums topic</a></li>
                                    </ul>
                                </li>


                                <!-- User menu -->
                                <li class="to-left-more">
                                    <div class="user-details-in-menu">
                                        <a href="profile.php.htm"

                                           class="avatar"><img src="/assets/placeholder/people/50x50/2.jpg"

                                                               alt=""/></a>
                                    </div>
                                    <ul class="sub-menu">
                                        <li><a href="profile.php.htm"
                                            >Public
                                                Profile</a></li>
                                        <li class="separator"><a href="profile-requests.php.htm"
                                            >Requests</a>
                                        </li>
                                        <li><a href="profile-collections.php.htm"
                                            >Collections</a>
                                        </li>
                                        <li><a href="profile-favorites.php.htm"
                                            >Favorites</a>
                                        </li>
                                        <li class="separator"><a href="profile-likes.php.htm"
                                            >Likes</a>
                                        </li>
                                        <li><a href="profile-reputation.php.htm"
                                            >Reputation</a>
                                        </li>
                                        <li class="separator"><a href="profile-followers.php.htm"
                                            >Followers</a>
                                        </li>
                                        <li><a href="profile-notifications.php.htm"
                                            >Notifications</a>
                                        </li>
                                        <li><a href="profile-private-messages.php.htm"
                                            >Private
                                                Messages</a></li>
                                        <li class="separator"><a href="#">Settings</a></li>
                                        <li><a href="{{route('logout')}}">Выйти </a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                @endauth
                @guest
                    <div class="grid desk-4 mob-6 omega">
                        <nav id="the-user-menu" class="main-menu-nav">
                            <ul class="menu horizontal align-right">


                                <!-- Submission -->
                                <li class="to-left-more">
                                    <a href="#" class="menu-single-icon"><i class="fa fa-sign-in"></i></a>
                                    <ul class="sub-menu">
                                        <li class="to-left-more">
                                            <a href="{{route('login')}}">Войти</a>
                                        </li>
                                        <li class="to-left-more">
                                            <a href="{{ route('register')}}">Зарегистрироваться</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>


                        </nav>
                    </div>
                @endguest

            </div> <!-- .grid-container -->
        </div> <!-- .rw-inner -->
    </div> <!-- .rw-header -->

    <!--
    // ===================================^__^=================================== //
       Content
    // ===================================^__^=================================== //
    -->
    <div class="rw-section rw-container right-sidebar">
        <div class="rw-inner clearfix">


            <!-- Sidebar  -->
        @section('sidebar')

        @show

        <!-- Main content -->
            @yield('content')

        </div> <!-- .rw-inner -->
    </div> <!-- .rw-container -->


    @include('frontend_old.pages.footer')


</section><!-- .rw-layout -->

<!-- Javascript -->
<!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script src="{{ asset('/assets/js/library/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/smk-menu.min.js') }}"></script>
<script src="{{ asset('/assets/js/rw-sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/rw-sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/min/jquery.qtip.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/smk-accordion.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/smk-visual-select.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/js/scripts.js') }}"></script>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(88773687, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88773687" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
