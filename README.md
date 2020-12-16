# Laravel-w3-Ecommerce-website-2020
<br><br><br>

>## Process
 <strong style="color:red; font-size:30px;">1</strong> Install Laravel Default Authentication.
  + run  `composer require laravel/ui` 
  + run `php artisan ui:auth` 
  + run `php artisan ui bootstrap` 
  + run `npm install` 
  + run `npm run dev`
  <br><br><br><br><br><br>

 <strong style="color:red; font-size:30px;">2</strong> Create One more Larvel Authentication for Admin. Follow Process

  + run `php artisan make:model Admin -mc`
  
  + Go to `2020_12_13_084535_create_admins_table.php` file and paste this code inside `up()` function
  ```php
    public function up()
    {
      Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->rememberToken();
            $table->timestamps();
      });
    }
  ```
  + Go to `AppServiceProvider.php` file and create a ` Schema`
  ```php
  use Schema;
  public function boot()
  {
    Schema::defaultStringLength(191);
  }
  ```
  
  + Go to `User.php` Model file and copy all of code & paste this code inside `Admin.php` file, then change some code. Set `User` => `Admin`. Add another $fillable field `phone`

  + Set your database name inside `.env` file
  
  + run `php artisan migrate` for migration
  + Create `Guard` for `admin` inside `auth.php` with some extra configuration 
   ```php
      # put this array inside 'guards' => []
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

      # put this array inside 'providers' => []
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
      
      # put this array inside 'passwords' => []        
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
   ```


  + copy all code from `HomeController.php` and paste `AdminController.php`, Then change some configuration. Set `HomeController.php` => `AdminController.php`,  `auth:auth` => `auth:admin`

  + Create a `route` for show `login` form `Route::get('/admin',[LoginController::class,'showLoginForm'])->name('admin.login');`. Then create a `Admin` folder inside `Controllers` folder. Copy `LoginController.php` from `Controllers\Auth` and paste it inside `Controllers\Admin` folder, and change some code.

  
  + copy `views\auth\login.blade.php` and paste inside `views\Admin` then change, some code

  + create another `post` route for login `Route::post('/admin',[LoginController::class,'login']);`

  + create another `get` route for Admin home page, when admin login successfully `Route::get('/admin/home', [AdminController::class, 'index']);`


  + Go to `AuthenticatesUsers.php` file and copy this guard code and paste it inside `Controllers\Admin\LoginController.php`
  ```php
    use Illuminate\Support\Facades\Auth;

    # Get the guard to be used during authentication
    protected function guard()
    {
        return Auth::guard();
    }
  ```

  + create a `seeder` for admin login. Reason admin have no registration process. run `php artisan make:seeder AdminSeeder`. Then `insert` some `admin` information inside `run()` function
  ```php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    DB::table('admins')->insert([
        'name'=> 'admin',
        'email'=> 'admin@gmail.com',
        'password' => Hash::make('password'),
        'phone' => '0139688787878'
    ]);
  ```
  + Go to `DatabaseSeeder.php` and include `AdminSeeder.php`

  + For seeding run `php artisan db:seed`


 + Now Let's try to login as a `Admin`
 <br><br><br> <br><br><br>





<strong style="color:red; font-size:30px;">3</strong>Replace Laravel Admin page to our tamplate page 

  + Go to this link, download & extract admin tamplate ``
  + Go to extracted tamplate and copy require `css, img, js, scss, lib` folder. Then paste it inside project `public\backend` folder
  + Now create a `common backend master blade file` inside Admin. Because Every admin view , there have some common `code and link`. Such that `sidebar & topbar`
  + Open all tamplate file, inside a edittor and copy all `link,src` then put inside `backend master file`
  + For Fresh coading i create some `partof` backend master file.Such that... Link,src,topheader,sidebar etc
  + you find home page code inside tamplate `index.html` file
  + You also find some essential code from tamplate.
<br><br><br> <br><br><br>



     
<strong style="color:red; font-size:30px;">4</strong> Create Admin Logout System

  + create logout route `Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');`
  + create `logout` function inside `AdminController.php`
  <br><br><br> <br><br><br>






<strong style="color:red; font-size:30px;">5</strong> Admin category Control

+ First create `model,migration,controller`
+ run `php artisan make:controller Admin\CategoryCotroller`
+ run `php artisan make:model Category -m`
+ put essential table field inside `migration`, also add `$fillable` property inside `Model`
+ run `php artisan migrate`
+ create route for category manage `Route::get('/admin/categorys',[CategoryController::class,'index'])->name('admin.categorys')`
<br><br><br> <br><br><br>




  
<strong style="color:red; font-size:30px;">6</strong> Admin brand Control

+ First create `model,migration,controller`
+ run `php artisan make:controller Admin\BrandController`
+ run `php artisan make:model Brand -m`
+ put essential table field inside `migration`, also add `$fillable` property inside `Model`
+ run `php artisan migrate`
+ create route for Brand manage `Route::get('/admin/brand',[BrandController::class,'index'])->name('admin.brand')`
<br><br><br> <br><br><br>





<strong style="color:red; font-size:30px;">7</strong> Admin product Control

+ First create `model,migration,controller`
+ run `php artisan make:controller Admin\ProductController`
+ run `php artisan make:model Product -m`
+ put essential table field inside `migration`, also add `$fillable` property inside `Model`
+ run `php artisan migrate`
+ create route for Product manage `Route::get('/admin/product',[ProductController::class,'product_form_show'])->name('product_form_show');`
+ now install image intervention package to work with image `composer require intervention/image`
+ create configuration in `config\app.php`
  ```php
  # In the $providers array add the service providers for this package.
  Intervention\Image\ImageServiceProvider::class

  # Add the facade of this package to the $aliases array.
  'Image' => Intervention\Image\Facades\Image::class
  ```
+ Publish intervention configuration ` php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent" `
+ use `use Intervention\Image\ImageManager;`  & `use Image;` in `ProductController`
+ Create your folder inside public directory as you want. Suppose `public\frontend\img\produt\upload`
+ use `enctype="multipart/form-data"` inside form, othewise image is not insert
+ ceate another route to manage product `Route::get('/admin/manage/product',[ProductController::class,'manage'])->name('manage_product');`
+ join category table with product table using Laravel model join function
  ```php    
    public function category()
    {
        # this function gate category according to product category
        return $this->belongsTo(Category::class,'category_id');
    }
  ```
<br><br><br> <br><br><br>






<strong style="color:red; font-size:30px;">8</strong> Admin Cupon Control

+ First create `model,migration,controller`
+ run `php artisan make:controller Admin\CuponController`
+ run `php artisan make:model Cupon -m`
+ put essential table field inside `migration`, also add `$fillable` property inside `Model`
+ run `php artisan migrate`
+ create route for Brand manage `Route::get('/admin/cupon',[CuponController::class,'index'])->name('admin.cupon')`;
<br><br><br> <br><br><br>






<strong style="color:red; font-size:30px;">9</strong> Admin Order Control

+ First create `model,migration,controller`
+ create a controller `php artisan make:controller Admin\OrderController`
+ run `php artisan make:model Order -m`
+ put essential table field inside `migration`, also add `$guarded` property inside `Model`
+ run `php artisan migrate`
+ create route for Order manage `Route::get('/admin/order',[OrderController::class,'index'])->name('admin.order');`
<br><br><br> <br><br><br>





<strong style="color:red; font-size:30px;">10</strong>Replace Laravel welcome page to our tamplate page 
  
  + create a controller `php artisan make:controller Frontend\FrontendController` 
  + create a route for home page `Route::get('/',[FrontendController::class, 'index'])->name('front.home');`
  + Go to this link, download & extract frontend tamplate ``
  + Go to extracted tamplate and copy require `css, js, fonts` folder. Then paste it inside project `public\Frontend` folder
  + Now create a `common frontend master blade file` inside Frontend. Because Every frontend view , there have some common `code and link`. Such that `sidebar & topbar & footr & dropdown`
  + Open all tamplate file, inside a edittor and copy all `link,src` then put inside `backend master file`
  + For Fresh coading i create some `partof` frontend master file.Such that... Link,src,topheader,sidebar etc
  + you find home page code inside tamplate `index.html` file
  + You also find some essential code from tamplate.
<br><br><br> <br><br><br>








<strong style="color:red; font-size:30px;">11</strong> User registration, login & logout setup
<br><br><br> <br><br><br>










<strong style="color:red; font-size:30px;">12</strong> User wishlist & shopping cart setup

+ First create `model,migration,controller`
+ Second Compleate Adding system
+ Thirdly compleate Wishlist page setup
+ Finally compleate Cart page setup

+ create a controller `php artisan make:controller User\WishlistController`
+ run `php artisan make:model Wishlist -m`
+ ceate join `wishlists` table with `products` table
```php
  public function product()
  {
      return $this->belongsTo(Product::class,'product_id');
  }
  ```

+ create a controller `php artisan make:controller User\CartController`
+ run `php artisan make:model Cart -m`
+ ceate join `carts` table with `products` table
  ```php
    public function product()
    {
        return $this->belongsTo(Product::class,'pro_id');
    }
  ```
  
+ put essential table field inside `migration`, also add `$fillable` property inside `Model`

+ run `php artisan migrate`
<br><br><br> <br><br><br>








<strong style="color:red; font-size:30px;">13</strong>Order Checkout

+ First create `model,migration,controller` 
+ run `php artisan make:controller User\CheckoutController`
+ run `php artisan make:model Orderitem -m`
+ ceate join `orderitems` table with `products` table
  ```php
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
  ```
+ run `php artisan make:model Shipping -m`
+ put essential table field inside `migration`, also add `$guarded` property inside `Model`
+ run `php artisan migrate`
<br><br><br> <br><br><br>










<strong style="color:red; font-size:30px;">14</strong> Manage User Profile

+ First create your own profile view.
+ Second go to `HomeController.php` and change view location to your own profle location
+ Create controller `php artisan make:controller User\UserController`
<br><br><br> <br><br><br>





<strong style="color:red; font-size:30px;">15</strong> Change Admin Login Form View
<br><br><br> <br><br><br>









<strong style="color:red; font-size:30px;">16</strong> Update user profile
<br><br><br> <br><br><br>








<strong style="color:red; font-size:30px;">17</strong> Shop page setup

+ to add pagination get data this way
  + `Product::latest()->paginate(3);`
  + then go to `app/Providers/AppServiceProvider.php`
  ```php
  use Illuminate\Pagination\Paginator;
  public function boot()
  {
      //fix for pagination making weird oversize by using bootstraps paginator
      // solve link : https://stackoverflow.com/questions/64186820/visual-issue-with-laravel-8-pagination-link-method
      Paginator::useBootstrap();
  }
  ```
<br><br><br> <br><br><br>











<strong style="color:red; font-size:30px;">18</strong> SaleOf product manage
<br><br><br> <br><br><br>











<strong style="color:red; font-size:30px;">19</strong> Product Details Page Setup
<br><br><br> <br><br><br>