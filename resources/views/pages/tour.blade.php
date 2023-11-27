@extends('templates/header')
@section('contents')
<div class="breadcrumbs">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#" class="current">Tour</a>
        </div>
    </div>
</div>
<div class="page_head" style="background-image: url(img/header5.jpg)">
    <div class="wrap">
        <div class="wrap_float">
            <div class="title">Search Tours</div>
            <div class="search_tour">
               <div class="search_tour_form">
                   <div class="fields__block">
                       <div class="fields">
                           <div class="field">
                               <div class="label">Keywords</div>
                               <div class="field_wrap keywords">
                                   <input type="text" class="input">
                               </div>
                           </div>
                           <div class="field">
                               <div class="label">Activity</div>
                               <div class="field_wrap select_field">
                                   <select name="tour-activity">
                                    <option value="">Any</option>
                                    <option value="city-tours">City Tours</option>
                                    <option value="cultural-thematic-tours">Cultural &amp; Thematic Tours</option>
                                    <option value="family-friendly-tours">Family Friendly Tours</option>
                                    <option value="holiday-seasonal-tours">Holiday &amp; Seasonal Tours</option>
                                    <option value="indulgence-luxury-tours">Indulgence &amp; Luxury Tours</option>
                                    <option value="outdoor-activites">Outdoor Activites</option>
                                    <option value="relaxation-tours">Relaxation Tours</option>
                                    <option value="wild-adventure-tours">Wild &amp; Adventure Tours</option>
                                </select>
                               </div>
                           </div>
                           <div class="field">
                               <div class="label">Destination</div>
                               <div class="field_wrap select_field">
                                   <select name="tour-activity">
                                    <option value="">Any</option>
                                    <option value="city-tours">City Tours</option>
                                    <option value="cultural-thematic-tours">Cultural &amp; Thematic Tours</option>
                                    <option value="family-friendly-tours">Family Friendly Tours</option>
                                    <option value="holiday-seasonal-tours">Holiday &amp; Seasonal Tours</option>
                                    <option value="indulgence-luxury-tours">Indulgence &amp; Luxury Tours</option>
                                    <option value="outdoor-activites">Outdoor Activites</option>
                                    <option value="relaxation-tours">Relaxation Tours</option>
                                    <option value="wild-adventure-tours">Wild &amp; Adventure Tours</option>
                                </select>
                               </div>
                           </div>
                           <div class="field">
                               <div class="label">Duration</div>
                               <div class="field_wrap select_field">
                                   <select name="tour-activity">
                                    <option value="">Any</option>
                                    <option value="city-tours">City Tours</option>
                                    <option value="cultural-thematic-tours">Cultural &amp; Thematic Tours</option>
                                    <option value="family-friendly-tours">Family Friendly Tours</option>
                                    <option value="holiday-seasonal-tours">Holiday &amp; Seasonal Tours</option>
                                    <option value="indulgence-luxury-tours">Indulgence &amp; Luxury Tours</option>
                                    <option value="outdoor-activites">Outdoor Activites</option>
                                    <option value="relaxation-tours">Relaxation Tours</option>
                                    <option value="wild-adventure-tours">Wild &amp; Adventure Tours</option>
                                </select>
                               </div>
                           </div>
                           <div class="field">
                               <div class="label">Date</div>
                               <div class="field_wrap calendar_field">
                                   <input type="text" class="calendar js_calendar">
                               </div>
                           </div>
                       </div>
                       <button class="submit"></button>
                   </div>
               </div>
           </div>
        </div>
    </div>
    <div class="top_destination">
       <div class="section_content popular_destination__content">
           <div class="wrap">
               <div class="wrap_float">
                    @foreach ($destinations as $destination)
                    <a href="{{url('/destination/'.$destination->id_destination)}}" class="item">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content image" style="background-image: url({{asset('uploads/'.$destination->foto)}})"></div>
                                <span>{{$destination->nama_destination}}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
<div class="page_content">
    <div class="wrap">
        <div class="wrap_float">
            <div class="main">
                <div class="most_popular__section">
                    @foreach ($tours as $tour)
                    <a href="{{url('/tour/'.$tour->id_tour)}}" class="slider_item" style="background-image: url({{asset('uploads/'.$tour->foto)}})">
                        <div class="slider_item__content">
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
                            <h3 class="title">
                                {{$tour->nama_tour}} | ${{$tour->price_usd}}
                            </h3>
                            <p class="description">
                                {{$tour->desc}}
                            </p>
                            <div class="days">
                                <span>{{$tour->duration}} days</span>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>
                <div class="pagination">
                    {{ $tours->links('vendor.pagination.default') }}
                </div>
            </div>
            <div class="sidebar">
                <div class="latest_tours">
                    <div class="block-title">
                        Latest Tours
                    </div>
                    <div class="list">
                        @foreach ($latest_tours as $latest_tour)
                        <a href="single.html" class="_item">
                            <div class="left">
                                <div class="img" style="background-image: url({{asset('uploads/'.$latest_tour->foto)}});"></div>
                            </div>
                            <div class="right">
                                <div class="_title">{{$latest_tour->nama_tour}}</div>
                                <div class="cost">
                                    <b>${{$latest_tour->price_usd}}</b>
                                </div>
                                <div class="time">{{$latest_tour->duration}} days</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="tour_category">
                    <div class="block-title">
                        Tour Category
                    </div>
                    <ul>
                        <li><a href="#">Outdoor Activites</a></li>
                        <li><a href="#">City Tours</a></li>
                        <li><a href="#">Cultural & Thematic Tours</a></li>
                        <li><a href="#">Indulgence & Luxury Tours</a></li>
                        <li><a href="#">Family Friendly Tours</a></li>
                        <li><a href="#">Holiday & Seasonal Tours</a></li>
                    </ul>
                </div> --}}
                {{-- <div class="recent_articles">
                    <div class="block-title">
                        Recent Articles
                    </div>
                    <div class="list">
                        <a href="blog-single.html" class="_item">
                            <div class="img" style="background-image: url(img/sidebar4.jpg);"></div>
                            <div class="info">
                                <div class="_title">
                                    Pack wisely before traveling
                                </div>
                                <div class="date">JUNE 6/2019</div>
                            </div>
                        </a>
                        <a href="blog-single.html" class="_item">
                            <div class="img" style="background-image: url(img/sidebar5.jpg);"></div>
                            <div class="info">
                                <div class="_title">
                                    Pack wisely before traveling
                                </div>
                                <div class="date">JUNE 6/2019</div>
                            </div>
                        </a>
                        <a href="blog-single.html" class="_item">
                            <div class="img" style="background-image: url(img/sidebar6.jpg);"></div>
                            <div class="info">
                                <div class="_title">
                                    Pack wisely before traveling
                                </div>
                                <div class="date">JUNE 6/2019</div>
                            </div>
                        </a>
                    </div>
                </div> --}}
                <div class="question-block">
                    <div class="_title">Get a Question?</div>
                    <div class="_text">
                        Do not hesitage to give us a call. We are an expert team and we are happy to talk to you.
                    </div>
                    <div class="tel">
                        @foreach (\App\Models\System::where('desc', 'contact')->get() as $contact)
                        <a href="tel:{{$contact->value}}">{{$contact->value}}</a><br>
                        @endforeach
                    </div>
                    <div class="email">
                        <a href="{{ \App\Models\System::where('desc', 'email')->first()->value }}">{{ \App\Models\System::where('desc', 'email')->first()->value }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
