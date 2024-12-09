@extends('layouts.form')

@section('header')
    <div class="header-section">
        <div class="header-content">
            <div class="logo">
                <img src="{{ URL::to('assets/img/logo.png') }}" alt="ECSACONM Logo">
            </div>
            <h1>ECSACONM Fellowship Application Form</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="main">
        <div class="container">

            <form method="POST" id="signup-form" class="signup-form" action="{{ url('store') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger" style="color: red">
                            <h2> <i>The form Has the following errors!</i></h2>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Step 1: Personal Information -->
                    <h3>Personal info</h3>
                    <fieldset>
                        <h2>Personal information</h2>
                        <p class="desc">Please enter your information and proceed to the next step of your application</p>
                        <div class="fieldset-content">
                            <!-- Title, Name Group -->
                            <div class="form-row">
                                <label class="form-label">Name</label>
                                <div class="form-flex">
                                    <div class="form-group">
                                        <select class="form-control" name="title" id="title">
                                            <option value="">Select title...</option>
                                            <option value="proffesor" {{ old('title') == 'proffesor' ? 'selected' : '' }}>
                                                Prof.</option>
                                            <option value="doctor" {{ old('title') == 'doctor' ? 'selected' : '' }}>Dr.
                                            </option>
                                            <option value="mr" {{ old('title') == 'mr' ? 'selected' : '' }}>Mr.</option>
                                            <option value="mrs" {{ old('title') == 'mrs' ? 'selected' : '' }}>Mrs.
                                            </option>
                                            <option value="miss" {{ old('title') == 'miss' ? 'selected' : '' }}>Miss.
                                            </option>
                                        </select>
                                        <span class="text-input">Title</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="firstname" id="first_name"
                                            value="{{ old('firstname') }}" />
                                        <span class="text-input">First Name</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="middlename" id="middle_name"
                                            value="{{ old('middlename') }}" />
                                        <span class="text-input">Middle Name</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" id="last_name"
                                            value="{{ old('lastname') }}" />
                                        <span class="text-input">Last Name</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Certificate Name and Gender Group -->
                            <div class="form-row">
                                <div class="form-flex">
                                    <div class="form-group">
                                        <label for="certificate_name" class="form-label">Name to appear on the
                                            certificate</label>
                                        <input type="text" name="certificate_name" id="certificate_name"
                                            value="{{ old('certificate_name') }}" />
                                    </div>
                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Gender:</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender...</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Email and Phone -->
                            <div class="form-row">
                                <label class="form-label">Contact Information</label>
                                <div class="form-flex">
                                    <!-- Email Field -->
                                    <div class="form-group">
                                        <input type="email" name="personal_email" id="email"
                                            value="{{ old('personal_email') }}" />
                                        <span class="text-input">Email (e.g., example@gmail.com)</span>
                                    </div>
                                    <!-- Mobile Number Field -->
                                    <div class="form-group">
                                        <input type="text" name="mobile_no" id="phone"
                                            value="{{ old('mobile_no') }}" />
                                        <span class="text-input">Mobile Number (WhatsApp)</span>
                                    </div>
                                </div>
                            </div>


                            <!-- Current Address -->
                            <div class="form-row">
                                <label class="form-label">Current Address</label>
                                <div class="form-flex">

                                    <div class="form-group">
                                        <select class="form-control" name="country_id" id="country">
                                            <option value="">Choose Country...</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-input">Country <span style="color: red">*</span></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="city" id="city" value="{{ old('city') }}" />
                                        <span class="text-input">City  <span style="color: red">*</span></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="street" id="street"
                                            value="{{ old('street') }}" />
                                        <span class="text-input">Physical Address <span style="color: red">*</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="institution" class="form-label">Working Institution</label>
                                <input type="text" name="workplace" id="institution"
                                    value="{{ old('workplace') }}" />
                            </div>
                        </div>
                    </fieldset>

                    <!-- Step 2: Application Details -->
                    <h3>Application Details</h3>
                    <fieldset>
                        <h2>Application Details</h2>
                        <p id="desc">Provide details about your application.</p>
                        <div class="fieldset-content">
                            <fieldset id="qualification">
                                <div class="form-group">
                                    <label for="current_qualification" class="form-label">1. ECSACONM Practice Fellowship
                                        Programme Applying For <span class="text-danger">*</span>
                                    </label>
                                    <div class="radio-options">
                                        @foreach ($programmes as $programme)
                                            <label class="radio-label">
                                                <input type="radio" name="programme_id" value="{{ $programme->id }}"
                                                    {{ old('programme_id') == $programme->id ? 'checked' : '' }} />
                                                <span>{{ $programme->programme_name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset id="qualification">
                                <div class="form-row">
                                    <div class="form-flex">
                                        <!-- Education Qualification -->
                                        <div class="form-group">
                                            <label for="education" class="form-label">2. Highest Education
                                                Qualification</label>
                                            <div class="radio-options">
                                                <label class="radio-label">
                                                    <input type="radio" name="education" value="diploma"
                                                        {{ old('education') == 'diploma' ? 'checked' : '' }} />
                                                    <span>Diploma</span>
                                                </label>
                                                <label class="radio-label">
                                                    <input type="radio" name="education" value="degree"
                                                        {{ old('education') == 'degree' ? 'checked' : '' }} />
                                                    <span>Bachelor Degree / Advanced Diploma</span>
                                                </label>
                                                <label class="radio-label">
                                                    <input type="radio" name="education" value="masters"
                                                        id="masters-radio"
                                                        {{ old('education') == 'masters' ? 'checked' : '' }} />
                                                    <span>Masters Degree</span>
                                                </label>
                                                <label class="radio-label">
                                                    <input type="radio" name="education" value="phd"
                                                        id="others-radio"
                                                        {{ old('education') == 'phd' ? 'checked' : '' }} />
                                                    <span>PhD</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Year of Completion -->
                                        <div class="form-group" style="align-content: center; margin-top:30px;">
                                            <label class="form-label">Year of Completion:</label>
                                            <input type="number" name="completion_year" id="last_name"
                                                value="{{ old('completion_year') }}" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset id="qualification">
                                <div class="form-group">
                                    <label for="experience" class="form-label">3. Working Experience in Related
                                        Field</label>
                                    <div class="radio-options">
                                        <label class="radio-label">
                                            <input type="radio" name="experience" value="1"
                                                {{ old('experience') == 1 ? 'checked' : '' }} />
                                            <span>1 Year</span>
                                        </label>
                                        <label class="radio-label">
                                            <input type="radio" name="experience" value="2"
                                                {{ old('experience') == 2 ? 'checked' : '' }} />
                                            <span>2 Years</span>
                                        </label>
                                        <label class="radio-label">
                                            <input type="radio" name="experience" value="3"
                                                {{ old('experience') == 3 ? 'checked' : '' }} />
                                            <span>3 Years and Above</span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </fieldset>

                    <!-- Step 3: Attach Documents -->
                    <h3>Attach Documents</h3>
                    <fieldset id="attachments">
                        <h2>Attach Documents</h2>
                        <p id="desc">Please attach documents requested below .</p
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-flex">
                                    <div class="form-group">
                                        <label for="degree_certificate" class="form-label">
                                            4. Attach Degree Academic Certificate <span class="text-danger">*</span>
                                        </label>
                                        <div class="custom-file-upload">
                                            <label for="degree_certificate" class="upload-btn">
                                                <i class="fa fa-upload"></i> Upload Files
                                            </label>
                                            <input type="file" name="degree_certificate" id="degree_certificate"
                                                class="file-input" accept=".pdf,.jpg,.png,.doc,.docx" />
                                            <span class="file-drop-text">Or drop files</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="passport_size" class="form-label">
                                            5. Attach Passport Size
                                        </label>
                                        <div class="custom-file-upload">
                                            <label for="passport_size" class="upload-btn">
                                                <i class="fa fa-upload"></i> Upload photo
                                            </label>
                                            <input type="file" name="passport_size" id="passport_size"
                                                class="file-input" accept=".pdf,.jpg,.png,.doc,.docx" />
                                            <span class="file-drop-text">Or drop files</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="practice_license" class="form-label">
                                    6. Attach Practice License <span style="color: red">*</span>
                                </label>
                                <div class="custom-file-upload">
                                    <label for="practice_license" class="upload-btn">
                                        <i class="fa fa-upload"></i> Upload Files
                                    </label>
                                    <input type="file" name="practice_license" id="practice_license"
                                        class="file-input" accept=".pdf,.jpg,.png,.doc,.docx" />
                                    <span class="file-drop-text">Or drop files</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="recommendation_letter" class="form-label">
                                    7. Recommendation Letter from Head of Working Department <span
                                        class="text-danger">*</span>
                                </label>
                                <div class="custom-file-upload">
                                    <label for="recommendation_letter" class="upload-btn">
                                        <i class="fa fa-upload"></i> Upload Files
                                    </label>
                                    <input type="file" name="recommendation_letter" id="recommendation_letter"
                                        class="file-input" accept=".pdf,.jpg,.png" />
                                    <span class="file-drop-text">Or drop files</span>
                                </div>
                            </div>

                            <!-- Checkboxes Section -->
                            <div class="form-group">
                                <label for="declarations" class="form-label">Declarations</label>
                                <div class="checkbox-group">
                                    <div class="checkbox-item">
                                        <input type="hidden" name="declaration" value="no">
                                        <!-- Hidden input for default "no" value -->
                                        <input type="checkbox" id="checkbox1" name="declaration" value="yes"
                                            {{ old('declaration') === 'yes' ? 'checked' : '' }}>
                                        <label for="checkbox1">
                                            I hereby consent to the processing of my application for the fellowship
                                            programme, confirm that all attached
                                            documents are valid, and authorize their use for evaluation and decision-making
                                            purposes.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row" style="justify-content: center; align-items:center;">
                                <div class="form-flex">
                                    <div class="form-group">
                                        <label for="fee-payment" class="form-label">Registration Fee</label>
                                        <p id="desc">Have you paid the registration fee?</p>
                                        <!-- Radio Options -->
                                        <div class="radio-options">
                                            <label class="radio-label">
                                                <input type="radio" id="radio-yes" name="fee_paid" value="yes" />
                                                <span>Yes</span>
                                            </label>
                                            <label class="radio-label">
                                                <input type="radio" id="radio-no" name="fee_paid" value="no" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <!-- Conditional Instructions -->
                                        <div id="payment-instructions" style="display: none;">
                                            <span>
                                                To make payment, please visit the link
                                                <a href="https://ecsaconm.org/online-payment/" class="payment-link"
                                                    target="_blank" rel="noopener noreferrer">Payments Page</a>.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-file-upload" id="payment-btn">
                                            <label for="payment_proof" class="upload-btn">
                                                <i class="fa fa-upload"></i> Upload Proof
                                            </label>
                                            <input type="file" name="payment_proof" id="payment_proof"
                                                class="file-input" accept=".pdf,.jpg,.png" />
                                            <span class="file-drop-text">Or drop files</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('.custom-file-upload');

            fileInputs.forEach(wrapper => {
                const fileInput = wrapper.querySelector('.file-input');
                const fileDropText = wrapper.querySelector('.file-drop-text');

                // Handle file selection via input click
                fileInput.addEventListener('change', function() {
                    const fileName = this.files[0]?.name || 'No file selected';
                    if (fileDropText) {
                        fileDropText.textContent = fileName;
                    }
                });

                // Add drag-and-drop functionality
                wrapper.addEventListener('dragover', function(event) {
                    event.preventDefault();
                    wrapper.classList.add('drag-over');
                });

                wrapper.addEventListener('dragleave', function() {
                    wrapper.classList.remove('drag-over');
                });

                wrapper.addEventListener('drop', function(event) {
                    event.preventDefault();
                    wrapper.classList.remove('drag-over');

                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        const file = files[0];
                        fileInput.files = event.dataTransfer.files;
                        fileDropText.textContent = file.name;
                    }
                });
            });

            // Handle payment options
            const radioYes = document.getElementById("radio-yes");
            const radioNo = document.getElementById("radio-no");
            const paymentInstructions = document.getElementById("payment-instructions");
            const uploadProofSection = document.getElementById("payment-btn");

            if (radioYes && radioNo && paymentInstructions && uploadProofSection) {
                // Reset display on page load
                paymentInstructions.style.display = "none";
                uploadProofSection.style.display = "none";

                // Add event listeners to radio buttons
                radioYes.addEventListener("change", function() {
                    if (radioYes.checked) {
                        paymentInstructions.style.display = "none";
                        uploadProofSection.style.display = "flex";
                    }
                });

                radioNo.addEventListener("change", function() {
                    if (radioNo.checked) {
                        paymentInstructions.style.display = "block";
                        uploadProofSection.style.display = "none";
                    }
                });
            }
        });
    </script>
@endsection
