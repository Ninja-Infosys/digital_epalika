<?php

use App\Http\Controllers\Admin\UserManagement\{RoleController, UserController};
use App\Http\Controllers\Admin\Global\{BranchController,
    LetterHeadController,
    OfficeHeaderController,
    DepartmentController,
    DesignationController,
    EmergencyCategoryController,
    EmergencyNumberController,
    EmployeeController,
    EthnicityController,
    ExperienceController,
    ExperienceFileController,
    FeatureActivationController,
    FiscalYearController,
    MailSettingController,
    OccupationController,
    OfficeSettingController,
    OrganizationAuthController,
    OrganizationDashboardController,
    QualificationController,
    RelationshipController,
    RenewedController,
    SettingDashboardController,
    SmsSettingController,
    SuchikritaController,
    TaxClearanceController,
    Units\ExternalUnitConversionController,
    Units\InternalUnitConversionController,
    Units\MeasurementUnitController,
    Units\TypeController,
    Units\UnitController
};
use Illuminate\Support\Facades\Route;



Route::get('dashboard', SettingDashboardController::class)->name('dashboard');
Route::resource('relationship', RelationshipController::class);

//    sms
Route::get('featureActivation/{featureActivation}', [FeatureActivationController::class, 'updateFeatureActivation'])->name('update-feature-activation');

//    sms setting
Route::put('update-samaya-sms-config', [SmsSettingController::class, 'updateSamayaSmsConfig'])->name('update-samaya-sms-config');
Route::put('update-aakash-sms-config', [SmsSettingController::class, 'updateAakashSmsConfig'])->name('update-aakash-sms-config');

//    mail setting
Route::put('update-mail-setting', [MailSettingController::class, 'updateMailSetting'])->name('update-mail-setting');
Route::post('send-test-mail', [MailSettingController::class, 'sendTestMail'])->name('send-test-mail');

Route::prefix('generalSetting')->as('generalSetting.')->group(function () {
    Route::resource('occupation', OccupationController::class);
    Route::resource('ethnicity', EthnicityController::class);
    Route::resource('fiscalYear', FiscalYearController::class);
    Route::resource('emergencyNumber', EmergencyNumberController::class);
    Route::resource('emergencyCategory', EmergencyCategoryController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('employee.qualification', QualificationController::class);
    Route::resource('employee.experience', ExperienceController::class);
    Route::resource('employee.experienceFile', ExperienceFileController::class);
    Route::get('employee/{employee}/updateEmployeeStatus', [EmployeeController::class, 'updateEmployeeStatus'])->name('employee.updateEmployeeStatus');
    Route::resource('employee', EmployeeController::class);
    Route::get('subBranch', [BranchController::class, 'subBranch'])->name('subBranch');
    Route::resource('branch', BranchController::class);
});
Route::prefix('userManagement')->as('userManagement.')->group(function () {
    Route::get('role/{role}/letterHead', [RoleController::class, 'letterHeadPage'])->name('role.letterHead');
    Route::post('role/{role}/letterHead', [RoleController::class, 'letterHeadStore'])->name('role.letterHead');
    Route::resource('role', RoleController::class);
    Route::get('user/{user}/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::resource('user', UserController::class);
});

Route::prefix('units')->as('units.')->group(function () {
    Route::resource('type', TypeController::class);
    Route::resource('measurementUnit', MeasurementUnitController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('unit/{unit}/internalUnitConversion', InternalUnitConversionController::class)->names('unit.internal-unit-conversion');
    Route::resource('unit/{unit}/externalUnitConversion', ExternalUnitConversionController::class)->names('unit.external-unit-conversion');
});
Route::prefix('featureSetting')->as('featureSetting.')->group(function () {
    Route::get('sms', [SmsSettingController::class, 'smsSetting'])->name('sms-setting');
    Route::get('mail', [MailSettingController::class, 'mailSetting'])->name('mail-setting');
    Route::get('feature', [FeatureActivationController::class, 'showFeatureActivationPage'])->name('feature-activation');
});
Route::prefix('systemSetting')->as('systemSetting.')->group(function () {
    Route::resource('officeSetting', OfficeSettingController::class);
    Route::resource('letterHead', LetterHeadController::class)->only('index', 'store');
});
Route::resource('officeHeader', OfficeHeaderController::class)->only(['edit', 'update', 'destroy']);




Route::prefix('organization')->as('organization.')->group(function () {
    Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');
    Route::get('login', [OrganizationAuthController::class, 'showOrganizationLoginForm'])->name('login.form');
    Route::post('login', [OrganizationAuthController::class, 'organizationLogin'])->name('login');
    Route::get('register', [OrganizationAuthController::class, 'showOrganizationRegisterForm'])->name('register.form');
    Route::get('register-person', [OrganizationAuthController::class, 'showOrganizationRegisterFormPerson'])->name('register.formPerson');
    Route::post('logout', [OrganizationAuthController::class, 'logout'])->name('logout');
    Route::get('{organization}/invitation', [OrganizationAuthController::class, 'invitation'])->name('invitation');
    Route::get('password/create', [OrganizationAuthController::class, 'create'])->name('password.create')->middleware(['password.check']);
    Route::post('password/store', [OrganizationAuthController::class, 'store'])->name('password.store')->middleware(['password.check']);
    Route::prefix('profile')->group(function () {
        Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
    });
    Route::resource('taxClearance', TaxClearanceController::class);
    Route::resource('renewed', RenewedController::class);
});






Route::get('mapApply/{mapApply}/attachment/suchikritaDocument', [SuchikritaController::class, 'index'])->name('suchikritaDocument');
Route::post('mapApply/{mapApply}/attachment/storeSuchikritaDocument', [SuchikritaController::class, 'storeSuchikritaDocument'])->name('storeSuchikritaDocument');
