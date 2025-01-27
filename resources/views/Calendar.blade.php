@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <div class="col-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Twoje postępy</h5>
                    Twoje przeczytane strony od założenia konta: {{$sumPagesAll}}<br>
                    Twoje przeczytane strony w tym roku: {{ $currentPages[0] }}<br>
                    Twoje przeczytane strony w tym miesiącu: {{ $currentPages[1] }}<br>
                    Twoje przeczytane strony w tym tygodniu: {{ $currentPages[2] }}<br>
                    Twoje przeczytane strony dzisiaj: {{ $currentPages[3] }}<br>
                    <hr>
                    @if ($goals->isEmpty())
                    Nie masz ustawionych jeszcze żadnych celi czytelniczych. <br>
                    Przejdź do penlu 'Twój profil' i ustaw swoje cele.
                    
                    @else

                    
                        @foreach($goals as $data)


                            @if(isset($data->yearGoal))
                            Twój cel roczny: {{ $data->yearGoal }}<br>
                            @else  
                                Twój cel roczny: nie ustawiony<br>
                            @endif

                            @if(isset($data->monthGoal))
                                Twój cel miesięczny: {{ $data->monthGoal }}<br>
                            @else  
                                Twój cel miesięczny: nie ustawiony<br>
                            @endif

                            @if(isset($data->weekGoal))
                                Twój cel tygodniowy: {{ $data->weekGoal }}<br>
                            @else  
                                Twój cel tygodniowy: nie ustawiony<br>
                            @endif

                            @if(isset($data->dayGoal))
                                Twój cel dzienny: {{ $data->dayGoal }}<br>
                            @else  
                                Twój cel dzienny: nie ustawiony<br>
                            @endif
                            
                        @endforeach
                       
                    
                    @endif
                    <hr>

                    <!-- Cel roczny -->

                    @if(isset($data->yearGoal))
                        @if( $currentPages[0] > $data->yearGoal )
                        Cel roczny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                        @else
                        Cel roczny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">

                        @endif
                    @else
                        Cel roczny nie został ustawiony.


                    @endif
                    <br>

                    <!-- Cel miesięczny -->
                    @if(isset($data->monthGoal))
                        @if( $currentPages[1] > $data->monthGoal )
                        Cel miesięczny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                        @else
                        Cel miesięczny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                        @endif
                    @else
                        Cel miesięczny nie został ustawiony.
                    @endif
                    <br>
                    <!-- Cel tygodniowy -->
                    @if(isset($data->weekGoal))
                        @if( $currentPages[2] > $data->weekGoal )
                        Cel tygodniowy został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                        @else
                        Cel tygodniowy nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                        @endif
                    @else
                        Cel tygodniowy nie został ustawiony.
                    @endif
                    <br>
                    <!-- Cel dzienny -->
                    @if(isset($data->dayGoal))
                        @if( $currentPages[3] > $data->dayGoal )
                        Cel dzienny został spełniony. <img src="{{asset('images/ok-mark.png')}}">
                        @else
                        Cel dzienny nie został spełniony. <img src="{{asset('images/no-mark.png')}}">
                        @endif
                    @else
                        Cel dzienny nie został ustawiony.
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
                                <label for="date">Data: </label>
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
            eventBorderColor: 'black',
            buttonText: {
                today: 'dzisiaj',
                day: 'dzień',
                week: 'tydzień',
                month: 'miesiąc'
            },
            plugins: [ 'bootstrap' ],
             themeSystem: 'bootstrap',
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
                        },
                        error: function(error) {
                            if (error.responseJSON.errors) {
                                $('#titleError').html("To pole jest wymagane. Wpisz liczbę większą od zera");
                            }
                        },
                    })



                })
            }
        })
    });
</script>
@endsection