<?php 

// Route xử lý cho admin
Route::namespace('Admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    Route::get('/404', 'AdminController@error')->name('adminError');

    Route::get('deny', 'DashboardController@deny')->name('admin.deny');
    Route::get('data_not_found', 'DashboardController@dataNotFound')->name('admin.data_not_found');
    Route::get('deny_single', 'DashboardController@denySingle')->name('admin.deny_single');
        
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'HomeController@index')->name('admin.dashboard');
         //các route của quản trị viên sẽ được viết trong group này, còn chức năng của user sẽ viết ngoài route
        Route::group(['middleware' => 'checkAdminPermission'], function () {
            //Setting
            Route::get('/theme-option', 'AdminController@getThemeOption')->name('admin.themeOption');
            Route::post('/theme-option', 'AdminController@postThemeOption')->name('admin.postThemeOption');
            Route::get('/menu', 'AdminController@getMenu')->name('admin.menu');

            Route::group( ['prefix' => 'payment'], function(){
                Route::get('history', 'ViewTipController@paymentHistory')->name('admin_tip.history');
                Route::get('history/{id}', 'ViewTipController@paymentHistoryDetail')->name('admin_tip.history_detail');
                Route::post('update', 'ViewTipController@historyUpdate')->name('admin_tip.history_update');
                Route::get('payment-view-tip', 'ViewTipController@viewTipHistory')->name('admin_tip.payment_history');
            });

            //Block
            Route::group( ['prefix' => 'block'], function(){
                Route::get('/', 'BlockController@index')->name('admin_block');
                Route::get('create', 'BlockController@create')->name('admin_block.create');
                Route::get('edit/{id}', 'BlockController@edit')->name('admin_block.edit');
                Route::post('post', 'BlockController@store')->name('admin_block.post');
            });

            //duong doi
            Route::group( ['prefix' => 'investor'], function(){
                Route::get('/', 'InvestorController@index')->name('admin_investor');
                Route::get('create', 'InvestorController@create')->name('admin_investor.create');
                Route::get('/edit/{id}', 'InvestorController@edit')->name('admin_investor.edit');
                Route::post('post', 'InvestorController@post')->name('admin_investor.post');
            });
            //Tra cuu danh muc
            Route::group( ['prefix' => 'danh-muc-chi-so-tra-cuu'], function(){
                Route::get('/', 'ChiSoCategoryController@index')->name('admin_chiso_category');
                Route::get('create', 'ChiSoCategoryController@create')->name('admin_chiso_category.create');
                Route::get('/edit/{id}', 'ChiSoCategoryController@edit')->name('admin_chiso_category.edit');
                Route::post('post', 'ChiSoCategoryController@store')->name('admin_chiso_category.post');
            });

            //Page
            Route::group( ['prefix' => 'page'], function(){
                Route::get('/list', 'PageController@listPage')->name('admin.pages');
                Route::get('create', 'PageController@createPage')->name('admin.createPage');
                Route::get('/edit/{id}', 'PageController@pageDetail')->name('admin.pageDetail');
                Route::post('post', 'PageController@postPageDetail')->name('admin.postPageDetail');
            });

            //Post
            Route::group( ['prefix' => 'post'], function(){
                Route::get('/list', 'PostController@listPost')->name('admin.posts');
                Route::get('search-post', 'PostController@searchPost')->name('admin.searchPost');
                Route::get('create', 'PostController@createPost')->name('admin.createPost');
                Route::get('edit/{id}', 'PostController@postDetail')->name('admin.postDetail');
                Route::post('/post', 'PostController@postPostDetail')->name('admin.postPostDetail');
            });

            //Category Post
            Route::group( ['prefix' => 'category-post'], function(){
                Route::get('/list', 'CategoryController@listCategoryPost')->name('admin.listCategoryPost');
                Route::get('create', 'CategoryController@createCategoryPost')->name('admin.createCategoryPost');
                Route::get('{id}', 'CategoryController@categoryPostDetail')->name('admin.categoryPostDetail');
                Route::post('/post', 'CategoryController@postCategoryPostDetail')->name('admin.postCategoryPostDetail');
            });

            /*service*/
            Route::group( ['prefix' => 'service'], function(){
                Route::get('/list', 'ServiceController@index')->name('admin_service');
                Route::get('create', 'ServiceController@create')->name('admin_service.create');
                Route::get('edit/{id}', 'ServiceController@edit')->name('admin_service.edit');
                Route::post('/post', 'ServiceController@store')->name('admin_service.post');
            });

            Route::group( ['prefix' => 'service-category'], function(){
                Route::get('list', 'ServiceCategoryController@index')->name('admin_service_category');
                Route::get('create', 'ServiceCategoryController@create')->name('admin_service_category.create');
                Route::get('edit/{id}', 'ServiceCategoryController@edit')->name('admin_service_category.edit');
                Route::post('post', 'ServiceCategoryController@store')->name('admin_service_category.post');
            });
            /*service*/
            
            //Slider Home
            Route::group(['prefix' => 'slider'], function () {
                Route::get('/', 'SliderController@listSlider')->name('admin.slider');
                Route::get('create', 'SliderController@createSlider')->name('admin.createSlider');
                Route::get('{id}', 'SliderController@sliderDetail')->name('admin.sliderDetail');
                Route::post('post', 'SliderController@postSliderDetail')->name('admin.postSliderDetail');
                Route::post('insert', 'SliderController@insertSlider')->name('admin.slider.insert');
                Route::post('edit', 'SliderController@editSlider')->name('admin.slider.insert');
                Route::post('delete', 'SliderController@deleteSlider')->name('admin.slider.delete');

                Route::post('sort', 'SliderController@updateSort')->name('admin.slider.sort');
            });
            
            //Orders
            Route::group( ['prefix' => 'order'], function(){
                Route::get('/', 'OrderController@listOrder')->name('admin.listOrder');
                Route::get('/search', 'OrderController@searchOrder')->name('admin.searchOrder');
                Route::get('{id}', 'OrderController@orderDetail')->name('admin.orderDetail');
                Route::post('post', 'OrderController@postOrderDetail')->name('admin.postOrderDetail');
            });
        
            //xử lý users admin
            Route::group( ['prefix' => 'user-admin'], function(){
                Route::get('/', 'UserAdminController@index')->name('admin.listUserAdmin');
                Route::get('edit/{id}', 'UserAdminController@edit')->name('admin.userAdminDetail');
                Route::post('post', 'UserAdminController@post')->name('admin.postUserAdmin');
                Route::get('add', 'UserAdminController@create')->name('admin.addUserAdmin');
                Route::get('/delete/{id}', 'UserAdminController@deleteUserAdmin')->name('admin.delUserAdmin');

            });
            Route::group( ['prefix' => 'permission'], function(){
                Route::get('/', 'Auth\PermissionController@index')->name('admin_permission.index');
                Route::get('create', 'Auth\PermissionController@create')->name('admin_permission.create');
                Route::get('/edit/{id}', 'Auth\PermissionController@edit')->name('admin_permission.edit');
                Route::post('/post', 'Auth\PermissionController@post')->name('admin_permission.post');
                Route::get('/delete/{id}', 'Auth\PermissionController@delete')->name('admin_permission.delete');
            });
            Route::group(['prefix' => 'role'], function () {
                Route::get('/', 'Auth\RoleController@index')->name('admin_role.index');
                Route::get('create', 'Auth\RoleController@create')->name('admin_role.create');
                Route::get('/edit/{id}', 'Auth\RoleController@edit')->name('admin_role.edit');
                Route::post('/post', 'Auth\RoleController@post')->name('admin_role.post');
                Route::get('/delete/{id}', 'Auth\RoleController@delete')->name('admin_role.delete');
            });

            //xử lý users
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', 'UserController@listUsers')->name('admin.listUsers');
                Route::get('export', 'UserController@exportCustomer')->name('admin.user.export');
                Route::get('{id}', 'UserController@userDetail')->name('admin.userDetail');
                Route::post('edit', 'UserController@postUserDetail')->name('admin.postUserDetail');
                Route::get('add', 'UserController@addUsers')->name('admin.addUsers');
                Route::post('add', 'UserController@postAddUsers')->name('admin.postAddUsers');
                Route::get('delete/{id}', 'UserController@deleteUser')->name('admin.delUser');
            });

            Route::group(['prefix' => 'bao-cao'], function () {
                Route::get('/', 'BaocaoController@index')->name('admin.baocao');
                Route::post('/export', 'BaocaoController@export')->name('admin.baocao_export');
            });
            Route::get('payment-history', 'PaymentController@paymentHistory')->name('admin.payment_history');
            Route::get('credit-spent', 'PaymentController@creditSpent')->name('admin.credit_spent');

            //export excel
            Route::group(['prefix' => 'export'], function () {
                Route::get('/customer', array('as' => 'admin.exportCustomer', 'uses' => 'AdminController@exportCustomer'));
                Route::get('/orders', array('as' => 'admin.exportOrders', 'uses' => 'AdminController@exportOrder'));
                Route::get('/products', array('as' => 'admin.exportProducts', 'uses' => 'AdminController@exportProduct'));
            });

            //package
            Route::group(['prefix' => 'package'], function () {
                Route::get('list', 'PackageController@index')->name('admin.package.index');
                Route::get('create', 'PackageController@create')->name('admin.package.create');
                Route::get('{id}', 'PackageController@edit')->name('admin.package.edit');
                Route::post('post', 'PackageController@post')->name('admin.package.post');
                Route::post('show-home', 'PackageController@showHome')->name('admin.package.show_home');
                Route::post('priority', 'PackageController@priority')->name('admin.package.priority');
            });

            //Category Product
            Route::group(['prefix' => 'category'], function () {
                Route::get('list', 'ProductCategoryController@index')->name('admin.category');
                Route::get('create', 'ProductCategoryController@create')->name('admin.product.category.create');
                Route::get('{id}', 'ProductCategoryController@edit')->name('admin.categoryProductDetail');
                Route::post('post', 'ProductCategoryController@post')->name('admin.postCategoryProductDetail');
                Route::get('checklist/{id}', 'ProductCategoryController@getCategoryCheckList');
            });
            Route::get('/category-checklist/{id}', 'ProductCategoryController@getCategoryCheckList');

            //email template
            Route::group(['prefix' => 'email-template'], function () {
                Route::get('/', 'EmailTemplateController@index')->name('admin.email_template');
                Route::get('edit/{id}', 'EmailTemplateController@edit')->name('admin.email_template.edit');
                Route::get('add', 'EmailTemplateController@create')->name('admin.email_template.create');
                Route::post('post', 'EmailTemplateController@post')->name('admin.email_template.post');
            });
        
            //research
            Route::group(['prefix' => 'research'], function () {
                Route::get('/', 'ResearchController@index')->name('admin.research');
                Route::get('edit/{id}', 'ResearchController@edit')->name('admin.research_edit');
                Route::get('add', 'ResearchController@create')->name('admin.research_create');
                Route::post('post', 'ResearchController@post')->name('admin.research_post');
            });
            //research category
            Route::group(['prefix' => 'research-category'], function () {
                Route::get('/', 'ResearchCategoryController@index')->name('admin_research.category');
                Route::get('edit/{id}', 'ResearchCategoryController@edit')->name('admin_research.category_edit');
                Route::get('add', 'ResearchCategoryController@create')->name('admin_research.category_create');
                Route::post('post', 'ResearchCategoryController@post')->name('admin_research.category_post');
            });
            //document
            Route::group(['prefix' => 'document'], function () {
                Route::get('/', 'DocumentController@index')->name('admin.document');
                Route::get('edit/{id}', 'DocumentController@edit')->name('admin.document_edit');
                Route::get('add', 'DocumentController@create')->name('admin.document_create');
                Route::post('post', 'DocumentController@post')->name('admin.document_post');
            });
            
            //review
            Route::group(['prefix' => 'review'], function () {
                Route::get('/', 'ReviewController@index')->name('admin_review');
                Route::get('edit/{id}', 'ReviewController@edit')->name('admin_review.edit');
                Route::get('add', 'ReviewController@create')->name('admin_review.create');
                Route::post('post', 'ReviewController@post')->name('admin_review.post');
            });

          //change password
            Route::group(['prefix' => 'change-password'], function () {
                Route::get('/', 'AdminController@changePassword')->name('admin.changePassword');
                Route::post('/', 'AdminController@postChangePassword')->name('admin.postChangePassword');
            });
          
            Route::get('/check-password', 'AjaxController@checkPassword')->name('admin.checkPassword');

            //ajax delete
            Route::post('/delete-id', 'AjaxController@ajax_delete')->name('admin.ajax_delete');

            //ajax process
            Route::group(['prefix' => 'ajax'], function () {
                Route::post('process_theme_fast', 'AjaxController@processThemeFast')->name('admin.ajax.processThemeFast');
                Route::post('process_new_item', 'AjaxController@update_new_item_status')->name('admin.ajax.process_new_item');
                Route::post('process_flash_sale', 'AjaxController@update_process_flash_sale')->name('admin.ajax.process_flash_sale');
                Route::post('process_sale_top_week', 'AjaxController@update_process_sale_top_week')->name('admin.ajax.process_sale_top_week');
                Route::post('process_propose', 'AjaxController@update_process_propose')->name('admin.ajax.process_propose');
                Route::post('process_store_status', 'AjaxController@updateStoreStatus')->name('admin.ajax.process_store_status');
                Route::post('load_variable', 'AjaxController@loadVariable')->name('admin.ajax.load_variable');
            });

           
            //Product
            Route::group(['prefix' => 'product'], function () {
                Route::get('/list', 'ProductController@listProduct')->name('admin.product');
                Route::get('/search', 'ProductController@searchProduct')->name('admin.searchProduct');
                Route::get('create', 'ProductController@createProduct')->name('admin.createProduct');
                Route::get('export', 'ProductController@export')->name('admin.product.export');
                Route::post('export', 'ProductController@exportPost');
                Route::get('{id}', 'ProductController@productDetail')->name('admin.productDetail');
                Route::post('post', 'ProductController@postProductDetail')->name('admin.postProductDetail');
                Route::post('duyet-danh-sach-bao-gia', 'ProductController@listBaogia')->name('admin.danh_sach_baogia');
            });

            Route::get('media-manager/fm-button', 'FileManagerController@fmButton')
            ->name('fm.fm-button');

            Route::group(['prefix' => 'admin-menu'], function () {
                Route::get('/', 'AdminMenuController@index')->name('admin_menu.index');
                Route::post('/create', 'AdminMenuController@postCreate')->name('admin_menu.create');
                Route::get('/edit/{id}', 'AdminMenuController@edit')->name('admin_menu.edit');
                Route::post('/edit/{id}', 'AdminMenuController@postEdit')->name('admin_menu.edit');
                Route::post('/delete', 'AdminMenuController@deleteList')->name('admin_menu.delete');
                Route::post('/update_sort', 'AdminMenuController@updateSort')->name('admin_menu.update_sort');
            });

            //email template
            Route::group(['prefix' => 'email-template'], function () {
                Route::get('/', 'EmailTemplateController@index')->name('admin.email_template');
                Route::get('edit/{id}', 'EmailTemplateController@edit')->name('admin.email_template.edit');
                Route::get('add', 'EmailTemplateController@create')->name('admin.email_template.create');
                Route::post('post', 'EmailTemplateController@post')->name('admin.email_template.post');
            });
        });
    });
});