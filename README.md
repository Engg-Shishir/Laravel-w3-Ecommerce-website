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