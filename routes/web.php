<?php

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\User;
use App\Models\Admin\Services;
use App\Models\Admin\Project;
use App\Models\PageContent;
use App\Models\Admin\Faq;
use App\Models\Admin\contactInfo;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactInfoController;
use Illuminate\Http\Request;


Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('auth', AuthController::class)->only(['create','store']);
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::delete('logout', fn()=> to_route('admin.auth.destroy'))->name('logout');
    Route::delete('auth',[AuthController::class, 'destroy'])->name('auth.destroy');
});


Route::middleware('auth')->group(function () {

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::post('/user/{id}/toggle-active', [UserController::class, 'toggleActive']);


    Route::post('project/upload-image', [ProjectController::class, 'Image'])->name('project.Image');
    Route::resource('project', ProjectController::class);
    Route::post('/project/{id}/toggle-active', [ProjectController::class, 'toggleActive']);

    Route::resource('services', ServicesController::class);
    Route::post('/services/{id}/toggle-active', [ServicesController::class, 'toggleActive']);
    Route::post('services/upload-image', [ServicesController::class, 'uploadImage'])->name('services.uploadImage');
    Route::resource('contactUs', ContactUsController::class)->parameters([
    'contactUs' => 'contactUs'
]);
    Route::get('/contact-us/info', [ContactUsController::class, 'getContactInfo'])->name('contactUs.info');
    Route::post('/contact-info', [ContactInfoController::class, 'store'])->name('contactInfo.store');
    Route::get('/contact-info/info', [ContactInfoController::class, 'getContactInfo'])->name('contactInfo.info');

    Route::get('/home/edit', [PageContentController::class, 'editHomePage'])->name('home.edit');
    Route::put('/home/update', [PageContentController::class, 'updateHomePage'])->name('home.update');

    Route::get('/about/edit', [PageContentController::class, 'editAboutPage'])->name('about.edit');
    Route::put('/about/update', [PageContentController::class, 'updateAboutPage'])->name('about.update');

    Route::get('/heros', [PageContentController::class, 'editHero'])->name('hero.edit');
    Route::put('/heros', [PageContentController::class, 'updateHero'])->name('hero.update');

    Route::resource('faq', FaqController::class);

    Route::get('/', fn()=> to_route('user.index'));
});});

    // Arabic Routes

Route::prefix('ar')->group(function () {
    Route::get('/about', function() {
        $aboutS1 = PageContent::where('page', 'about')->where('section', 'AboutS1')->first();
        $aboutS2 = PageContent::where('page', 'about')->where('section', 'AboutS2')->first();
        $hero = PageContent::where('page', 'about')->where('section', 'hero')->first();

        return view('Frontend.Ar.about', [
        'aboutS1' => $aboutS1 ? json_decode($aboutS1->content, true) : [],
        'aboutS2' => $aboutS2 ? json_decode($aboutS2->content, true) : [],
        'hero' => $hero ? json_decode($hero->content, true) : [],
        'services' => Services::all()->where('active', '1'),
        'contactInfo' => contactInfo::first(),
        ]);
    })->name('Frontend.Ar.about');

    Route::get('/services', function () {
        $hero = PageContent::where('page', 'services')->where('section', 'hero')->first();

        return view('Frontend.Ar.services', [
        'services' => Services::all()->where('active', '1'),
        'contactInfo' => contactInfo::first(),
        'hero' => $hero ? json_decode($hero->content, true) : [],
    ]);
    })->name('Frontend.Ar.services');

    Route::get('/contact', function() {
        $hero = PageContent::where('page', 'contact')->where('section', 'hero')->first();

        return view('Frontend.Ar.contact', [
        'contactInfo' => contactInfo::first(),
        'hero' => $hero ? json_decode($hero->content, true) : [],

    ]);
    })->name('Frontend.Ar.contact');

    Route::post('/contactUsForm', [ContactUsController::class, 'store'])->name('Frontend.contact.store');

    Route::get('/projects', function () {

        $hero = PageContent::where('page', 'projects')->where('section', 'hero')->first();

        return view('Frontend.Ar.projects', [
        'projects' => Project::all()->where('active', '1'),
        'hero' => $hero ? json_decode($hero->content, true) : [],
        'contactInfo' => contactInfo::first(),
    ]);
    })->name('Frontend.Ar.projects');

    Route::get('/projects/{project}', function(Project $project) {

        $hero = PageContent::where('page', 'projects')->where('section', 'hero')->first();

        return  view('Frontend.project', [
        'project' => $project,
        'services' => $project->services,
        'hero' => $hero ? json_decode($hero->content, true) : [],
        'contactInfo' => contactInfo::first(),
        ]);
    })->name('Frontend.Ar.project');

    Route::get('/', function () {
        $services = Services::take(5)->get();
        $faqs = Faq::select('question_ar', 'answer_ar')->get();
        $contactInfo = contactInfo::first();
        $homeS1 = PageContent::where('page', 'home')->where('section', 'HomeS1')->first();
        $homeS2 = PageContent::where('page', 'home')->where('section', 'HomeS2')->first();
        $homeS3 = PageContent::where('page', 'home')->where('section', 'HomeS3')->first();
        $hero = PageContent::where('page', 'home')->where('section', 'hero')->first();
        $aboutS2 = PageContent::where('page', 'about')->where('section', 'AboutS2')->first();
        return view('Frontend.Ar.home', [
            'homeS1' => $homeS1 ? json_decode($homeS1->content, true) : [],
            'homeS2' => $homeS2 ? json_decode($homeS2->content, true) : [],
            'homeS3' => $homeS3 ? json_decode($homeS3->content, true) : [],
            'hero' => $hero ? json_decode($hero->content, true) : [],
            'aboutS2' => $aboutS2 ? json_decode($aboutS2->content, true) : [],
            'services' => $services,
            'faqs' => $faqs,
            'contactInfo' => $contactInfo
        ]);
    })->name('Frontend.Ar.home');
});

    // English Routes



Route::get('/services', function () {
    $hero = PageContent::where('page', 'services')->where('section', 'hero')->first();

    return view('Frontend.services', [
    'services' => Services::all()->where('active', '1'),
    'contactInfo' => contactInfo::first(),
    'hero' => $hero ? json_decode($hero->content, true) : [],
]);
})->name('Frontend.services');

Route::get('/contact', function() {
    $hero = PageContent::where('page', 'contact')->where('section', 'hero')->first();

    return view('Frontend.contact', [
    'contactInfo' => contactInfo::first(),
    'hero' => $hero ? json_decode($hero->content, true) : [],

]);
})->name('Frontend.contact');

Route::post('/contactUsForm', [ContactUsController::class, 'store'])->name('Frontend.contact.store');
Route::get('/projects', function () {

    $hero = PageContent::where('page', 'projects')->where('section', 'hero')->first();

    return view('Frontend.projects', [
    'projects' => Project::all()->where('active', '1'),
    'hero' => $hero ? json_decode($hero->content, true) : [],
    'contactInfo' => contactInfo::first(),
]);
})->name('Frontend.projects');

Route::get('/projects/{project}', function(Project $project) {

    $hero = PageContent::where('page', 'projects')->where('section', 'hero')->first();

    return  view('Frontend.project', [
    'project' => $project,
    'services' => $project->services,
    'hero' => $hero ? json_decode($hero->content, true) : [],
    'contactInfo' => contactInfo::first(),
    ]);
})->name('Frontend.project');

Route::get('/about', function() {
    $aboutS1 = PageContent::where('page', 'about')->where('section', 'AboutS1')->first();
    $aboutS2 = PageContent::where('page', 'about')->where('section', 'AboutS2')->first();
    $hero = PageContent::where('page', 'about')->where('section', 'hero')->first();


    return view('Frontend.about', [
    'aboutS1' => $aboutS1 ? json_decode($aboutS1->content, true) : [],
    'aboutS2' => $aboutS2 ? json_decode($aboutS2->content, true) : [],
    'hero' => $hero ? json_decode($hero->content, true) : [],
    'services' => Services::all()->where('active','1'),
    'contactInfo' => contactInfo::first(),
    ]);
})->name('Frontend.about');

Route::get('/', function () {
    $services = Services::take(5)->get();
    $faqs = Faq::select('question', 'answer')->get();
    $contactInfo = contactInfo::first();
    $homeS1 = PageContent::where('page', 'home')->where('section', 'HomeS1')->first();
    $homeS2 = PageContent::where('page', 'home')->where('section', 'HomeS2')->first();
    $homeS3 = PageContent::where('page', 'home')->where('section', 'HomeS3')->first();
    $hero = PageContent::where('page', 'home')->where('section', 'hero')->first();
    $aboutS2 = PageContent::where('page', 'about')->where('section', 'AboutS2')->first();
    return view('Frontend.home', [
        'homeS1' => $homeS1 ? json_decode($homeS1->content, true) : [],
        'homeS2' => $homeS2 ? json_decode($homeS2->content, true) : [],
        'homeS3' => $homeS3 ? json_decode($homeS3->content, true) : [],
        'hero' => $hero ? json_decode($hero->content, true) : [],
        'aboutS2' => $aboutS2 ? json_decode($aboutS2->content, true) : [],
        'services' => $services,
        'faqs' => $faqs,
        'contactInfo' => $contactInfo
    ]);
})->name('Frontend.home');

