@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">View Application</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View application</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            <img class="user-profile" alt="{{ $application->certificate_name }}"
                                                src="{{ asset('storage/' . $application->passport_size) }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $application->certificate_name }}</h3>
                                                <div class="staff-id">Programme Applied for:
                                                    {{ $application->programme->programme_name }}</div>
                                                <div class="staff-id">Workplace: {{ $application->workplace }}</div>
                                                <div class="small doj text-muted">Date of Application :
                                                    {{ $application->created_at }}</div>
                                                <div class="staff-msg">
                                                    <a class="btn btn-custom" target="blank"
                                                        href="mailto:{{ $application->personal_email }}">Send Email </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Status:</div>
                                                    <div class="text">
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
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text">
                                                        @if (!empty($application->mobile_no))
                                                            <a>{{ $application->mobile_no }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text">
                                                        @if (!empty($application->personal_email))
                                                            <a>{{ $application->personal_email }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">
                                                        @if (!empty($application->gender))
                                                            <a>{{ $application->gender }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Education:</div>
                                                    <div class="text">
                                                        @if (!empty($application->education))
                                                            <a>
                                                                @switch($application->education)
                                                                    @case('diploma')
                                                                        Diploma
                                                                    @break

                                                                    @case('degree')
                                                                        Degree
                                                                    @break

                                                                    @case('masters')
                                                                        Masters
                                                                    @break

                                                                    @case('phd')
                                                                        PhD
                                                                    @break

                                                                    @case('miss')
                                                                        Miss
                                                                    @break

                                                                    @default
                                                                        N/A
                                                                @endswitch
                                                            </a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Completion Year:</div>
                                                    <div class="text">
                                                        @if (!empty($application->completion_year))
                                                            <a>{{ $application->completion_year }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="title">Experience:</div>
                                                    <div class="text">
                                                        @if (!empty($application->experience))
                                                            <a>
                                                                @switch($application->experience)
                                                                    @case(1)
                                                                        1 Year
                                                                    @break

                                                                    @case(2)
                                                                        2 Years
                                                                    @break

                                                                    @case(3)
                                                                        3 Years and above
                                                                    @break

                                                                    @default
                                                                        N/A
                                                                @endswitch
                                                            </a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Country:</div>
                                                    <div class="text">
                                                        @if (!empty($application->country->country_name))
                                                            <a>{{ $application->country->country_name }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">City:</div>
                                                    <div class="text">
                                                        @if (!empty($application->city))
                                                            <a>{{ $application->city }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="title">Street:</div>
                                                    <div class="text">
                                                        @if (!empty($application->street))
                                                            <a>{{ $application->street }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                        href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#docs" data-toggle="tab" class="nav-link active">Attachments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!-- Profile Info Tab -->
                <div id="docs" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Attachments <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">

                                        <li>
                                            <div class="title">Degree Certificate:</div>
                                            <div class="text">
                                                @if (!empty($application->degree_certificate))
                                                    <a href="{{ asset('storage/' . $application->degree_certificate) }}"
                                                        target="_blank">View Degree Certificate</a>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </li>

                                        <li>
                                            <div class="title">Practice License:</div>
                                            <div class="text">
                                                @if (!empty($application->practice_license))
                                                    <a href="{{ asset('storage/' . $application->practice_license) }}"
                                                        target="_blank">View License</a>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </li>

                                        <li>
                                            <div class="title">Recommendation Letter:</div>
                                            <div class="text">
                                                @if (!empty($application->practice_license))
                                                    <a href="{{ asset('storage/' . $application->recommendation_letter) }}"
                                                        target="_blank">View Recommendation Letter</a>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </li>

                                        <li>
                                            <div class="title">Proof of Payment:</div>
                                            <div class="text">
                                                @if (!empty($application->payment_proof))
                                                    <a href="{{ asset('storage/' . $application->payment_proof) }}"
                                                        target="_blank">View Payment Proof</a>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Application Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('application.update', $application->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block"
                                                src="{{ asset('storage/' . $application->passport_size) }}"
                                                alt="{{ $application->certificate_name }}">
                                            <div class="fileupload btn">
                                                <span class="btn-text">Edit</span>
                                                <input class="upload" type="file" id="passport_size"
                                                    name="passport_size">
                                                @if (!empty($application))
                                                    <input type="hidden" name="hidden_passport_size"
                                                        value="{{ $application->passport_size }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="select form-control" id="status" name="status">
                                                        <option value="received"
                                                            {{ $application->status == 'received' ? 'selected' : '' }}>
                                                            Received</option>
                                                        <option value="approved"
                                                            {{ $application->status == 'approved' ? 'selected' : '' }}>
                                                            Approved</option>
                                                        <option value="question"
                                                            {{ $application->status == 'question' ? 'selected' : '' }}>
                                                            Question</option>
                                                        <option value="rejected"
                                                            {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                                            Rejected</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select class="form-control" id="title" name="title">
                                                            <option value="" disabled>Select Title</option>
                                                            <option value="professor" {{ $application->title == 'professor' ? 'selected' : '' }}>Professor</option>
                                                            <option value="doctor" {{ $application->title == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                                            <option value="mr" {{ $application->title == 'mr' ? 'selected' : '' }}>Mr</option>
                                                            <option value="mrs" {{ $application->title == 'mrs' ? 'selected' : '' }}>Mrs</option>
                                                            <option value="miss" {{ $application->title == 'miss' ? 'selected' : '' }}>Miss</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" id="firstname"
                                                            name="firstname"
                                                            value="{{ $application->firstname }}">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                            name="lastname"
                                                            value="{{ $application->lastname }}">
                                                    </div>
                                                </div>
                                           
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Certificate Name</label>
                                                    <input type="text" class="form-control" id="certificate_name"
                                                        name="certificate_name"
                                                        value="{{ $application->certificate_name }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="select form-control" id="gender" name="gender">
                                                        <option value="male"
                                                            {{ $application->gender == 'male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="female"
                                                            {{ $application->gender == 'female' ? 'selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Personal Email</label>
                                                    <input type="email" class="form-control" id="personal_email"
                                                        name="personal_email" value="{{ $application->personal_email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobile_no"
                                                        name="mobile_no" value="{{ $application->mobile_no }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="select form-control" id="country_id"
                                                        name="country_id">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $application->country_id == $country->id ? 'selected' : '' }}>
                                                                {{ $country->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city" value="{{ $application->city }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control" id="street"
                                                        name="street" value="{{ $application->street }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Workplace</label>
                                                    <input type="text" class="form-control" id="workplace"
                                                        name="workplace" value="{{ $application->workplace }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Programme</label>
                                                    <select class="select form-control" id="programme_id"
                                                        name="programme_id">
                                                        @foreach ($programmes as $programme)
                                                            <option value="{{ $programme->id }}"
                                                                {{ $application->programme_id == $programme->id ? 'selected' : '' }}>
                                                                {{ $programme->programme_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Education</label>
                                                    <select class="form-control" id="education" name="education">
                                                        <option value="diploma"
                                                            {{ $application->education == 'diploma' ? 'selected' : '' }}>
                                                            Diploma</option>
                                                        <option value="degree"
                                                            {{ $application->education == 'degree' ? 'selected' : '' }}>
                                                            Degree</option>
                                                        <option value="masters"
                                                            {{ $application->education == 'masters' ? 'selected' : '' }}>
                                                            Masters</option>
                                                        <option value="phd"
                                                            {{ $application->education == 'phd' ? 'selected' : '' }}>PhD
                                                        </option>
                                                        <option value="miss"
                                                            {{ $application->education == 'miss' ? 'selected' : '' }}>Miss
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Experience</label>
                                                    <select class="form-control" id="experience" name="experience">
                                                        <option value="1"
                                                            {{ $application->experience == 1 ? 'selected' : '' }}>1 Year
                                                        </option>
                                                        <option value="2"
                                                            {{ $application->experience == 2 ? 'selected' : '' }}>2 Years
                                                        </option>
                                                        <option value="3"
                                                            {{ $application->experience == 3 ? 'selected' : '' }}>3 Years
                                                            and above</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Completion Year</label>
                                                    <input type="text" class="form-control" id="completion_year"
                                                        name="completion_year"
                                                        value="{{ $application->completion_year }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Declaration</label>
                                                    <input type="text" class="form-control" id="declaration"
                                                        name="declaration" value="{{ $application->declaration }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fee Paid</label>
                                                    <input type="text" class="form-control" id="fee_paid"
                                                        name="fee_paid" value="{{ $application->fee_paid }}">
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Attachments</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Degree Certificate</label>
                                                    @if (!empty($application->degree_certificate))
                                                        <a href="{{ asset('storage/' . $application->degree_certificate) }}"
                                                            target="_blank">Degree Certificate</a>
                                                    @else
                                                        <p>N/A</p>
                                                    @endif
                                                    <input type="file" class="form-control" name="degree_certificate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Practice License</label>
                                                    @if (!empty($application->practice_license))
                                                        <a href="{{ asset('storage/' . $application->practice_license) }}"
                                                            target="_blank">Practice License</a>
                                                    @else
                                                        <p>N/A</p>
                                                    @endif
                                                    <input type="file" class="form-control" name="practice_license">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Recommendation Letter</label>
                                                    @if (!empty($application->recommendation_letter))
                                                        <a href="{{ asset('storage/' . $application->recommendation_letter) }}"
                                                            target="_blank">Recommendation Letter</a>
                                                    @else
                                                        <p>N/A</p>
                                                    @endif
                                                    <input type="file" class="form-control"
                                                        name="recommendation_letter">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Proof of Payment</label>
                                                    @if (!empty($application->payment_proof))
                                                        <a href="{{ asset('storage/' . $application->payment_proof) }}"
                                                            target="_blank">Proof of Payment</a>
                                                    @else
                                                        <p>N/A</p>
                                                    @endif
                                                    <input type="file" class="form-control" name="payment_proof">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->
            <!-- Validation Errors Modal -->
            <div id="errorModal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Validation Errors</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Validation Errors Modal -->
        </div>
        <!-- /Page Content -->
        @section('script')
            <script>
                $('#validation').validate({
                    rules: {
                        name_primary: 'required',
                        relationship_primary: 'required',
                        phone_primary: 'required',
                        phone_2_primary: 'required',
                        name_secondary: 'required',
                        relationship_secondary: 'required',
                        phone_secondary: 'required',
                        phone_2_secondary: 'required',
                    },
                    messages: {
                        name_primary: 'Please input name primary',
                        relationship_primary: 'Please input relationship primary',
                        phone_primary: 'Please input phone primary',
                        phone_2_primary: 'Please input phone 2 primary',
                        name_secondary: 'Please input name secondary',
                        relationship_secondary: 'Please input relationship secondary',
                        phone_secondaryr: 'Please input phone secondary',
                        phone_2_secondary: 'Please input phone 2 secondary',
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                @if ($errors->any())
                    $(document).ready(function() {
                        $('#errorModal').modal('show');
                    });
                @endif
            </script>
        @endsection
    @endsection
