<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
});

Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login')->name('masuk');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');

Route::get('google', 'GoogleController@redirectToGoogle');
Route::get('google/callback', 'GoogleController@handleGoogleCallback');

Route::get('facebook', 'FacebookController@redirectToFacebook');
Route::get('facebook/callback', 'FacebookController@handleFacebookCallback');
Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');

    /*----------- PROJECT -----------*/
    Route::get('project/your', 'ProjectController@yourProject');
    Route::get('project/invitation', 'ProjectController@invitationProject');
    Route::post('/create_project', 'ProjectController@addProject');
    Route::delete('/project-destroy/{id}', 'ProjectController@deleteProject');
    Route::match(['get','post'], '/project/update/{id}', 'ProjectController@updateProject');
    Route::match(['get','post'], '/invite/member/{id}', 'ProjectController@addMember');

    /*----------- DETAIL PROJECT -----------*/
    Route::get('/detail-project/{id}', 'DetailProjectController@index');
    Route::post('/detail-project/swot/{id}', 'DetailProjectController@editSwotName');
    Route::get('/swot/destroy/{id}', 'DetailProjectController@deleteSwotName');
    Route::post('/detail-project/lean/{id}', 'DetailProjectController@editLeanName');
    Route::get('/lean/destroy/{id}', 'DetailProjectController@deleteLeanName');
    Route::post('/detail-project/pstatement/{id}', 'DetailProjectController@editPstatementName');
    Route::get('/pstatement/destroy/{id}', 'DetailProjectController@deletePstatementName');
    Route::post('/detail-project/persona/{id}', 'DetailProjectController@editPersonaName');
    Route::get('/persona/destroy/{id}', 'DetailProjectController@deletePersonaName');
    Route::post('/detail-project/comparison/{id}', 'DetailProjectController@editComparisonName');
    Route::get('/comparison/destroy/{id}', 'DetailProjectController@deleteComparisonName');
    Route::post('/detail-project/story/{id}', 'DetailProjectController@editStoryName');
    Route::get('/story/destroy/{id}', 'DetailProjectController@deleteStoryName');

    /*----------- SWOT -----------*/
    Route::get('/detail-project/swot/index/{id}', 'SwotController@index')->name('swot');
    Route::post('/detail-project/swot/create/{id}', 'SwotController@store');
    Route::post('/swot/destroy-strength/{id}/{id_swot}', 'SwotController@destroyStrength');
    Route::post('/swot/edit-strength/{id}/{id_swot}', 'SwotController@editStrength');
    Route::post('/swot/destroy-weakness/{id}/{id_swot}', 'SwotController@destroyWeakness');
    Route::post('/swot/edit-weakness/{id}/{id_swot}', 'SwotController@editWeakness');
    Route::post('/swot/destroy-opportunity/{id}/{id_swot}', 'SwotController@destroyOpportunity');
    Route::post('/swot/edit-opportunity/{id}/{id_swot}', 'SwotController@editOpportunity');
    Route::post('/swot/destroy-threat/{id}/{id_swot}', 'SwotController@destroyThreat');
    Route::post('/swot/edit-threat/{id}/{id_swot}', 'SwotController@editThreat');
    Route::match(['get','post'], '/detail-project/swot/add-strength/{id}', 'SwotController@addStrength');
    Route::match(['get','post'], '/detail-project/swot/add-weakness/{id}', 'SwotController@addWeakness');
    Route::match(['get','post'], '/detail-project/swot/add-opportunity/{id}', 'SwotController@addOpportunity');
    Route::match(['get','post'], '/detail-project/swot/add-threat/{id}', 'SwotController@addThreat');

    /*----------- USER STORY -----------*/
    Route::get('/detail-project/userStory/index/{id_project}/{id_story}', 'StoryController@index')->name('story');
    Route::post('/detail-project/userStory/create/{id}', 'StoryController@store');
    Route::post('/detail-project/userStory/add/{id}', 'StoryController@addData');
    Route::post('/detail-project/userStory/update/{id}', 'StoryController@update');
    Route::get('/userStory/destroy/{id}', 'StoryController@delete');

    /*----------- PROJECT STATEMENT -----------*/
    Route::get('/detail-project/project-statement/index/{id}', 'ProjectStatementController@index')->name('project_statement');
    Route::post('/detail-project/project-statement/create/{id}', 'ProjectStatementController@store');
    Route::post('/detail-project/project-statement/update/{id}', 'ProjectStatementController@addData');
    Route::get('/detail-project/project-statement-update/index/{id}', 'ProjectStatementController@toUpdatePage')->name('pstatement_update_view');
    Route::post('/project-statement/edit/{id_project_statement}', 'ProjectStatementController@editData');
    Route::post('/project-statement/edit-scope/{id_array}/{id_project_statement}', 'ProjectStatementController@editScope');
    Route::post('/project-statement/edit-deliverable/{id_array}/{id_project_statement}', 'ProjectStatementController@editDeliverable');
    Route::post('/project-statement/edit-criteria/{id_array}/{id_project_statement}', 'ProjectStatementController@editCriteria');
    Route::post('/project-statement/edit-constraint/{id_array}/{id_project_statement}', 'ProjectStatementController@editConstraint');
    Route::post('/project-statement/edit-asumption/{id_array}/{id_project_statement}', 'ProjectStatementController@editAssumption');

    /*----------- LEAN CANVAS -----------*/
    Route::get('/detail-project/lean-canvas/index/{id}', 'LeanCanvasController@index')->name('lean_canvas');
    Route::post('/detail-project/lean-canvas/create/{id}', 'LeanCanvasController@store');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-problem/{id}', 'LeanCanvasController@addProblem');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-existing/{id}', 'LeanCanvasController@addExistingAlternative');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-solution/{id}', 'LeanCanvasController@addSolution');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-key-metric/{id}', 'LeanCanvasController@addKeyMetric');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-value-preposition/{id}', 'LeanCanvasController@addUniqueValuePreposition');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-high-level-concept/{id}', 'LeanCanvasController@addHighLevelConcept');
    Route::match(['get','post'], '/detail-project/lean-canvas/unfair-advantage/{id}', 'LeanCanvasController@addUnfairAdvantage');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-channel/{id}', 'LeanCanvasController@addChannel');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-customer/{id}', 'LeanCanvasController@addCustomerSegment');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-early-adopter/{id}', 'LeanCanvasController@addEarlyAdopter');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-cost/{id}', 'LeanCanvasController@addCostStructure');
    Route::match(['get','post'], '/detail-project/lean-canvas/add-revenue/{id}', 'LeanCanvasController@addRevenueStream');

    // ------------------------------------------------------------------------------------------------------- //
    Route::post('/lean/edit-problem/{id}/{id_lean}', 'EditLeanController@editProblem');
    Route::post('/lean/edit-solution/{id}/{id_lean}', 'EditLeanController@editSolution');
    Route::post('/lean/edit-uvp/{id}/{id_lean}', 'EditLeanController@editUvp');
    Route::post('/lean/edit-unfair-advantage/{id}/{id_lean}', 'EditLeanController@editUnfairAdvantage');
    Route::post('/lean/edit-customer-segment/{id}/{id_lean}', 'EditLeanController@editCustomerSegment');
    Route::post('/lean/edit-existing/{id}/{id_lean}', 'EditLeanController@editExisting');
    Route::post('/lean/edit-key-metric/{id}/{id_lean}', 'EditLeanController@editKeyMetric');
    Route::post('/lean/edit-hlc/{id}/{id_lean}', 'EditLeanController@editHlc');
    Route::post('/lean/edit-channel/{id}/{id_lean}', 'EditLeanController@editChannel');
    Route::post('/lean/edit-early-adopter/{id}/{id_lean}', 'EditLeanController@editEarlyAdopter');
    Route::post('/lean/edit-cost/{id}/{id_lean}', 'EditLeanController@editCostStructure');
    Route::post('/lean/edit-revenue/{id}/{id_lean}', 'EditLeanController@editRevenueStream');

    // ------------------------------------------------------------------------------------------------------- //
    Route::post('/lean/destroy-problem/{id}/{id_lean}', 'DeleteLeanController@destroyProblem');
    Route::post('/lean/destroy-existing/{id}/{id_lean}', 'DeleteLeanController@destroyExisting');
    Route::post('/lean/destroy-solution/{id}/{id_lean}', 'DeleteLeanController@destroySolution');
    Route::post('/lean/destroy-key-metric/{id}/{id_lean}', 'DeleteLeanController@destroyKeyMetric');
    Route::post('/lean/destroy-uvp/{id}/{id_lean}', 'DeleteLeanController@destroyUvp');
    Route::post('/lean/destroy-hlc/{id}/{id_lean}', 'DeleteLeanController@destroyHlc');
    Route::post('/lean/destroy-unfair-advantage/{id}/{id_lean}', 'DeleteLeanController@destroyUnfairAdvantage');
    Route::post('/lean/destroy-channel/{id}/{id_lean}', 'DeleteLeanController@destroyChannel');
    Route::post('/lean/destroy-customer/{id}/{id_lean}', 'DeleteLeanController@destroyCustomerSegment');
    Route::post('/lean/destroy-early-adopter/{id}/{id_lean}', 'DeleteLeanController@destroyEarlyAdopter');
    Route::post('/lean/destroy-cost/{id}/{id_lean}', 'DeleteLeanController@destroyCostStructure');
    Route::post('/lean/destroy-revenue/{id}/{id_lean}', 'DeleteLeanController@destroyRevenueStream');

    /*----------- COMPARISON MATRIX -----------*/
    Route::get('/detail-project/comparison-matrix/index/{id}', 'ComparisonMatrixController@index')->name('comparison_matrix');
    Route::post('/detail-project/comparison-matrix/create/{id}', 'ComparisonMatrixController@store');
    Route::match(['get','post'], '/detail-project/comparison-matrix/add-competitor/{id}', 'ComparisonMatrixController@addCompetitor');
    Route::post('/tambahcomparison/{id}','ComparisonMatrixController@addMorePost');
    Route::post('/updatecomparison/{id}','ComparisonMatrixController@editMorePost')->name('update_comparison');
    Route::get('/detail-project/comparison-matrix/result/{id}', 'ComparisonMatrixController@comparisonResult')->name('comparison_matrix_result');
    Route::delete('/comparison-destroy/{id}', 'ComparisonMatrixController@delete');
    Route::get('/comparison-pdf/{id}', 'ComparisonMatrixController@exportPdf');
    Route::get('/detail-project/user-persona/index/{id}', 'UserPersonaController@index')->name('user_persona');
    Route::post('/detail-project/user-persona/create/{id}', 'UserPersonaController@store');
    Route::post('/detail-project/user-persona/update/{id}', 'UserPersonaController@addData');
    Route::get('/detail-project/user-persona-update/index/{id}', 'UserPersonaController@toUpdatePage')->name('persona_update_view');
    Route::post('/persona/add-goal/{id}', 'UserPersonaController@addGoal');
    Route::post('/persona/edit-goal/{id}/{id_persona}', 'UserPersonaController@editGoal');
    Route::post('/persona/destroy-goal/{id}/{id_persona}', 'UserPersonaController@destroyGoal');
    Route::post('/persona/add-frustation/{id}', 'UserPersonaController@addFrustation');
    Route::post('/persona/edit-frustation/{id}/{id_persona}', 'UserPersonaController@editFrustation');
    Route::post('/persona/destroy-frustation/{id}/{id_persona}', 'UserPersonaController@destroyFrustation');
    Route::post('/persona/edit-avatar/{id}', 'UserPersonaController@editAvatar');
    Route::post('/persona/edit-motivation/{id}', 'UserPersonaController@editMotivation');
    Route::post('/persona/edit-personality/{id}', 'UserPersonaController@editPersonality');
    Route::post('/persona/edit-name/{id}', 'UserPersonaController@editName');
    Route::post('/persona/edit-demography/{id}', 'UserPersonaController@editDemography');
    Route::post('/persona/edit-quote/{id}', 'UserPersonaController@editQuote');
    Route::post('/persona/edit-bio/{id}', 'UserPersonaController@editBio');
    Route::post('/persona/edit-media/{id}', 'UserPersonaController@editMedia');
    Route::post('/change-profile/{id}', 'UserController@editProfilePicture');
    Route::get('/lean-canvas/cetak-pdf/{id}','LeanCanvasController@print')->name('cetak-lean-canvas');
});

Route::get('/documentation', function () {
     return view('dokumentasi');
});
Route::get('/faq', function () {
     return view('faq');
});
