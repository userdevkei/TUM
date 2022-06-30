@extends('layouts.backend')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        APPLICATIONS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Applications</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            All Applications
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
                @if(count($accepted)>0)
                    <tr> 
                        <th>✔</th>
                        <th class="text-uppercase">Applicant Name</th>
                        {{-- <th class="text-uppercase">school</th> --}}
                        <th class="text-uppercase">department</th>
                        <th class="text-uppercase">course</th>
                        <th class="text-uppercase">Status</th>
                    </tr>
                    @foreach($accepted as $item)
                            <tr class="text-uppercase">
                                <td>
                                    @if($item->dean_status === 1 || 2)
                                        <form action="{{ route('courses.acceptedMail') }}" method="post">
                                            @csrf
                                    <input class="accepted" type="checkbox" name="submit[]" value="{{ $item->id }}" required>
                                        @else
                                        ✔
                                    @endif
                                    </td>
                                <td> {{ $item->applicant->sname }} {{ $item->applicant->fname }} {{ $item->applicant->mname }}</td>
                                {{-- <td> {{ $item->school }}</td> --}}
                                <td> {{ $item->department }}</td>
                                <td> {{ $item->course }}</td>
                                <td> @if ($item->dean_status ===1)
                                    <a  class="badge badge bg-success" >Approved</a>
                                    @else
                                    <a  class="badge badge bg-danger" >Rejected</a>
                                    @endif
                                </td>
                                
                            </tr>
                        
                    @endforeach
                @else
                <tr>
                    <small class="text-center text-muted">There are no accepted appications</small>
                </tr>
                @endif
        </table>
        @if(count($accepted)>0)
            <div>
                <input type="checkbox" onclick="for(c in document.getElementsByClassName('accepted')) document.getElementsByClassName('accepted').item(c).checked = this.checked"> Select all
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-sm btn-alt-primary" href="route('courses.archived')" data-toggle="click-ripple">Submit batch</button>
            </div>
            @endif
    </form>
        {{ $accepted->links('pagination::bootstrap-5') }}
        
        </div>
            </div>
        </div>
    </div>
   

@endsection

