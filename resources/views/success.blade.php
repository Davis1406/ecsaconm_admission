@extends('layouts.form')

@section('header')
    <!-- Include Bootstrap CSS -->
    @php $header_title = 'Success!'; @endphp
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="header-section">
        <div class="header-content">
            <div class="logo">
                <img src="{{ URL::to('assets/img/logo.png') }}" alt="ECSACONM Logo">
            </div>
            <h1>ECSACONM Fellowship Application</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container" id="success-form">
        <img src="{{ url('assets/img/success.png') }}" alt="Approved Icon">
        <div class="title">Success!</div>
        <div class="text">Thank you for your interest in the Ecsaconm Fellowship programme!</div>
        <div class="text">
            Your application has been submitted. The college Registrar will be asked to approve your application. You will shortly be contacted by the ECSACONM secretariat.
        </div>
        <div class="text">
            For any further questions, please contact
            <a href="mailto:info@ecsacon.org">info@ecsacon.org</a>
            or visit our website at
            <a href="https://www.ecsaconm.org/" target="_blank">https://www.ecsaconm.org/</a>.
        </div>
    </div>

    <style>
        .container#success-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 35%;
            margin: 20px auto;
            border: 1px solid #FE5067;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            background-color: #fff; /* Optional: Add background for clarity */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Optional for a cleaner look */
        }

        .container#success-form img {
            width: 100px; /* Adjust based on your icon size */
            margin-bottom: 20px;
        }

        .container#success-form .title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #222;
        }

        .container#success-form .text {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 10px;
            color: #333;
        }

        .container#success-form a {
            color: #0066cc;
            text-decoration: none;
        }

        .container#success-form a:hover {
            text-decoration: underline;
        }

        .container#success-form a {
        color: #FE5067;
        text-decoration: none;
    }

    .container#success-form a:hover {
        text-decoration: underline;
    }
    </style>
@endsection
