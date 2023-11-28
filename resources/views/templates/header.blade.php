<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lavella.hellodigi.ru/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2023 09:49:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <title>Diablo Boss Asia Adventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/css/styles.css">
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png"> -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets')}}/img/favicons/Frame-10.png">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/android-chrome-192x192.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/android-chrome-512x512.png"> -->
    <!-- <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon.ico"> -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="#000" name="msapplication-TileColor">
    <meta content="#000" name="theme-color">
</head>
<body>
    <div class="container">
       <div class="header">
           <div class="wrap">
               <div class="wrap_float">
                   <div class="header__top">
                       <div class="tel">
                            {{-- <a href="tel:+62 823 3990 7214">+6282339907214</a> --}}
                            @foreach (\App\Models\System::where('desc', 'contact')->get() as $contact)
                            <a href="https://wa.me\{{$contact->value}}" target="_blank">{{$contact->value}}</a><br>
                            @endforeach
                       </div>
                       <div class="email">
                            @foreach (\App\Models\System::where('desc','email')->get() as $contact)
                            <a href="mailto:{{ $contact->value }}">{{ $contact->value }}</a>
                            @endforeach

                       </div>
                       <div class="socials">
                           <a href="https://www.instagram.com/diabloboss.asia/" target="_blank" class="a instagram"></a>
                           <a href="#" class="a whatsapp"></a>
                       </div>
                   </div>
                   <div class="header__bottom">
                       <a href="index.html" class="logo">DAV</a>
                       <div class="menu" id="js-menu">
                           <div class="close"></div>
                           <div class="scroll">
                               <a class="current">Home</a>
                               <div class="scroll_wrap">
                                   <ul>
                                        <li><a href="{{url('/')}}" class="{{url()->current() == url('/') ? 'active' : ''}}">Home</a></li>
                                        <li class="dropdown_li">
                                            <a href="#" class="{{ @Str::contains(url()->current(), 'pages') ? 'active' : '' }}">
                                                <span>Pages</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li><a href="{{url('/pages/about')}}">About</a></li>
                                                    <li><a href="{{url('/pages/contact')}}">Contact</a></li>
                                                    <li><a href="{{url('/pages/gallery')}}">Gallery</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="dropdown_li">
                                            <a href="#" class="{{ @Str::contains(url()->current(), 'destination') ? 'active' : '' }}">
                                                <span>Destination</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    @foreach (\App\Models\Destination::all() as $destination)
                                                    <li><a href="{{url('/destination/'.$destination->id_destination)}}">{{$destination->nama_destination}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="dropdown_li">
                                            <a href="#" class="{{ @Str::contains(url()->current(), 'tour') ? 'active' : '' }}">
                                                <span>Tour List</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    @foreach (\App\Models\Tour::all() as $tour)
                                                    <li><a href="{{url('/tour/'.$tour->id_tour)}}">{{$tour->nama_tour}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="dropdown_li">
                                            <a href="#" class="{{ @Str::contains(url()->current(), 'boat') ? 'active' : '' }}">
                                                <span>Boat</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    @foreach (\App\Models\Boat::all() as $boat)
                                                    <li><a href="{{url('/boat/'.$boat->id_boatr)}}">{{$boat->boat}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                   </ul>
                               </div>
                               <div class="bottom">
                                   <div class="tel">
                                        @foreach (\App\Models\System::where('desc', 'contact')->get() as $contact)
                                        <a href="https://wa.me/{{$contact->value}}">{{$contact->value}}</a><br>
                                        @endforeach
                                   </div>
                                   <div class="email">
                                       <a href="mailto:{{ \App\Models\System::where('desc', 'email')->first()->value }}">{{ \App\Models\System::where('desc', 'email')->first()->value }}</a>
                                   </div>
                                   <div class="socials">
                                       <div class="links">
                                            <a href="#" class="instagram"></a>
                                            <a href="#" class="whatsapp"></a>
                                        </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="search_link" id="search_link"></div>
                       <div class="mobile_btn" id="mobile_btn">
                           <span></span>
                           <span></span>
                           <span></span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @yield('contents')
        <div class="footer">
           <div class="footer_top">
               <div class="wrap">
                   <div class="wrap_float">
                       <div class="footer_head_mobile">
                           <div class="logo">DIABLO BOSS ASIA VENTURE</div>
                           <div class="text">
                               {{-- Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. --}}
                           </div>
                       </div>
                       <div class="footer_top_menu">
                           <ul>
                                <li><a href="{{url('/')}}" class="{{ url()->current() == url('/') ? 'active' : '' }}">Home</a></li>
                                <li><a href="#" class="{{ @Str::contains(url()->current(), '/pages') ? 'active' : '' }}">Pages</a></li>
                                <li><a href="{{url('/destination')}}" class="{{ @Str::contains(url()->current(), '/destination') ? 'active' : '' }}">Destination</a></li>
                                <li><a href="{{url('/tour')}}" class="{{ @Str::contains(url()->current(), '/tour') ? 'active' : '' }}">Tour</a></li>
                                <li><a href="{{url('/boat')}}" class="{{ @Str::contains(url()->current(), '/boat') ? 'active' : '' }}">Boat</a></li>
                           </ul>
                       </div>
                       <div class="socials">
                           <a href="https://www.instagram.com/diabloboss.asia/" target="_blank" class="a instagram"></a>
                           <a href="#" class="a whatsapp"></a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer_center">
               <div class="wrap">
                   <div class="wrap_float">
                       <div class="footer_center_left">
                           <a href="index.html" class="logo">DIABLOBOSS ASIA VENTURE</a>
                           <div class="text">
                               {{-- {{ \App\Models\System::where('desc', 'footer_desc')->first()->value }} --}}
                           </div>
                       </div>
                       <div class="footer_center_right">
                           <div class="_title">CONTACTS</div>
                           <div class="text">
                                <p>Address: <b>{{ \App\Models\System::where('desc', 'address')->first()->value }}</b> </p>
                                @foreach (\App\Models\System::where('desc', 'contact')->get() as $contact)
                                <p>Phone: <a href="https://wa.me/{{$contact->value}}" target="_blank">{{$contact->value}}</a></p>
                                @endforeach

                                <p><a href="#">{{ \App\Models\System::where('desc', 'email')->first()->value }}</a></p>
                           </div>
                       </div>
                       <div class="mobile_socials">
                           <a href="https://www.instagram.com/diabloboss.asia/" target="_blank" class="a instagram"></a>
                           <a href="#" class="a whatsapp"></a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer_bottom">
               Copyright 2023 <a href="#">DiabloBoss Asia Adventure</a> | All Right Reserved
           </div>
        </div>
    </div>

    <div class="search_form" id="search_form">
        <div class="wrap">
            <div class="wrap_float">
                <input type="text" class="input" placeholder="Search...">
                <button type="submit" class="submit"></button>
                <div class="close"></div>
            </div>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>



    <script defer src="{{asset('assets')}}/js/jquery.min.js"></script>
    <script defer src="{{asset('assets')}}/js/jquery-ui.min.js"></script>
    <script defer src="{{asset('assets')}}/js/slick.min.js"></script>
    <script defer src="{{asset('assets')}}/js/jquery.arcticmodal.min.js"></script>
    <script defer src="{{asset('assets')}}/js/lightgallery.js"></script>
    <script defer src="{{asset('assets')}}/js/spincrement.min.js"></script>
    <script defer src="{{asset('assets')}}/js/scripts.min.js"></script>
</body>

<!-- Mirrored from lavella.hellodigi.ru/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2023 09:49:56 GMT -->
</html>
