<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormModel;
use App\Models\Country;
use App\Models\Programme;

class FormController extends Controller
{

    public  function viewForm(){
        $data ['header_title'] = 'Application Form';

        $data['countries'] = Country::getCountries(); // Fetch all countries
        $data['programmes'] = Programme::getProgrammes(); //

        return view('admission_form', $data);
    }

    //Store All Form Data
    public function store(Request $request)
{

    // Validate the request
    $request->validate([
        'title' => 'required|in:proffesor,doctor,mr,mrs,miss',
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'lastname' => 'required|string|max:255',
        'certificate_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'personal_email' => 'required|email|unique:application_form,personal_email',
        'mobile_no' => 'required|string|max:15',
        'country_id' => 'required|exists:countries,id',
        'city' => 'nullable|string|max:255',
        'street' => 'nullable|string|max:255',
        'workplace' => 'nullable|string|max:255',
        'programme_id' => 'required|exists:Programmes,id',
        'education' => 'required|in:diploma,degree,masters,phd,miss',
        'experience' => 'required|integer|between:1,3',
        'completion_year' => 'required|integer|min:1900|max:' . date('Y'),
        'declaration' => 'required|in:yes,no',
        'fee_paid' => 'required|in:yes,no',
        'degree_certificate' => 'required|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'passport_size' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'practice_license' => 'required|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'recommendation_letter' => 'required|file|mimes:pdf,jpg,png|max:2048',
        'payment_proof' => 'required|file|mimes:pdf,jpg,png|max:2048',
    ]);

    // Handle file uploads
    $degreeCertificatePath = $request->file('degree_certificate')->store('documents/degree_certificates', 'public');
    $passportSizePath = $request->file('passport_size') ? $request->file('passport_size')->store('documents/passport_sizes', 'public') : null;
    $practiceLicensePath = $request->file('practice_license')->store('documents/practice_licenses', 'public');
    $recommendationLetterPath = $request->file('recommendation_letter')->store('documents/recommendation_letters', 'public');
    $paymentProofPath = $request->file('payment_proof') ? $request->file('payment_proof')->store('documents/payment_proofs', 'public') : null;


    // Save the form data and file paths to the database
    FormModel::create([
        'title' => $request->title,
        'firstname' => $request->firstname,
        'middlename' => $request->middlename,
        'lastname' => $request->lastname,
        'certificate_name' => $request->certificate_name,
        'gender' => $request->gender,
        'personal_email' => $request->personal_email,
        'mobile_no' => $request->mobile_no,
        'country_id' => $request->country_id,
        'city' => $request->city,
        'street' => $request->street,
        'workplace' => $request->workplace,
        'programme_id' => $request->programme_id,
        'education' => $request->education,
        'experience' => $request->experience,
        'completion_year' => $request->completion_year,
        'declaration' => $request->declaration,
        'fee_paid' => $request->fee_paid,
        'degree_certificate' => $degreeCertificatePath,
        'passport_size' => $passportSizePath,
        'practice_license' => $practiceLicensePath,
        'recommendation_letter' => $recommendationLetterPath,
        'payment_proof' => $paymentProofPath,
    ]);

    // dd($request->all());

    return view('success');
}


    // Display all applications
    public function applications()
    {
        $data['header_title'] = 'Applications';
        $data['applications'] = FormModel::getApplications();


        return view('applications.list', $data);
    }
// View a specific application form
public function viewApplication($id)
{
    // Retrieve the application form by ID with the relationships (country and programme)
    $application = FormModel::with('country', 'programme')->find($id);

    if (!$application) {
        return redirect()->route('applications.list')->with('error', 'Application not found');
    }

    $countries = Country::all();
    $programmes =Programme::all();

    $data['header_title'] = 'View Application Form';
    $data['application'] = $application;
    $data['countries'] = $countries; 
    $data['programmes'] = $countries; 

    // Return the view with the data
    return view('applications.view_application', $data);
}


public function editApplication($id)
{
    $application = FormModel::find($id);

    if (!$application) {
        return back()->with('error', 'Application not found');
    }

    $countries = Country::all();
    $programmes = Programme::all();

    return view('applications.update_application', compact('application', 'countries', 'programmes'));
}


// Update All Form Data
public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'title' => 'required|in:proffesor,doctor,mr,mrs,miss',
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'lastname' => 'required|string|max:255',
        'certificate_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'personal_email' => 'required|email|unique:application_form,personal_email,' . $id,
        'mobile_no' => 'required|string|max:15',
        'country_id' => 'required|exists:countries,id',
        'status' => 'required|in:received,rejected,question,approved',
        'city' => 'nullable|string|max:255',
        'street' => 'nullable|string|max:255',
        'workplace' => 'nullable|string|max:255',
        'programme_id' => 'required|exists:Programmes,id',
        'education' => 'required|in:diploma,degree,masters,phd,miss',
        'experience' => 'required|integer|between:1,3',
        'completion_year' => 'required|integer|min:1900|max:' . date('Y'),
        'declaration' => 'required|in:yes,no',
        'fee_paid' => 'required|in:yes,no',
        'degree_certificate' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'passport_size' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'practice_license' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        'recommendation_letter' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'payment_proof' => 'required|file|mimes:pdf,jpg,png|max:2048',
    ]);

    // Find the existing application by ID
    $application = FormModel::findOrFail($id);

    // Handle file uploads only if new files are provided
    $degreeCertificatePath = $request->file('degree_certificate') 
        ? $request->file('degree_certificate')->store('documents/degree_certificates', 'public')
        : $application->degree_certificate;

    $passportSizePath = $request->file('passport_size') 
        ? $request->file('passport_size')->store('documents/passport_sizes', 'public') 
        : $application->passport_size;

    $practiceLicensePath = $request->file('practice_license') 
        ? $request->file('practice_license')->store('documents/practice_licenses', 'public') 
        : $application->practice_license;

    $recommendationLetterPath = $request->file('recommendation_letter') 
        ? $request->file('recommendation_letter')->store('documents/recommendation_letters', 'public') 
        : $application->recommendation_letter;

    $paymentProofPath = $request->file('payment_proof') 
        ? $request->file('payment_proof')->store('documents/payment_proofs', 'public') 
        : $application->payment_proof;

    // Update the application with the provided data
    $application->update([
        'title' => $request->title,
        'firstname' => $request->firstname,
        'middlename' => $request->middlename,
        'lastname' => $request->lastname,
        'certificate_name' => $request->certificate_name,
        'gender' => $request->gender,
        'personal_email' => $request->personal_email,
        'mobile_no' => $request->mobile_no,
        'country_id' => $request->country_id,
        'status'=> $request->status,
        'city' => $request->city,
        'street' => $request->street,
        'workplace' => $request->workplace,
        'programme_id' => $request->programme_id,
        'education' => $request->education,
        'experience' => $request->experience,
        'completion_year' => $request->completion_year,
        'declaration' => $request->declaration,
        'fee_paid' => $request->fee_paid,
        'degree_certificate' => $degreeCertificatePath,
        'passport_size' => $passportSizePath,
        'practice_license' => $practiceLicensePath,
        'recommendation_letter' => $recommendationLetterPath,
        'payment_proof' => $paymentProofPath,
    ]);


    return back()->with('success', 'Application updated successfully!');

}

// Soft-delete an application form by setting is_deleted = 1
public function delete($id)
{
    $application = FormModel::find($id);

    if (!$application) {
        return redirect()->route('applications.list')->with('error', 'Application not found');
    }

    // Update the is_deleted field
    $application->update(['is_deleted' => 1]);

    return back()->with('success', 'Application updated successfully!');
}

}