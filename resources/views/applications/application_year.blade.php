@extends('layouts.master')

@section('content')
<div class="wrapper" style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="content-wrapper" style="width: 100%;">
        <section class="content">
            <section class="multi_step_form">
                <form method="POST" action="{{ route('applications.filter') }}">
                    @csrf

                    <!-- Centered Container with Border -->
                    <fieldset style="border: 2.5px solid #FE5067; padding: 30px 25px; border-radius: 12px; max-width: 500px; margin: auto; background-color: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                        <legend style="font-size: 1.6rem; font-weight: bold; color: #FE5067;">Filter Applications by Year</legend>

                        <!-- Welcome Section -->
                        <div class="text-center my-4">
                            <h3>Dear {{ auth()->user()->name }},</h3>
                            <p>Please select the application year to view the corresponding applications:</p>
                        </div>

                        <!-- Year Selection Dropdown -->
                        <div class="form-group">
                            <label for="application_year" style="font-weight: bold;">Select Year</label>
                            <select id="application_year" name="application_year" class="form-control" style="border-color: #FE5067;">
                                <option value="">-- Select Year --</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            @error('application_year')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn" style="background-color: #FE5067; color: white; border-color: #FE5067; padding: 10px 25px; font-weight: bold;">
                                Show Applications <span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </section>
        </section>
    </div>
</div>
@endsection
