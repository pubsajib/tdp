<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\WebsiteSettingController;
use App\Http\Controllers\Backend\PostImageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostviewController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Models\Imgpost;
use App\Models\Img;

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
/*
Route::get('/', function () {
    return view('welcome');
});

*/


//Front End Routes
Route::get('/',[HomeController::class,'Index'])->name('home');
//Route::get('/',[HomeController::class,'ImgPost'])->name('home');
Route::get('/category',[HomeController::class,'NewsCategory'])->name('news.category');
Route::get('/details',[HomeController::class,'NewsDetails'])->name('news.details');

//Fronten Post View Route
Route::get('view/post/{id}',[PostviewController::class,'SingleNews']);
Route::get('view/photo/gallery',[PostviewController::class,'PhotoGallery'])->name('photo.gallery');


//Post Category and SubCategory Pages
Route::get('/category/{id}/{category}',[PostviewController::class,'CatPostc']);
//Route::get('/{category}/{id}',[PostviewController::class,'CatPost']);
Route::get('/category/{id}/{category}',[PostviewController::class,'CatPost']);
Route::get('/subcategory/{id}/{subcategory}',[PostviewController::class,'SubcatPost']);

Route::get('/author/{name}/{id}',[PostviewController::class,'UserPost']);

Route::get('/terms',[PostviewController::class,'Viewterms'])->name('terms');


//Privancy Policy and ckookis Routes
Route::get('/usingtdpb/privacypolicy',[PrivacyPolicyController::class,'HeadPrivacyPolicy'])->name('head.privacy');
Route::get('/usingtdpb/termsncondition',[PrivacyPolicyController::class,'TermsConditon'])->name('termsncondition');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.mainbody.bodycontent');
})->name('dashboard');

//admin Logout
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//Admin Account Settings Routes
Route::get('/account/setting',[AdminController::class,'AccountSetting'])->name('account.setting');
Route::get('/edit/account/setting',[AdminController::class,'EditProfileSetting'])->name('edit.user.profile');
Route::post('/update/account/setting',[AdminController::class,'UpdateProfileSetting'])->name('store.profileinfo');

//Admin password Route
Route::get('/password/setting',[AdminController::class,'PasswordShow'])->name('show.password');
Route::post('/password/change',[AdminController::class,'PasswordChange'])->name('change.password');


//Admin Category Routes
Route::get('/categories',[CategoryController::class,'ShowCategory'])->name('categories');
Route::get('/add/category',[CategoryController::class,'AddCategory'])->name('add.category');
Route::post('/store/category',[CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('/edit/category/{id}',[CategoryController::class,'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}',[CategoryController::class,'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}',[CategoryController::class,'DeleteCategory'])->name('delete.category');

//Admin Sub-Category Routes
Route::get('/subcategories',[SubCategoryController::class,'Index'])->name('subcategories');
Route::get('/add/subcategory',[SubCategoryController::class,'AddSubCategory'])->name('add.subcategory');
Route::post('/store/subcategory',[SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}',[SubCategoryController::class,'EditSubCategory'])->name('edit.subcategory'); 
Route::post('/update/subcategory/{id}',[SubCategoryController::class,'UpdateSubCategory'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}',[SubCategoryController::class,'DeleteSubCategory'])->name('delete.subcategory');



//jason data for Category
Route::get('/get/subcategory/{category_id}',[PostController::class,'GetSubCategory']);


//Admin Posts Routes
Route::get('/allnews/post',[PostController::class,'Index'])->name('allnews.post');
Route::get('/create/post',[PostController::class,'CreatePost'])->name('create.post');
Route::post('/storepost',[PostController::class,'StorePost'])->name('store.post');
Route::get('/edit/post/{id}',[PostController::class,'EditPost'])->name('edit.post');
Route::post('/update/post/{id}',[PostController::class,'UpdatePost'])->name('update.post');
Route::get('/delete/post/{id}',[PostController::class,'DeletePost'])->name('delete.post');


//Settings Routes
Route::get('/settings/socialmedia',[SettingController::class,'AddSocialMedia'])->name('add.socialmedia');
Route::post('/settings/socialmedia/update/{id}',[SettingController::class,'UpdateSocialMedia'])->name('update.socialmedia');
Route::get('/settings/seo',[SettingController::class,'SeoSetting'])->name('seo.setting');
Route::post('/settings/seo/update/{id}',[SettingController::class,'UpdateSeo'])->name('update.seo');


//Admin Gallery Routes
Route::get('/photos/gallery',[GalleryController::class,'ViewGallery'])->name('view.photogallery');
Route::get('/add/photo',[GalleryController::class,'AddPhoto'])->name('add.photogallery');
Route::post('/store/photo',[GalleryController::class,'StorePhoto'])->name('store.photo');
Route::get('/delete/photo/{id}',[GalleryController::class,'DeletePhoto'])->name('delete.photo');

//Admin Post Image Routes
Route::get('/post/image/',[PostImageController::class,'ViewPostImage'])->name('post.image');
Route::get('/addpost/image/',[PostImageController::class,'AddPostImage'])->name('addpost.image');
Route::post('/store/postimage/',[PostImageController::class,'StorePostImage'])->name('storepost.image');
Route::get('/delete/postimage/{id}',[PostImageController::class,'DeletePostImage'])->name('delete.postimage');

//Corona banner
Route::get('/corona/update',[GalleryController::class,'ViewCoronaUp'])->name('view.coronaup');
Route::get('/add/corona/update',[GalleryController::class,'AddCoronaPhoto'])->name('add.coronaup');
Route::post('/store/corona/photo',[GalleryController::class,'StoreCoronaPhoto'])->name('store.coronaphoto');
Route::get('/edit/corona/{id}',[GalleryController::class,'EditCoroan'])->name('edit.corona');
Route::post('/update/corona/{id}',[GalleryController::class,'UpdateCoroan'])->name('update.corona');
Route::get('/delete/corona/{id}',[GalleryController::class,'DeleteCoronaPhoto'])->name('delete.corona');


//===============Multi Image Route========================================
Route::get('/mltiphoto/post',[GalleryController::class,'MultiImg'])->name('multiimg');
Route::get('/add/multiphoto/post',[GalleryController::class,'AddMultiImg'])->name('add.multiimage');
Route::post('/store/multiphoto/post',[GalleryController::class,'StoreMultiImg'])->name('store.multiimage');
Route::delete('/imgpost/delete/{id}',[GalleryController::class,'DeleteMultiImg'])->name('delete.multiimage');


//Admin Videos Routes
Route::get('/videos/gallery',[VideoController::class,'ViewVideos'])->name('view.videos');
Route::get('/add/video',[VideoController::class,'AddVideo'])->name('add.video');
Route::post('/store/video',[VideoController::class,'StoreVideo'])->name('store.video');
Route::get('/delete/video/{id}',[VideoController::class,'DeleteVideo'])->name('delete.video');

//Admin Ads routes
Route::get('/all/ads',[AdsController::class,'ViewAds'])->name('view.ads');
Route::get('/add/ads',[AdsController::class,'AddAds'])->name('add.ads');
Route::post('/store/ads',[AdsController::class,'StoreAds'])->name('store.ads');
Route::get('/delete/ads/{id}',[AdsController::class,'DeleteAds'])->name('delete.ads');

//Admin Website Settings Routes
Route::get('/settings/website',[WebsiteSettingController::class,'WebsiteSetting'])->name('add.setting');
Route::post('/settings/website/update/{id}',[WebsiteSettingController::class,'UpdateWebsiteSetting'])->name('update.websitesetting');

//Author Role Routes
Route::get('/add/author',[AuthorController::class,'AddAuthor'])->name('add.author');
Route::post('/store/author',[AuthorController::class,'StoreAuthor'])->name('store.author');
Route::get('/author',[AuthorController::class,'ViewAuthor'])->name('view.author');
Route::get('/edit/author/{id}',[AuthorController::class,'EditAuthor'])->name('edit.author');
Route::post('/update/author/{id}',[AuthorController::class,'UpdateAuthor'])->name('update.author');
Route::get('/delete/author/{id}',[AuthorController::class,'DeleteAuthor'])->name('delete.author');





