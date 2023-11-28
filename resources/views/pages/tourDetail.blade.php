@extends('templates/header')
@section('contents')
<div class="image_bg--single" style="background-image: url({{asset('uploads/'.$tour->foto)}});"></div>
<div class="page_content single-page tour-single">
    <div class="content-head">
        <div class="wrap">
            <div class="wrap_float">
                <div class="main">
                    <div class="section-top single-row">
                        <div class="single-left">
                            {{-- <div class="rating">
                               <div class="stars">
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star"></div>
                               </div>
                               <div class="reviews_count">
                                   (2 Reviews)
                               </div>
                            </div> --}}
                            <h1 class="title">
                                {{$tour->nama_tour}}
                            </h1>
                            {{-- <div class="geo">America, San Francisco</div> --}}
                        </div>
                        <div class="single-right controls">
                            <button class="btn getModal" data-href="#book-now"><span>Book now</span></button>
                            <div class="slick-arrows tour-single-arrows">
                                <div class="arrow prev"></div>
                                <div class="arrow next"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single-tour-slider" id="single-tour-slider">
                        @foreach ($tourDetails as $tourDetail)
                        <div class="single-tour-slide">
                            <img src="{{asset('uploads/'.$tourDetail->Destination->foto)}}" class="image-cover" alt="">
                        </div>
                        @endforeach
                    </div>
                   <div class="description single-row">
                       <div class="single-left">
                           {!! $tour->desc_header !!}
                       </div>
                       {{-- <div class="single-right">
                           <div class="map-iframe">
                               <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=New%20York+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed"></iframe>
                           </div>
                       </div> --}}
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="wrap">
            <div class="wrap_float">
                <div class="single-left">
                    <div class="single-content page--content details">
                        <h2>Tour details</h2>
                        {!! $tour->desc_header !!}
                        {!! $tour->header1 !!}
                        <div class="list-block">
                            <ul class="true">
                                @if ($tourDetails->count()%2 == 0)
                                    @for ($i = 0; $i < $tourDetails->count()/2; $i++)
                                        <li>{{$tourDetails[$i]->Destination->nama_destination}}</li>
                                    @endfor
                                @else
                                    @for ($i = 0; $i < ($tourDetails->count()+1)/2; $i++)
                                        <li>{{$tourDetails[$i]->Destination->nama_destination}}</li>
                                    @endfor
                                @endif
                            </ul>
                            <ul class="true">
                                @if ($tourDetails->count()%2 == 0)
                                    @for ($i = $tourDetails->count()/2; $i < $tourDetails->count(); $i++)
                                        <li>{{$tourDetails[$i]->Destination->nama_destination}}</li>
                                    @endfor
                                @else
                                    @for ($i = ($tourDetails->count()+1)/2; $i < $tourDetails->count(); $i++)
                                        <li>{{$tourDetails[$i]->Destination->nama_destination}}</li>
                                    @endfor
                                @endif
                            </ul>
                        </div>
                        {!! $tour->header2 !!}
                        <div class="list-block">
                            {!! str_replace('<ul>','<ul class="true">',$tour->content2) !!}
                        </div>
                        @if ($tour->program == 1)
                            <div class="program">
                            <h2>Program</h2>
                            <div class="program-days">
                                <div class="day-item">
                                    <div class="day-head">
                                        <div class="day-icon">
                                            <img src="img/nap4.jpg" alt="" class="image-cover">
                                        </div>
                                        <div class="day-num">Day 1</div>
                                        <div class="day-title">Transfer to hotel</div>
                                    </div>
                                    <div class="day-body">
                                        <div class="apartment-item">
                                            <div class="apartment-content">
                                                <p>
                                                    Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor
                                                </p>
                                            </div>
                                            <div class="apartment-images lightgallery">
                                                <a class="image-container" href="img/vput2.jpg">
                                                    <img src="img/vput2.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput5.jpg">
                                                    <img src="img/vput5.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput4.jpg">
                                                    <img src="img/vput4.jpg" class="image-cover" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-item">
                                    <div class="day-head">
                                        <div class="day-icon">
                                            <img src="img/vput2.jpg" alt="" class="image-cover">
                                        </div>
                                        <div class="day-num">Day 2-4</div>
                                        <div class="day-title">Sightseeing tour</div>
                                    </div>
                                    <div class="day-body">
                                        <div class="apartment-item">
                                            <div class="apartment-content">
                                                <p>
                                                    Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor
                                                </p>
                                            </div>
                                            <div class="apartment-images lightgallery">
                                                <a class="image-container" href="img/vput2.jpg">
                                                    <img src="img/vput2.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput5.jpg">
                                                    <img src="img/vput5.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput4.jpg">
                                                    <img src="img/vput4.jpg" class="image-cover" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-item">
                                    <div class="day-head">
                                        <div class="day-icon">
                                            <img src="img/vput3.jpg" alt="" class="image-cover">
                                        </div>
                                        <div class="day-num">Day 5</div>
                                        <div class="day-title">Free time</div>
                                    </div>
                                    <div class="day-body">
                                        <div class="apartment-item">
                                            <div class="apartment-content">
                                                <p>
                                                    Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor
                                                </p>
                                            </div>
                                            <div class="apartment-images lightgallery">
                                                <a class="image-container" href="img/vput2.jpg">
                                                    <img src="img/vput2.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput5.jpg">
                                                    <img src="img/vput5.jpg" class="image-cover" alt="">
                                                </a>
                                                <a class="image-container" href="img/vput4.jpg">
                                                    <img src="img/vput4.jpg" class="image-cover" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="related_tours" id="end-single-content">
                        {{-- <div class="_title">
                            Related Tours
                        </div>
                        <div class="most_popular__section">
                           <a href="single.html" class="slider_item" style="background-image: url(img/prevput15.jpg)">
                               <div class="slider_item__content">
                                   <div class="rating">
                                       <div class="stars">
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star"></div>
                                       </div>
                                       <div class="reviews_count">
                                           (2 Reviews)
                                       </div>
                                   </div>
                                   <div class="title">
                                       Agra, India | from $300
                                   </div>
                                   <div class="days">
                                       <span>7 days</span>
                                   </div>
                               </div>
                           </a>

                           <a href="single.html" class="slider_item" style="background-image: url(img/prevput12.jpg)">
                               <div class="slider_item__content">
                                   <div class="rating">
                                       <div class="stars">
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star active"></div>
                                           <div class="star"></div>
                                       </div>
                                       <div class="reviews_count">
                                           (2 Reviews)
                                       </div>
                                   </div>
                                   <div class="title">
                                       A tour of the Islands | $3,500
                                   </div>
                                   <div class="days">
                                       <span>7 days</span>
                                   </div>
                               </div>
                           </a>
                       </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="mobile-fixed-bottom getModal" data-href="#book-now">
        Book now
    </div>
</div>
<div style="display: none;">
    <div class="modal modal_book_now" id="book-now">
        <div class="modal_wrap">
            <div class="modal-head">
                <img src="{{asset('uploads')}}/header.jpg" class="image-cover" alt="">
            </div>
            <div class="modal-body">
                {{-- <div class="tags">
                    <div class="tag discount">20% off</div>
                    <div class="tag new">New</div>
                </div> --}}
                <div class="modal-title">
                    {{$tour->nama_tour}} | ${{$tour->price_usd}}
                </div>
                <div class="fields">
                    <div class="field half">
                        <label class="label" for="name-2">Full Name*</label>
                        <div class="input_wrap">
                            <input type="text" class="input" id="name-2">
                        </div>
                    </div>
                    <div class="field half">
                        <label class="label" for="email-2">Email Address*</label>
                        <div class="input_wrap">
                            <input type="email" class="input" id="email-2">
                        </div>
                    </div>
                    <div class="field half">
                        <label class="label" for="date-2a">Travel Date*</label>
                        <div class="input_wrap calendar-field">
                            <input type="text" class="input js_calendar" id="date-2a">
                        </div>
                    </div>
                    <div class="field half">
                        <p class="label">Phone*</p>
                        <div class="input_wrap">
                            <input type="text" class="input" id="date-2">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="enquiry-2">Your Enquiry*</label>
                        <div class="textarea_wrap">
                            <textarea class="textarea" id="enquiry-2"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn submit">Submit</button>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>
@endsection
