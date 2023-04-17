<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\QualificationController;

//dashbord routes

//admin routes
Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function () {

    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/user',[AdminController::class,'user'])->name('user');
    Route::delete('user/{id}', [AdminController::class, 'destroy'])->name('user.destroy');

   // About routes
    Route::get('about/trash', [AboutController::class, 'trash'])->name('about.trash');
    Route::get('about/{id}/restore', [AboutController::class, 'restore'])->name('about.restore');
    Route::delete('about/{id}/forcedelete', [AboutController::class, 'forcedelete'])->name('about.forcedelete');
    Route::resource('about',AboutController::class);

    //Award
    Route::get('award/trash', [AwardController::class, 'trash'])->name('award.trash');
    Route::get('award/{id}/restore', [AwardController::class, 'restore'])->name('award.restore');
    Route::delete('award/{id}/forcedelete', [AwardController::class, 'forcedelete'])->name('award.forcedelete');
    Route::resource('award',AwardController::class);

    //Partner
    Route::resource('partner',PartnerController::class);

    //Department
    Route::get('department/trash', [DepartmentController::class, 'trash'])->name('department.trash');
    Route::get('department/{id}/restore', [DepartmentController::class, 'restore'])->name('department.restore');
    Route::delete('department/{id}/forcedelete', [DepartmentController::class, 'forcedelete'])->name('department.forcedelete');
    Route::resource('department',DepartmentController::class);

    //Doctor feature
    Route::get('doctor/trash', [DoctorController::class, 'trash'])->name('doctor.trash');
    Route::get('doctor/{id}/restore', [DoctorController::class, 'restore'])->name('doctor.restore');
    Route::delete('doctor/{id}/forcedelete', [DoctorController::class, 'forcedelete'])->name('doctor.forcedelete');
    Route::resource('doctor',DoctorController::class);

     //feature  Feature
    Route::get('feature/trash', [FeatureController::class, 'trash'])->name('feature.trash');
    Route::get('feature/{id}/restore', [FeatureController::class, 'restore'])->name('feature.restore');
    Route::delete('feature/{id}/forcedelete', [FeatureController::class, 'forcedelete'])->name('feature.forcedelete');
    Route::resource('feature',FeatureController::class);

     //Qualification
    Route::get('qualification/trash', [QualificationController::class, 'trash'])->name('qualification.trash');
    Route::get('qualification/{id}/restore', [QualificationController::class, 'restore'])->name('qualification.restore');
    Route::delete('qualification/{id}/forcedelete', [QualificationController::class, 'forcedelete'])->name('qualification.forcedelete');
    Route::resource('qualification',QualificationController::class);

    //testimonial
    Route::get('testimonial/trash', [TestimonialController::class, 'trash'])->name('testimonial.trash');
    Route::get('testimonial/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonial.restore');
    Route::delete('testimonial/{id}/forcedelete', [TestimonialController::class, 'forcedelete'])->name('testimonial.forcedelete');
    Route::resource('testimonial',TestimonialController::class);

    //schedule
    Route::get('schedule/trash', [ScheduleController::class, 'trash'])->name('schedule.trash');
    Route::get('schedule/{id}/restore', [ScheduleController::class, 'restore'])->name('schedule.restore');
    Route::delete('schedule/{id}/forcedelete', [ScheduleController::class, 'forcedelete'])->name('schedule.forcedelete');
    Route::resource('schedule',ScheduleController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});

    //Site routes
    Route::get('/',[SiteController::class,'index'])->name('site.index');
    Route::get('/appoinment',[SiteController::class,'appoinment'])->name('site.appoinment');
    Route::post('/apoinment',[SiteController::class,'appoinment_data'])->name('site.appoinment_data');
    Route::post('/appoinment',[SiteController::class,'appoinment_data_form'])->name('site.appoinment_data_form');
    Route::get('/service',[SiteController::class,'service'])->name('site.service');
    Route::get('/about',[SiteController::class,'about'])->name('site.about');
    Route::get('/doctor-single/{id}',[SiteController::class,'doctor_single'])->name('site.doctor_single');
    Route::get('/doctor',[SiteController::class,'doctor'])->name('site.doctor');
    Route::get('/department',[SiteController::class,'department'])->name('site.department');
    Route::get('/department-single/{id}',[SiteController::class,'department_single'])->name('site.department_single');
    Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');
    Route::post('/contact',[SiteController::class,'contact_data'])->name('site.contact_data');
    Route::get('/confirmation',[SiteController::class,'confirmation'])->name('site.confirmation');




Route::view('not','not_allawd');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
