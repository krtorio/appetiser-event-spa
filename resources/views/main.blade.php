<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <br>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Calendar
                </div>
                <div class="card-body" id="app">
                    <div class="row">
                        <div class="col-4">
                            @include('form')
                        </div>
                        <div class="col-8">
                            @include('calendar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
        <!--script src="/js/event-calendar.js"></script-->
    </body>
</html>