@extends('templates/header')
@section('contents')
<div class="page_content single-page about-page">
    <div class="content-head">
        <div class="wrap">
            <div class="wrap_float">
                <div class="main">
                    <div class="section-top">
                        <div class="title">
                            About Us
                        </div>
                        <div class="slick-arrows about-slider-arrows">
                            <div class="arrow prev"></div>
                            <div class="arrow next"></div>
                        </div>
                    </div>
                    <div class="about-slider" id="about-slider">
                        @foreach ($destinations as $destination)
                            <div class="about-slide">
                                <img src="{{asset('uploads/'.$destination->foto)}}" alt="" class="image-cover">
                            </div>
                        @endforeach
                    </div>
                   <div class="description">
                       <div class="description-title">
                           It's Time to travel
                       </div>
                       <div class="text">
                           <div class="left">
                               <p>
                                    Embark on an unforgettable journey as you turn from breathtaking landscapes to cultural wonders,
                                     our destinations promise to captivate your senses and create memories that will last a lifetime.
                                </p>

                           </div>
                           <div class="right">
                               <p>
                                   Your adventure awaits—immerse yourself in the beauty and diversity that awaits at every corner.
                               </p>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content-body">
        <div class="wrap">
            <div class="wrap_float">
                <div class="statistic" id="statistic">
                    <div class="stat-item">
                        <div class="val spincrement" data-start="50">357</div>
                        <div class="text">People in the team</div>
                    </div>
                    <div class="stat-item" data-start="1150">
                        <div class="val spincrement">34354</div>
                        <div class="text">Travel this year</div>
                    </div>
                    <div class="stat-item">
                        <div class="val spincrement" data-start="850">1998</div>
                        <div class="text">We have been working since 1998</div>
                    </div>
                </div>
                <div class="team">
                    <div class="team_title">Team</div>
                    <div class="section_content">
                        <div class="item">
                            <div class="item_image">
                                <div class="sq_parent">
                                   <div class="sq_wrap">
                                       <div class="sq_content">
                                           <img src="{{asset('uploads/peoples')}}/1.jpg" alt="">
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="item_info">
                                <div class="item_title">Jeanette Kingston</div>
                                <div class="item_position">Chief Executive Officer</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item_image">
                                <div class="sq_parent">
                                   <div class="sq_wrap">
                                       <div class="sq_content">
                                           <img src="{{asset('uploads/peoples')}}/1.jpg" alt="">
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="item_info">
                                <div class="item_title">Jeanette Kingston</div>
                                <div class="item_position">Chief Executive Officer</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="item_image">
                                <div class="sq_parent">
                                   <div class="sq_wrap">
                                       <div class="sq_content">
                                           <img src="{{asset('uploads/peoples')}}/1.jpg" alt="">
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="item_info">
                                <div class="item_title">Jeanette Kingston</div>
                                <div class="item_position">Chief Executive Officer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
