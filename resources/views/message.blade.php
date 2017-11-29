@extends('master')

@section('content')
    @include('navigations.message_recipients')

    <div class="messages">
        <div class="messages-holder">

            <div class="row">
                <div class="col m3">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m9">

                </div>
            </div>

            <div class="row">
                <div class="col s10 m10">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col s10 m10 offset-s2 offset-m2">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                        <div class="card-image">
                            <img src="{{ asset('images/nav_logo.png') }}" style="max-width: 128px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="divider"></div>

        <div class="messages-input">
            <div class="row" style="margin: 0px;">
                <div class="valign-wrapper">
                    <div class="col s8 m9 offset-m1">
                        <input id="message" type="text" placeholder="Message" style="padding-top: 8px;"/>
                    </div>
                    <div class="col s4 m2">
                        <button type="submit" class="btn blue darken-2">
                            <i class="material-icons">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop