@extends('master')

@section('content')
    <div class="row">

        <div class="card">
            <div class="card-content">
                <div class="col s12 m6">
                    <div class="input-field">
                        <label for="notification">Notification</label>
                        <input id="notification" type="text">
                    </div>

                    <label for="notification_template">Notification Template</label>
                    <select id="notification_template" style="width: 75%">
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </select>
                </div>

                <div class="col s12 m6">
                    <div class="input-field">
                        <label for="recipients">Recipients</label>
                        <div id="recipients" class="chips chips-placeholder"></div>
                    </div>
                </div>

                <div class="col s12">
                    <button type="submit" class="btn right blue darken-2">
                        Send
                        <i class="material-icons right">send</i>
                    </button>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light green darken-2">
                        <i class="material-icons">add</i>
                    </a>
                </div>
                <div class="card-content">
                    <p><img class="circle" src="{{ asset('images/nav_logo.png') }}" style="width: 100%;"/></p>
                    <br>
                    <div class="divider"></div>
                    <br>
                    <p><b>Name</b></p>
                    <p>Details</p>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('images/nav_logo.png') }}" style="width: 100%;"/>

                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light green darken-2">
                        <i class="material-icons">add</i>
                    </a>
                </div>
                <div class="card-content">
                    <p><b>Name</b></p>
                    <p>Details</p>
                </div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').material_select();

            //For Chips
            $('.chips').material_chip();

            $('.chips-placeholder').material_chip({
                placeholder: ' ',
                secondaryPlaceholder: '+ Recipient',
            });
        });
    </script>
@stop