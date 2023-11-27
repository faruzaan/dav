@extends('templates/header')
@section('contents')
<div class="breadcrumbs">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#" class="current">Destination</a>
        </div>
    </div>
</div>
<div class="image_bg--destinations" style="background-image: url(img/header2.jpg);"></div>
<div class="page_content destinations-page">
    <div class="wrap">
        <div class="wrap_float">
            <div class="section-subtitle">EXPLORE TOURS BY DESTINATIONS</div>
            <div class="section-title">Destinations</div>
            <div class="main">
                <div class="popular_destination__slider">
                    @foreach ($destinations as $destination)
                    <div class="slide_item">
                       <a href="tour-list.html" class="slide_item_img">
                           <div class="sq_parent">
                               <div class="sq_wrap">
                                   <div class="sq_content" style="background-image: url({{asset('uploads/'.$destination->foto)}})"></div>
                               </div>
                            </div>
                       </a>
                       <a href="{{url('/destination/'.$destination->id_destination)}}" class="slide_item_content">
                           <div class="flag">
                               <img src="img/egypt-3.svg" alt="">
                           </div>
                           <h3 class="slide_title">
                               {{ $destination->nama_destination }}
                           </h3>
                           <p class="slide_text">
                               {{ substr(str_replace('</p>','',str_replace('<p>','',$destination->header)), 0, 200)  }}...
                           </p>
                       </a>
                       <div class="slide_footer">
                           <div class="hours">{{ $destination->Tour->count() }} tours</div>
                           <div class="tours_link">
                               <a href="{{url('/tour')}}">View all tours</a>
                           </div>
                       </div>
                   </div>
                    @endforeach
               </div>

                <div class="pagination">
                    {{ $destinations->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
