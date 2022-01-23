@extends('BCA.layouts.mainLayout')
@section('page-title')
    Calendar
@endsection
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/plainAdmin/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plainAdmin/main.css') }}" />
@endsection
@section('contents')
    {{-- page titles --}}
    @include('BCA.pages.partials._pageTitle')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style calendar-card mb-30">
                    <div id="calendar-full" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">

                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
    </section>
@endsection

@section('page_level_js')
    <script src="{{ asset('js/plainAdmin/fullcalendar.js') }}"></script>
    <script>
        // ====== calendar activation
        document.addEventListener("DOMContentLoaded", function() {
            var calendarFullEl = document.getElementById("calendar-full");
            var calendarFull = new FullCalendar.Calendar(calendarFullEl, {
                initialView: "dayGridMonth",
                headerToolbar: {
                    end: "today prev,next",
                },
            });
            calendarFull.render();
        });
    </script>
@endsection
