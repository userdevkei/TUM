@extends('layouts.backend')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Courses
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Courses</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            All Courses
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
            <table class="table table-borderless table-striped js-dataTable-responsive">
                @csrf
                @method('delete') 
                @if(count($availables)>0)
                    <tr>
                        <th class="text-uppercase">Course name</th>
                        <th class="text-uppercase">Department</th>
                        <th class="text-uppercase" >School</th>
                        <th class="text-uppercase">Duration</th>
                    </tr>
                    @foreach($availables as $course)

                        @foreach($course as $item)
                            <tr>
                                <td class="text-uppercase"> {{ $item->course_name }}</td>
                                <td class="text-uppercase"> {{ $item->department_id }}</td>
                                <td class="text-uppercase" > {{ $item->school_id }}</td>
                                <td class="text-uppercase"> {{ $item->course_duration }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                <tr>
                    <small class="text-center text-muted">There are no courses on offer</small>
                </tr>
                @endif
        </table>
        {{-- {{ $course_id->links('pagination::bootstrap-5') }} --}}
        </div>
            </div>
        </div>
    </div>
@endsection

