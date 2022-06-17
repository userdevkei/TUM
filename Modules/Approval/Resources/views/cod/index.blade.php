@extends('approval::layouts.backend')
@section('content')
    <!-- Page Content -->

    <link href="{{ asset('/css/index.css') }}" rel="stylesheet" />
    <script src = "{{ asset('/js/plugins/chart.js/Chart.min.js') }}" ></script>
    <script src = "{{ asset('/js/utils.js') }}" ></script>
    <script src = "{{ asset('jquery.js') }}" ></script>

    <div class="content-force">
        <div class="cod">
            <img src = '/Images/counter.svg' alt = 'COD' class = 'image-headers'>
            <h3>WELCOME, COD</h3>
        </div>
        <div id = 'preview-cod'>
            <section>
                <div id = 'name-preview'>
                    <a href = '{{ route('approval.pending') }}'><h4>Pending</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#006600;'>
                    <img src = '{{ asset('/Images/apply.png') }}' alt = 'Application Card'>
                </div>
            </section>
            <section>
                <div id = 'name-preview'>
                    <a href = '{{ route('approval.approved') }}'><h4>Approved</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#ffa144;'>
                    <img src = '{{ asset('/Images/cap.png') }}' alt = 'Application Card'>
                </div>
            </section>
            <section>
                <div id = 'name-preview'>
                    <a href = '{{ route('approval.rejected') }}'><h4>Rejected</h4></a>
                </div>
                <div class = 'card-build' style = 'background-color:#006600;'>
                    <img src = '{{ asset('/Images/apply.png') }}' alt = 'Application Card'>
                </div>
            </section>
        </div>
        <div id = 'graph-cod'>
            <canvas id = 'pie-cod'></canvas>
            <canvas id = 'bar-cod'></canvas>
        </div>
    </div>
    <!-- END Page Content -->

    <script src = "{{ asset('/js/build.js') }}"></script>
    <script>
        buildGraph();
    </script>

@endsection
