<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoamerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\CompaignController;
use App\Http\Controllers\CoupenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BusinessAdvisorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderRefundController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




#login and signup
Route::post('userRegisteration', [RegisterController::class, 'userRegisteration'])->name('front.userregisteration');
Route::post('userOtp', [RegisterController::class, 'userOtp'])->name('front.userotp');
Route::post('userLogin', [RegisterController::class, 'userLogin'])->name('front.userlogin');
Route::get('userLogout', [RegisterController::class, 'userLogout'])->name('front.userlogout');
Route::post('adminLogout', [UserController::class, 'adminLogout'])->name('front.adminLogout');

//Social Login
// Google URL
Route::get('auth/google', [GoogleAuthController::class, 'redirectToProvider'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleProviderCallback']);


Route::get('auth/facebook', [GoogleAuthController::class, 'redirectToProviderFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [GoogleAuthController::class, 'handleProviderCallbackFacebook']);

#profile routes
Route::post('profileUpdate', [RegisterController::class, 'profileUpdate'])->name('front.profile.update');
Route::post('addAddress', [RegisterController::class, 'addAddress'])->name('front.profile.address');
Route::get('activeAddress/{address_id}', [RegisterController::class, 'activeAddress'])->name('front.address.active');

// Customer Rating Review
Route::post('review/add', [RatingController::class, 'store'])->name('rating.store');

#Front Routes

Route::post('placedorder', [OrderController::class, 'createOrder'])->name('front.orderplaced');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('category/{slug?}/{sub_cat?}', [FrontController::class, 'product_grid'])->name('product_grid');

//grid filters
Route::get('/filter/grid/', [FrontController::class, 'filterGrid'])->name('filterGrid');

Route::get('/product-detail/{id}', [FrontController::class, 'product_detail'])->name('product_detail');

Route::get('/userprofile', [FrontController::class, 'userprofile'])->middleware('isCustomer')->name('userprofile');

Route::get('/my-wallet', [WalletController::class, 'index'])->middleware('isCustomer')->name('my_wallet');
Route::get('/my-wallet/filterBy/{order_no}', [WalletController::class, 'filter'])->middleware('isCustomer')->name('my_wallet.filter');
Route::get('/my-wallet/customer/{id}/{check}', [WalletController::class, 'getCustomerWallet'])->middleware('isCustomer');


Route::get('/mycart', [FrontController::class, 'mycart'])->name('mycart');
Route::get('/myorder', [FrontController::class, 'myorder'])->middleware('isCustomer')->name('myorder');
Route::get('/getOrder/{id}', [OrderController::class, 'getOrder'])->name('orders.getDetails');
Route::post('orders/apply-refund', [OrderRefundController::class, 'store'])->middleware('isCustomer')->name('orders.apply_refund');

Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::get('/thank-you/{order_no}', [OrderController::class, 'thankYou'])->name('orders.thankYou');

Route::get('search', [ProductController::class, 'search'])->name('search');
Route::get('product/flash-sales', [ProductController::class, 'getByFlashSale'])->name('product.flash-sale');
Route::get('product/top-sellers', [ProductController::class, 'getByTopSellers'])->name('product.top-seller');
Route::get('product/new-arrivals', [ProductController::class, 'getByNewArrivals'])->name('product.new-arrivals');

//front ajax functions
Route::get('getsubcategories/{id}', [App\Http\Controllers\ProductCategoryController::class, 'get_subcategory']);
Route::get('getselectedprice/{id}', [App\Http\Controllers\ProductController::class, 'get_varientDetail']);
Route::post('/productaddtocart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart-count', [App\Http\Controllers\CartController::class, 'countCart'])->name('cartCount');
Route::get('/cart-details', [App\Http\Controllers\CartController::class, 'cartDetails'])->name('cartDetails');
Route::get('/cart-remove/{id}', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('cartRemove');
Route::get('/cart-remove/roamer/{id}', [App\Http\Controllers\CartController::class, 'deleteAllCart'])->name('cartAllRemove');
Route::get('/cart-handle/{id}/{qty}', [CartController::class, 'cartHandle'])->name('cartHandle');
Route::get('getRoamerbyCart/{id}', [App\Http\Controllers\CartController::class, 'getRoamerByCart']);
Route::post('applyCoupen', [FrontController::class, 'applyCoupen'])->name('front.applyCoupen');

Route::get('vendor/getProducts/{id}', [ProductController::class, 'productByVendor']);

#Admin Routes
Route::middleware(['adminauth'])->prefix('admin')->group(function () {
    Route::get('compaign', [CompaignController::class, 'compaign'])->name('admin.compaign.index');
    Route::get('compaign/create', [CompaignController::class, 'compaignCreate'])->name('admin.compaign.create');
    Route::get('compaign/edit/{id}', [CompaignController::class, 'edit'])->name('admin.compaign.edit');
    Route::post('compaign/store', [CompaignController::class, 'compaignStore'])->name('admin.compaign.store');
    Route::post('compaign/update/{id}', [CompaignController::class, 'update'])->name('admin.compaign.update');

    Route::get('compaign/join/{id}', [CompaignController::class, 'joinCompaign'])->name('admin.compaign.join');
    Route::get('updateCompaignPrice/{productId}/{compaignId}/{compaignPrice}', [CompaignController::class, 'updateCompaignPrice']);
    Route::get('approveApplicant/{userId}/{productId}', [CompaignController::class, 'approveApplicant']);
    Route::get('compaign/{id}/applicant', [CompaignController::class, 'compaignApplicant'])->name('admin.compaign.applicant');
    Route::post('compaign/join/store', [CompaignController::class, 'joinCompaignProduct'])->name('admin.compaign.product');

    Route::get('campaign/Filter', [CompaignController::class, 'filterByDate'])->name('campaign.filterByDate');
    Route::get('campaign/search/{name}', [CompaignController::class, 'search'])->name('campaign.search');

    Route::get('promotion/campaign/join', [CompaignController::class, 'promotion'])->name('campaign.joinpromotion');


    Route::get('/', [DashboardController::class, 'index'])->name('admindashboad');

    Route::get('/help-center', [FaqController::class, 'index'])->name('help-center');
    Route::post('/faqs/add', [FaqController::class, 'store'])->name('help-center.store');

    Route::get('/roamer-support', [DashboardController::class, 'roamersupport'])->name('roamer-support');

    Route::get('/search', [DashboardController::class, 'filter'])->name('admindashboad.filter');

    Route::get('catlog', [MainCategoryController::class, 'catlogIndex'])->name('catlog.index');
    Route::post('createCatlog', [MainCategoryController::class, 'createCatlog'])->name('catlog.create');
    Route::get('main-category/change-status/{id}', [MainCategoryController::class, 'changeActive'])->name('maincategory.change-status');
    Route::get('main-category/delete/{id}', [MainCategoryController::class, 'delete'])->name('maincategory.delete');
    Route::get('main-category/edit/{id}', [MainCategoryController::class, 'editCatalog'])->name('maincategory.editCatalog');
    Route::post('main-category/update/{id}', [MainCategoryController::class, 'updateCatalog'])->name('maincategory.update');


    Route::get('catlog/getAll', [MainCategoryController::class, 'getAll'])->name('catlog.getAll');

    Route::get('/city', [MainCategoryController::class, 'cityIndex'])->name('province.index');
    Route::get('/city/create', [MainCategoryController::class, 'cityCreate'])->name('province.create');
    Route::post('cityStore', [MainCategoryController::class, 'cityStore'])->name('city.store');
    Route::post('provinceStore', [MainCategoryController::class, 'provinceStore'])->name('province.store');

    //ajax
    Route::get('cities/search/{name}', [MainCategoryController::class, 'searchCity'])->name('cities.search');
    Route::get('searchCategory/{name}', [MainCategoryController::class, 'searchCategory']);

    Route::get('order', [OrderController::class, 'orderIndex'])->name('order.index');
    Route::get('changeOrderStatus/{orderId}/{status}', [OrderController::class, 'changeOrderStatus']);
    Route::get('productStatus/{productId}/{status}', [OrderController::class, 'productStatus']);
    Route::get('deleteOrder/{orderId}', [OrderController::class, 'rejectOrder']);
    Route::post('orderImage', [OrderController::class, 'orderImage'])->name('order.orderimage');
    Route::get('manage-reviews', [OrderController::class, 'managereview'])->name('order.reviews');

    Route::get('orders/generate-pdf/{id}', [OrderController::class, 'generatePDF'])->name('generatePDF');

    Route::get('order-refunds', [OrderRefundController::class, 'index'])->name('order-refund.index');
    Route::get('order-refunds/approve/{id}/{amount}', [OrderRefundController::class, 'approve'])->name('order-refund.approve');
    Route::get('order-refunds/disapprove/{id}', [OrderRefundController::class, 'disapprove'])->name('order-refund.disapprove');

    Route::get('manage-reviews/reviewByRoamer/{id}', [RatingController::class, 'reviewByRoamer']);
    Route::post('manage-reviews/store/response', [RatingController::class, 'storeResponse']);
    Route::get('manage-reviews/viewResponse/{id}', [RatingController::class, 'viewResponse']);

    //Salman Dev
    Route::get('orders/search/', [OrderController::class, 'ordersFilter'])->name('order.filter');
    Route::get('orders/change-amount/{id}/{amount}', [OrderRefundController::class, 'handleAmount']);

    Route::resource('roamers', RoamerController::class);
    Route::get('roamers-request', [RoamerController::class, 'roamer_request'])->name('roamers.request');
    //Salman Dev
    Route::get('products/roamers/{id}', [RoamerController::class, 'roamer_products'])->name('roamer.products');
    //ajax
    Route::get('roamer/details/{id}', [RoamerController::class, 'get_roamer'])->name('roamer.detail');

    Route::get('roamer/getAll', [RoamerController::class, 'getAll']);

    Route::get('vendor/details/{id}', [VendorController::class, 'get_vendor'])->name('vendor.detail');
    Route::get('vendor/holiday-status/{id}', [VendorController::class, 'holiday_status'])->name('vendor.holiday_status');
    Route::get('product/stock-status/{id}', [ProductController::class, 'change_stock_status'])->name('product.stock_status');
    Route::get('product/get-details/{id}', [ProductController::class, 'getDetails'])->name('vendor.get-details');
    //Search Ajax
    Route::get('roamers/search/{id}', [RoamerController::class, 'searchRoamer'])->name('roamers.search');
    Route::get('roamers/request/search/{name}', [RoamerController::class, 'searchRoamerRequests'])->name('roamers.request.search');
    Route::get('vendors/search/{id}', [VendorController::class, 'searchVendor'])->name('vendors.search');
    Route::get('vendors/by-roamer/{id}', [VendorController::class, 'byRoamerWise'])->name('vendors.byRoamerWise');

    Route::get('products/filter/roamer/{id}', [ProductController::class, 'getProductsByRoamer'])->name('products.filter');
    Route::get('products/filter/vendor/{id}', [ProductController::class, 'getProductsByVendor'])->name('products.filter');

    Route::get('categoryByPrice/{id}/{subid?}/{price?}/{p_price?}', [MainCategoryController::class, 'calculatePercentagePrice']);

    Route::resource('products', ProductController::class);
    Route::post('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::resource('attributes', AttributeController::class);
    Route::get('attributes/{attribute}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    Route::get('attributes/changeStatus/{id}', [AttributeController::class, 'changeStatus'])->name('attributes.changestatus');
    Route::resource('productcategories', ProductCategoryController::class);
    Route::get('vendor/byRoamer/{id}', [ProductController::class, 'getVendor']);

    //ajax for bottom check
    Route::get('sub-category/checkall-bottom/{id}', [ProductCategoryController::class, 'checkAllBottom'])->name('subcategory.checkall-bottom');
    Route::get('sub-category/check-bottom/{id}', [ProductCategoryController::class, 'checkBottom'])->name('subcategory.check-bottom');
    Route::get('sub-category/change-status/{id}', [ProductCategoryController::class, 'changeActive'])->name('subcategory.change-status');
    Route::get('sub-category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('sub-category/update/{id}', [ProductCategoryController::class, 'update'])->name('subcategory.update');


    Route::resource('brands', BrandController::class);
    Route::get('brands/search/{name}', [BrandController::class, 'search'])->name('brands.search');
    Route::get('brands/delete/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    Route::post('storeBrand/store', [BrandController::class, 'storeBrand'])->name('brand.storeBrand');

    Route::resource('vendors', VendorController::class);

    Route::get('/roamer-active/{id}', [RoamerController::class, "active_change"]);
    Route::get('/roamer-approval/{id}', [RoamerController::class, "approve_change"]);
    Route::get('/roamer-reject/{id}', [RoamerController::class, "reject_change"])->name('roamer.reject');
    Route::get('roamer/view-modal/{id}', [RoamerController::class, 'getRoamerRequest'])->name('roamer.view-data');

    Route::post('roamer-support/send-mail', [RoamerController::class, 'roamerSupport'])->name('roamer.send-mail');

    Route::post('get-attribute-options', [ProductController::class, 'get_attribute_option'])->name('adminiy.get_option');
    // Route::post('/get-option', 'ProductController@get_option')->name('adminiy.get_option');

    Route::get('manage-shipment', [ShipmentController::class, 'index'])->name('shipment.index');
    Route::post('shipment/store', [ShipmentController::class, 'store'])->name('shipment.store');

    Route::get('general-settings', [GeneralSettingController::class, 'index'])->name('settings.index');
    Route::post('/general-settings/slider/store', [GeneralSettingController::class, 'store'])->name('settings.slider.store');
    Route::get('/general-settings/slider/delete/{id}', [GeneralSettingController::class, 'delete'])->name('settings.slider.delete');
    Route::get('general-settings/edit/{id}', [GeneralSettingController::class, 'edit'])->name('settings.edit');
    Route::post('/general-settings/slider/update/{id}', [GeneralSettingController::class, 'update'])->name('settings.slider.update');


    Route::get('/account-settings', [AccountSettingController::class, 'index'])->name('accounts.index');
    Route::post('/account-settings/update', [AccountSettingController::class, 'store'])->name('accounts.update');
    Route::get('/account-settings/checkPassword/{email}/{password}', [AccountSettingController::class, 'checkPassword'])->name('accounts.updatePassword');
    Route::post('/account-settings/updatePassword', [AccountSettingController::class, 'updatePassword'])->name('accounts.updatePassword');

    //Chats

    Route::get('chat-room', [ChatRoomController::class, 'index'])->name('chats.index');

    Route::get('chat-room/seller', [ChatRoomController::class, 'roamerChat'])->name('seller-chats.index');

    Route::get('chat-room/user/{id}/{Id}', [ChatRoomController::class, 'getUser'])->name('chats.user');
    Route::post('chat-room/send-message', [ChatRoomController::class, 'store'])->name('chats.send-message');
    Route::get('chat-room/get-message', [ChatRoomController::class, 'getMessages'])->name('chats.get-messages');

    Route::get('product/variation/{id}', [ProductController::class, 'getVariant']);

    Route::post('/product/variation/update', [ProductController::class, 'updateVariant'])->name('product.updateVariant');


    Route::post('vendor/storeVendor', [VendorController::class, 'storeVendor'])->name('storevendor');

    Route::get('vendor/getAll', [VendorController::class, 'getAll']);
    Route::get('vendor/roamer/{id}', [VendorController::class, 'getVendorByRoamer']);


    Route::get('coupen/changeStatus/{id}', [CoupenController::class, 'changeStatus'])->name('admin.coupen.change-status');
    Route::get('coupen/{id}', [CoupenController::class, 'delete'])->name('admin.coupen.delete');
    Route::get('coupen/edit/{id}', [CoupenController::class, 'edit'])->name('admin.coupen.edit');
    Route::post('coupen/update/{id}', [CoupenController::class, 'update'])->name('admin.coupen.update');

    Route::get('notifications/', [NotificationController::class, 'index'])->name('admin.notifications');
    Route::get('notifications/markRead/{id}', [NotificationController::class, 'markRead'])->name('admin.mark-read');

    Route::get('business', [BusinessAdvisorController::class, 'index'])->name('admin.business.index');
    Route::get('business/getProduct/{id}', [BusinessAdvisorController::class, 'getProduct'])->name('admin.business.getProduct');
    Route::get('business-advisor/filter', [BusinessAdvisorController::class, 'filter'])->name('admin.business.filter');

    Route::get('coupen', [CoupenController::class, 'index'])->name('admin.coupen.index');
    Route::post('coupen/store', [CoupenController::class, 'store'])->name('admin.coupen.store');

    Route::get('/isRead/{id}', [ChatRoomController::class, 'isread'])->name('admin.isread');

    Route::get('/product/update/{id}', [ProductController::class, 'editProduct'])->name('admin.editProduct');

});

Route::get('/brand/all', [BrandController::class, 'getBrands'])->name('brands.getAll');

Route::get('/getProvinceCity/{provinceId}', [LoginController::class, 'getProvinceCity'])->name('getProvinceCity');
Route::get('/citiesByProvice/{provinceId}', [FrontController::class, 'getCities'])->name('citiesByProvice');

Route::get('/shop', [FrontController::class, 'shop'])->name('shop');

//to get price by selected variant ..
Route::get('getPriceByVariant/{id}', [ProductController::class, 'getPriceByVariant'])->name('product.getPriceByVariant');

Route::get('admin/login', [LoginController::class, 'adminindex'])->name('admin.login');
Route::get('roamer', [LoginController::class, 'roamerindex'])->name('roamer.login');

Route::get('roamer/signup', [LoginController::class, 'roamersignup'])->name('admin.signup');


Route::post('roamer/login', [LoginController::class, 'adminloginstore'])->name('admin.loginpost');
Route::post('admin/login', [LoginController::class, 'adminloginstore'])->name('admin.loginpost');
Route::post('/signup', [LoginController::class, 'roamersignupstore'])->name('admin.signuppost');



Route::get('finance', [FinanceController::class, 'finance'])->name('admin.finance.index');
Route::get('finance/filter/{id}', [FinanceController::class, 'filterFinance']);

Route::post('addExpense', [FinanceController::class, 'addExpense'])->name('admin.addExpense');
Route::post('addToppped', [FinanceController::class, 'addToppped'])->name('admin.addToppped');
Route::get('expense', [FinanceController::class, 'expense'])->name('admin.expense.index');
Route::get('expense/byRoamer', [FinanceController::class, 'expenseFilter'])->name('admin.expense.filter');


Route::post('coupen/apply', [CoupenController::class, 'apply'])->name('coupen.apply');
// Auth::routes();

Route::post('user/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('user.reset-password');

Route::get('privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('return-privacy', [HomeController::class, 'returnprivacy'])->name('return-privacy');
Route::get('terms-conditions', [HomeController::class, 'termsconditions'])->name('terms');
Route::get('about', [HomeController::class, 'about'])->name('about-bazaar');
Route::get('faq', [HomeController::class, 'faqs'])->name('faq');
Route::get('/roamer-terms', [HomeController::class, 'signupterms'])->name('terms-conditions');

Route::get('campaign/{id}', [FrontController::class, 'getCompaignProducts'])->name('front.compaign');


Route::get('categories', [FrontController::class, 'mainCategories'])->name('categories.index');

//---------------ROAMER ROUTES--------------------//
