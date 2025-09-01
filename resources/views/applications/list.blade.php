@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Applications</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Applications</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="applicationstable" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Programme</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td><a href="{{ route('applications.view_applications', $application->id) }}" class="styled-link">{{ $application->certificate_name }}</a> </td>
                                        <td>{{ $application->p_email }}</td>
                                        <td>{{ $application->country->country_name }}</td>
                                        <td>{{ $application->programme->programme_name }}</td>
                                        <td>
                                            @switch($application->status)
                                                @case('received')
                                                    <span class="badge bg-inverse-primary">Received</span>
                                                    @break
                                                @case('approved')
                                                    <span class="badge bg-inverse-success">Approved</span>
                                                    @break
                                                @case('question')
                                                    <span class="badge bg-inverse-warning">Question</span>
                                                    @break
                                                @case('rejected')
                                                    <span class="badge bg-inverse-danger">Rejected</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-inverse-secondary">Unknown</span>
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('application.edit', $application->id) }}">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </a>
                                                                                                                                                        
                                                    <a class="dropdown-item" href="javascript:void(0)" 
                                                    onclick="if (confirm('Are you sure you want to delete this application?')) { 
                                                        document.getElementById('delete-form-{{ $application->id }}').submit(); 
                                                    }">
                                                     <i class="fa fa-trash-o m-r-5"></i> Delete
                                                 </a>
                                                 
                                                 <form id="delete-form-{{ $application->id }}" action="{{ route('application.delete', $application->id) }}" method="POST" style="display:none;">
                                                     @csrf
                                                 </form>
                                                 
                                                     
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No applications found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection

