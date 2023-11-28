@extends('templates/header')
@section('contents')
<div class="page_content single-page about-page contacts-page">
    <div class="content-head">
        <div class="wrap">
            <div class="wrap_float">
                <div class="main">
                    <div class="title">
                        Contact Us
                    </div>
                    <div class="contacts-columns">
                        <div class="column tel">
                            <div class="_title">Phone</div>
                            <div class="text">
                                @foreach (\App\Models\System::where('desc', 'contact')->get() as $contact)
                                <a href="https://wa.me/{{$contact->value}}" target="_blank">{{$contact->value}}</a>
                                @endforeach
                            </div>


                        </div>
                        <div class="column email">
                            <div class="_title">Email</div>
                            <div class="text">
                                @foreach (\App\Models\System::where('desc','email')->get() as $contact)
                            <a href="mailto:{{ $contact->value }}">{{ $contact->value }}</a>
                            @endforeach
                            </div>

                        </div>
                        <div class="column location">
                            <div class="_title">Location</div>
                            <div class="text">
                                {{ \App\Models\System::where('desc', 'address')->first()->value }}
                            </div>
                            {{-- <a href="#">View On Google Map</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content-body">
        <div class="mab-block" id="gmap"></div>
    </div> --}}
</div>
@endsection
