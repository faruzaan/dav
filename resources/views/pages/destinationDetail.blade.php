@extends('templates/header')
@section('contents')
<div class="breadcrumbs">
    <div class="wrap">
        <div class="wrap_float">
            <a href="{{url('destination')}}">Destination</a>
            <span class="separator">/</span>
            <a href="#" class="current">{{$destination->nama_destination}}</a>
        </div>
    </div>
</div>
<div class="image_bg--single" style="background-image: url({{asset('uploads/destination/'.$destination->foto)}});"></div>
<div class="page_content single-page tour-single">
    <div class="content-head">
        <div class="wrap">
            <div class="wrap_float">
                <div class="main">
                    <div class="section-top single-row">
                        <div class="single-left">
                            <div class="rating">
                               {{-- <div class="stars">
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star active"></div>
                                   <div class="star"></div>
                               </div> --}}
                               {{-- <div class="reviews_count">
                                   (2 Reviews)
                               </div> --}}
                            </div>
                            <h1 class="title">
                                {{ $destination->nama_destination }}
                            </h1>
                            <div class="geo">{{ $destination->nama_destination }}</div>
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
                        <div class="single-tour-slide">
                            <img src="img/vput1.jpg" class="image-cover" alt="">
                        </div>
                        <div class="single-tour-slide">
                            <img src="img/vput2.jpg" class="image-cover" alt="">
                        </div>
                        <div class="single-tour-slide">
                            <img src="img/vput3.jpg" class="image-cover" alt="">
                        </div>
                        <div class="single-tour-slide">
                            <img src="img/vput4.jpg" class="image-cover" alt="">
                        </div>
                        <div class="single-tour-slide">
                            <img src="img/vput5.jpg" class="image-cover" alt="">
                        </div>
                    </div>
                   <div class="description single-row">
                       <div class="single-left">
                           {!! $destination->header !!}
                       </div>
                       <div class="single-right">
                           <div class="map-iframe">
                                <iframe src="{{ $destination->maps }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63144.22140829222!2d119.82302779274335!3d-8.44930699620747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db468a6d47ed641%3A0x87f524333c6a6e8d!2sLabuan%20Bajo%2C%20Kec.%20Komodo%2C%20Kabupaten%20Manggarai%20Barat%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1701004819501!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                           </div> --}}
                            </div>
                       </div>
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
                        <h2>Destination details</h2>
                        {!! $destination->content !!}
                    </div>

                    <div class="related_tours" id="end-single-content">
                        <div class="_title">
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
                       </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mobile-fixed-bottom getModal" data-href="#book-now">
        Book now
    </div>
</div>
@endsection
