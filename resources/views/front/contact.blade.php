@extends('layouts.front')
@section('page-content')
    <div id="faq" style="background-image: url('{{ $contact->image }}');">
        <h1 style="flex-basis:100%;">Contact Us</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-2">Filter Map Locations: </div>
                <div class="col-md-3">
                    <select name="country" id="mapcountry" class="form-control">
                        <option value="">-- Select --</option>
                        @foreach ($selectedCountries as $item)
                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>&nbsp;</div>
            <div class="row" id="addresses" style="margin-top:20px; margin-bottom:50px;"></div>
            <div>&nbsp;</div>
            <div id="map" style="width:100%; height:400px;"></div>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbhR7yunyfBaK5FuCI9tcVqA8T2DhWNCw&callback=initMap&libraries=&v=weekly"
                async defer></script>
            <div class="contact-form">
                <div class="row">
                    <div class="col-md-8 contact-grid">
                        <h5 class="text-warning">{{-- $this->session->flashdata('success') --}}</h5>
                        {{-- validation_errors('<div class="alert alert-danger">', '</div>') --}}
                        <form method="post" enctype="multipart/form-data" action="{{ url('/post/contact') }}">
                            <select name="subject">
                                <option value="">-- Select Purpose--</option>
                                <option value="General inquiry">General inquiry</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Product request">Product request</option>
                                <option value="Product issues">Product issues</option>
                                <option value="Others">Others</option>
                            </select>

                            <input name="name" type="text" class="form-control" value="" placeholder="Name">

                            <input name="email" type="email" class="form-control" value=""
                                placeholder="Email Address">

                            <input name="phone" type="text" class="form-control" value="" placeholder="Phone">

                            <textarea name="message" cols="77" class="form-control" rows="6" value="" placeholder="Message"></textarea>
                            <div class="send">
                                <input type="submit" class="btn btn-primary" value="Send">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 contact-in">
                        <div class="address-more">
                            @if ($config->email != '')
                                <p style="font-weight:bold;"><i class="far fa-envelope"></i>
                                    &nbsp;&nbsp;{{ $config->email }}
                                </p>
                            @endif
                            @if ($config->phone != '')
                                <p style="font-weight:bold;"><i class="fab fa-whatsapp"></i>
                                    &nbsp;&nbsp;{{ $config->phone }}
                                </p>
                            @endif
                        </div>
                        <div class="address-more">
                            <h4>Address</h4>
                            <p>{{ nl2br($default->address) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        var map;
        var locations;
        initMap();

        function initMap() {
            $.ajax({
                    method: "POST",
                    url: "{{ url('map/locations') }}",
                    data: ''
                })
                .done(function(data) {
                    locations = JSON.parse(data);
                    locations.forEach(function(item, index) {
                        //console.log(item, index);
                    });

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: new google.maps.LatLng(parseFloat(locations[0][1]), parseFloat(locations[0][
                            2
                        ])),
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(locations[
                                i][2])),
                            map: map
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                });
        }

        $('#mapcountry').on('change', function(e) {
            $.ajax({
                    method: "POST",
                    url: "{{ url('map/country/locations') }}",
                    data: {
                        country: e.target.value
                    }
                })
                .done(function(data) {
                    $('#addresses').html('');
                    locations = JSON.parse(data);
                    locations.forEach(function(item, index) {
                        var content =
                            '<div class="col-md-4" style="padding:10px 20px;"><div style="background-color: #fafafa; padding:10px;">' +
                            nl2br(item[0]) + '</div></div>';
                        $('#addresses').append(content);
                    });

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: new google.maps.LatLng(parseFloat(locations[0][1]), parseFloat(
                            locations[0][2])),
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(locations[i][1]), parseFloat(
                                locations[i][2])),
                            map: map
                        });

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                });
        });

        function nl2br(str, is_xhtml) {
            if (typeof str === 'undefined' || str === null) {
                return '';
            }
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }
    </script>
@endsection
