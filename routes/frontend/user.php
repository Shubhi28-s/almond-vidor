<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\SurveyController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */

Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
        });

    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');


    Route::resource('survey', SurveyController::class);
    Route::get('Campaign/{id}/info', [SurveyController::class, 'surveyCampaignInfo'])->name('survey.campaign.info');
    Route::get('add_more_question', [SurveyController::class, 'addMoreQuestionAction'])->name('survey.add_more_question');
    Route::get('deleting', [SurveyController::class, 'deleteSection'])->name('survey.deleteSection');
    Route::get('submissions', [SurveyController::class, 'surveySubmissionsAction'])->name('survey.submissions');
});
