<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Czytaj z nami</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_index.css')}}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon1.jpg') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/') }}">Strona główna</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('books.index') }}">Książki</a>
                </li>
                
                @if (Route::has('login'))
                @auth
                <!-- KOMUNIKAT 'JESTEŚ ZALOGOWANY...' -->
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}">Twój profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('calendar') }}">Twój kalendarz</a>
                </li>
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown ms-auto" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Zalogowany użytkownik: {{ Auth::user()->firstName }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj się') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @endif
    <main><br><br>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="card" >
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Twoje postępy</h5>   
                            Twoje przeczytane strony od założenia konta: {{$sumPagesAll}}<br>
                            Twoje przeczytane strony w tym roku: {{ $currentPages[0] }}<br>
                            Twoje przeczytane strony w tym miesiącu: {{ $currentPages[1] }}<br>
                            Twoje przeczytane strony w tym tygodniu: {{ $currentPages[2] }}<br>
                            Twoje przeczytane strony dzisiaj: {{ $currentPages[3] }}<br>
                            <hr>
                            @foreach($goals as $data)
                                Twój cel roczny: {{ $data->yearGoal }}<br>
                                Twój cel miesięczny: {{ $data->monthGoal }}<br>
                                Twój cel tygodniowy: {{ $data->weekGoal }}<br>
                                Twój cel dzieny: {{ $data->dayGoal }}
                            @endforeach
                            <hr>
                            
                            <!-- Cel roczny -->
                            @if( $currentPages[0] > $data->yearGoal )
                                Cel roczny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                            @else
                                Cel roczny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                                                 
                            @endif 
                            <br>
                            
                            <!-- Cel miesięczny -->
                            @if( $currentPages[1] > $data->monthGoal ) 
                                Cel miesięczny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                            @else
                                Cel miesięczny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                            @endif
                            <br>
                            <!-- Cel tygodniowy -->
                            @if( $currentPages[2] > $data->weekGoal ) 
                                Cel tygodniowy został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                            @else
                                Cel tygodniowy nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                            @endif
                            <br>
                            <!-- Cel dzienny -->
                            @if( $currentPages[3] > $data->dayGoal ) 
                                Cel dzienny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                            @else
                                Cel dzienny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                            @endif
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade" id="pagesModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Podaj / edytuj liczbę stron: </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="title" id="title" class="form-control" placeholder="Liczba">

                                        <span id="titleError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="event_start_date">Data: </label>
                                        <input type="date" name="date" id="date" class="form-control onlydatepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary" onclick="save_event()">Zapisz</button> -->
                        <button type="button" class="btn btn-primary" id="saveBtn">Zapisz</button>
                    </div>
                </div>
            </div>
        </div>





    </main>


    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            var pages = @json($events);
            var calendar = $('#calendar').fullCalendar({
                monthNames: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
                monthNamesShort: ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'],
                dayNames: ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'],
                dayNamesShort: ['Nie', 'Pon', 'Wt', 'Śr', 'Czw', 'Pią', 'Sob'],
                buttonText: {
                    today: 'dzisiaj',
                    day: 'dzień',
                    week: 'tydzień',
                    month: 'miesiąc'
                },
                displayEventTime: false,
                defaultView: 'month',
                timeZone: 'local',
                editable: true,
                eventStartEditable: true,
                height: 600,
                header: {
                    left: 'title',
                    center: '',
                    right: 'today prev,next'
                },
                selectAllow: function(event) { //FUNKCJA DO WYBORU TYLKO JEDNEGO, POJEDYNCZEGO DNIA
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
                events: pages,

                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    $('#pagesModal').modal('toggle');
                    $('#date').val(moment(start).format('YYYY-MM-DD'));

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var date = $('#date').val();

                        $.ajax({
                            url: "{{ route('calendar.save')}}",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                date
                            },
                            success: function(response) {
                                $('#pagesModal').modal('hide');
                                location.reload();
                                // $('#calendar').fullCalendar('renderEvent',{
                                //     'title': response.title,
                                //     'date': response.date,
                                // })
                                // $('#calendar').fullCalendar( 'rerenderEvents' );

                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html("To pole jest wymagane");
                                    // $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        })



                    })
                }
            })
        });
    </script>
</body>

</html>