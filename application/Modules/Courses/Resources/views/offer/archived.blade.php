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
  
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
        <table class="table table-borderless table-striped js-dataTable-responsive">
            @csrf
            @method('delete') 
            @if(count($archived)>0)
                <tr>
                    <th class="text-uppercase">Applicant Name</th>
                    <th class="text-uppercase">department</th>
                    <th class="text-uppercase">course</th>
                    <th class="text-uppercase">Status</th>
                   
                </tr>
                @foreach($archived as $item)

                   
                        <tr class="text-uppercase">
                            <td> {{ $item->applicant->sname }} {{ $item->applicant->fname }} {{ $item->applicant->mname }}</td>
                            <td> {{ $item->department }}</td>
                            <td> {{ $item->course }}</td>
                            <td> @if ($item->registrar_status ==1)<a  class="badge badge-sm bg-info" >Archived</a>
                                @endif
                            </td>
                         
                          </tr>
                    
                @endforeach
            @else
            <tr>
                <small class="text-center text-muted">There are no archived appications</small>
            </tr>
            @endif
    </table>
    {{ $archived->links('pagination::bootstrap-5') }}
            </div>
           
        </div>
    </div>

@endsection

