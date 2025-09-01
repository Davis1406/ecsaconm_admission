<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ----------- Public Routes -------------- //
Route::get('/', function () {
    return view('auth.login');
});

Route::get('application_form', [FormController::class, 'viewForm'])->name('viewForm');
Route::post('/store', [FormController::class, 'store'])->name('store');
Route::get('applications/year', [FormController::class, 'applicationYear'])->name('applications.year');
Route::post('applications/filter', [FormController::class, 'filterByYear'])->name('applications.filter');
Route::get('/success', function () {
    return view('success');
});


// --------- Authenticated Routes ---------- //
Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('home');
    });
});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // -----------------------------login--------------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
    });

    // ------------------------------ Register ---------------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register','storeUser')->name('register');    
    });

    // ----------------------------- Forget Password --------------------------//
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forget-password', 'getEmail')->name('forget-password');
        Route::post('forget-password', 'postEmail')->name('forget-password');    
    });

    // ---------------------------- Reset Password ----------------------------//
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'getPassword');
        Route::post('reset-password', 'updatePassword');    
    });
});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // ------------------------- Main Dashboard ----------------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/home', 'index')->name('home');
            Route::get('em/dashboard', 'emDashboard')->name('em/dashboard');
        });
    });

    Route::controller(FormController::class)->group(function () {
        Route::get('applications/list', 'applications')->name('applications');
        Route::get('applications/view_application/{id}', 'viewApplication')->name('applications.view_applications');
        Route::post('application/{id}/update', 'update')->name('application.update');
        Route::post('application/delete/{id}', 'delete')->name('application.delete');
        Route::get('applications/update_application/{id}', 'FormController@editApplication')->name('application.edit');
    });
    
    // --------------------------- Lock Screen ----------------------------//
    Route::controller(LockScreen::class)->group(function () {
        Route::get('lock_screen','lockScreen')->middleware('auth')->name('lock_screen');
        Route::post('unlock', 'unlock')->name('unlock');    
    });

    // --------------------------- Settings -------------------------------//
    Route::controller(SettingController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('company/settings/page', 'companySettings')->name('company/settings/page'); /** index page */
            Route::post('company/settings/save', 'saveRecord')->name('company/settings/save'); /** save record or update */
            Route::get('roles/permissions/page', 'rolesPermissions')->name('roles/permissions/page');
            Route::post('roles/permissions/save', 'addRecord')->name('roles/permissions/save');
            Route::post('roles/permissions/update', 'editRolesPermissions')->name('roles/permissions/update');
            Route::post('roles/permissions/delete', 'deleteRolesPermissions')->name('roles/permissions/delete');
            Route::get('localization/page', 'localizationIndex')->name('localization/page'); /** index page localization */
            Route::get('salary/settings/page', 'salarySettingsIndex')->name('salary/settings/page'); /** index page salary settings */
            Route::get('email/settings/page', 'emailSettingsIndex')->name('email/settings/page'); /** index page email settings */
        });
    });

    // --------------------------- Manage Users ---------------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('profile_user', 'profile')->name('profile_user');
            Route::post('profile/information/save', 'profileInformation')->name('profile/information/save');
            Route::get('userManagement', 'index')->name('userManagement');
            Route::post('user/add/save', 'addNewUserSave')->name('user/add/save');
            Route::post('update', 'update')->name('update');
            Route::post('user/delete', 'delete')->name('user/delete');
            Route::get('change/password', 'changePasswordView')->name('change/password');
            Route::post('change/password/db', 'changePasswordDB')->name('change/password/db');
            Route::post('user/profile/emergency/contact/save', 'emergencyContactSaveOrUpdate')->name('user/profile/emergency/contact/save'); /** save or update emergency contact */
            Route::get('get-users-data', 'getUsersData')->name('get-users-data'); /** get all data users */
        });
    });


    // ------------------------- Form Employee ---------------------------//
    Route::controller(EmployeeController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            // ---------------- Employee Management Routes ---------------------
            Route::prefix('all/employee')->group(function () {
                Route::get('/card', 'cardAllEmployee')->name('all/employee/card');
                Route::get('/list', 'listAllEmployee')->name('all/employee/list');
                Route::post('/save', 'saveRecord')->name('all/employee/save');
                Route::get('/view/edit/{employee_id}', 'viewRecord');
                Route::post('/update', 'updateRecord')->name('all/employee/update');
                Route::get('/delete/{employee_id}', 'deleteRecord');
                Route::post('/search', 'employeeSearch')->name('all/employee/search');
                Route::post('/list/search', 'employeeListSearch')->name('all/employee/list/search');
            });
            Route::prefix('form')->group(function () {
                // ----------------------- Departments -------------------------
                Route::prefix('departments')->controller(EmployeeController::class)->group(function () {
                    Route::get('/page', 'index')->name('form/departments/page');    
                    Route::post('/save', 'saveRecordDepartment')->name('form/departments/save');    
                    Route::post('/update', 'updateRecordDepartment')->name('form/department/update');    
                    Route::post('/delete', 'deleteRecordDepartment')->name('form/department/delete');  
                });
                // ----------------------- Designations ------------------------
                Route::prefix('designations')->group(function () {
                    Route::get('/page', 'designationsIndex')->name('form/designations/page');    
                    Route::post('/save', 'saveRecordDesignations')->name('form/designations/save');    
                    Route::post('/update', 'updateRecordDesignations')->name('form/designations/update');    
                    Route::post('/delete', 'deleteRecordDesignations')->name('form/designations/delete');
                });

            });
            // ------------------------- Profile Employee --------------------------//
            Route::get('employee/profile/{user_id}', 'profileEmployee');
        });
    });

    // ---------------------- Personal Information ----------------------//
    Route::controller(PersonalInformationController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::post('user/information/save', 'saveRecord')->name('user/information/save');
        });
    });


});
