@extends('templates/header')
@section('contents')


<div class="homepage_slider">
    <div class="slider-container">
        <div class="slider-control left inactive"></div>
        <div class="slider-control right"></div>
        <ul class="slider-pagi"></ul>
        <div class="slider">
            <div class="slide slide-0">
                <div class="slide__bg" style="background-image: url({{asset('assets/img/gallery/1.jpg')}});"></div>
                <div class="slide__content">
                <div class="slide__text">
                    {{-- <h2 class="slide__text-heading">{{ $destination->nama_destination }}</h2> --}}
                </div>
                </div>
            </div>
            <div class="slide slide-1">
                <div class="slide__bg" style="background-image: url({{asset('assets/img/gallery/2.jpg')}});"></div>
                <div class="slide__content">
                <div class="slide__text">
                    {{-- <h2 class="slide__text-heading">{{ $destination->nama_destination }}</h2> --}}
                </div>
                </div>
            </div>
            <div class="slide slide-2">
                <div class="slide__bg" style="background-image: url({{asset('assets/img/gallery/3.jpg')}});"></div>
                <div class="slide__content">
                <div class="slide__text">
                    {{-- <h2 class="slide__text-heading">{{ $destination->nama_destination }}</h2> --}}
                </div>
                </div>
            </div>
            <div class="slide slide-3">
                <div class="slide__bg" style="background-image: url({{asset('assets/img/gallery/4.jpg')}});"></div>
                <div class="slide__content">
                <div class="slide__text">
                    {{-- <h2 class="slide__text-heading">{{ $destination->nama_destination }}</h2> --}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search_tour">
    <div class="wrap">
        <div class="wrap_float">
            <div class="search_tour_form">
                <h2 class="section_subtitle">
                    SEARCH TOUR
                </h2>
                <p class="section_title">
                    Prepare for an exciting journey
                </p>
                <div class="fields__block">
                    <div class="fields">
                        <div class="field">
                            <div class="label">Keywords</div>
                            <div class="field_wrap keywords">
                                <input type="text" class="input">
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
                            <div class="label">Tour List</div>
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
                            <div class="field_wrap select_field calendar_field">
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
                    </div>
                    <button class="submit"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popular_destination__section mainpage-slider">
    <div class="wrap">
        <div class="wrap_float">
            <div class="top_part">
                <div class="top_part_left">
                    <div class="section_subtitle">
                        {{-- Shop With Us --}}
                    </div>
                    <h2 class="section_title">
                        Boat
                    </h2>
                </div>
                <div class="top_part_right">
                    <a href="destinations.html" class="btn">
                        <span>View all Boat</span>
                    </a>
                    <div class="controls" id="popular_destination__arrows">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                </div>
            </div>
            <div class="section_content">
                <div class="popular_destination__slider" id="popular_destination__slider">
                    @foreach ($products as $product)
                    <div class="slide_item">
                        <a href="single.html" class="slide_item_img">
                            <div class="sq_parent">
                                <div class="sq_wrap">
                                    <div class="sq_content" style="background-image: url({{asset('uploads/'.$product->foto)}})"></div>
                                </div>
                            </div>
                        </a>
                        <a href="single.html" class="slide_item_content">
                        <h3 class="slide_title">{{ $product->nama_product }}</h3>
                        <p class="slide_text">
                            {{ $product->desc_product }}
                        </p>
                        </a>
                        <div class="slide_footer">
                        <div class="hours">15 Reviews</div>
                        <div class="tours_link">
                            <a href="tour-list.html">View Product</a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="most_popular__section mainpage-slider">
    <div class="wrap">
        <div class="wrap_float">
            <div class="top_part">
                <div class="top_part_left">
                    {{-- <p class="section_subtitle">POPULARLY</p> --}}
                    <h2 class="section_title">
                        Destination
                    </h2>
                </div>
                <div class="top_part_right">
                    <a href="tour-list.html" class="btn">
                        <span>View all tours</span>
                    </a>
                    <div class="controls" id="most_popular__arrows">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                </div>
            </div>
            <div class="most_popular__section__slider" id="most_popular__slider">
                @foreach ($tours as $tour)
                <a href="single.html" class="slider_item" style="background-image: url({{asset('uploads/'.$tour->foto)}})">
                    <div class="slider_item__content">
                        <div class="rating">
                        </div>
                        <h3 class="title">
                            {{$tour->nama_tour}} {{ $tour->price_usd != null ? ' | $'.$tour->price_usd : '' }}
                        </h3>
                        <p class="description">
                        {{$tour->desc}}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
