# Laravel MVC Architecture Example

This repository demonstrates the basic implementation of the Model-View-Controller (MVC) architecture in a Laravel application. 

## Getting Started

To get this project running locally, follow these steps:

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js & npm

### Installation

1. **Clone the Repository:**

    ```sh
    git clone <repository_url>
    cd <repository_name>
    ```

2. **Install Dependencies:**

    ```sh
    composer install
    ```

3. **Set Up Environment Variables:**

    Copy the `.env.example` file to create a new `.env` file:

    ```sh
    cp .env.example .env
    ```

    Open the `.env` file and configure your environment variables (e.g., database connection settings).

4. **Generate Application Key:**

    ```sh
    php artisan key:generate
    ```

5. **Set Up Database:**

    Make sure your database is running and the configuration in the `.env` file is correct. Then run migrations to set up your database schema:

    ```sh
    php artisan migrate
    ```

6. **Install NPM Dependencies (if needed):**

    If your project uses front-end assets, you may need to install and compile them. Make sure you have Node.js and NPM installed.

    ```sh
    npm install
    npm run dev
    ```

7. **Start the Local Development Server:**

    ```sh
    php artisan serve
    ```

    This will start the server at `http://localhost:8000`.

8. **Access Your Application:**

    Open your web browser and navigate to `http://localhost:8000` to see your Laravel application running.

## MVC Architecture in Laravel

### Model

The Model represents the data and the business logic of the application. In Laravel, models are usually stored in the `app/Models` directory.

- **Example:** `User` model
    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        use HasFactory;

        // Define the table associated with the model (optional)
        protected $table = 'users';

        // Define the fillable properties
        protected $fillable = ['name', 'email', 'password'];
    }
    ```

### View

The View represents the user interface of the application. In Laravel, views are typically stored in the `resources/views` directory and use the Blade templating engine.

- **Example:** `welcome.blade.php`
    ```blade
    <!DOCTYPE html>
    <html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h1>Welcome to Laravel!</h1>
        <p>User: {{ $user->name }}</p>
    </body>
    </html>
    ```

### Controller

The Controller handles the user input and interacts with the model to fetch and manipulate data. In Laravel, controllers are usually stored in the `app/Http/Controllers` directory.

- **Example:** `UserController`
    ```php
    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;

    class UserController extends Controller
    {
        public function show($id)
        {
            // Fetch the user from the database
            $user = User::find($id);

            // Pass the user data to the view
            return view('welcome', ['user' => $user]);
        }
    }
    ```

### Routing

Routes define the URLs for your application and specify which controller action to call when a URL is accessed. In Laravel, routes are defined in the `routes/web.php` file for web routes.

- **Example:** `routes/web.php`
    ```php
    use App\Http\Controllers\UserController;

    Route::get('/user/{id}', [UserController::class, 'show']);
    ```

### MVC Architecture Mapping in Laravel

1. **User Request:**
   - A user accesses the URL `http://yourapp.com/user/1`.
   - The request is routed to the appropriate controller action based on the route definition.

2. **Route Handling:**
   - The route definition `Route::get('/user/{id}', [UserController::class, 'show']);` maps the URL to the `show` method of `UserController`.

3. **Controller Action:**
   - The `show` method in `UserController` is executed.
   - The controller interacts with the `User` model to fetch the user data from the database.

4. **Model Interaction:**
   - The `User` model retrieves the user data based on the given ID.

5. **View Rendering:**
   - The controller passes the user data to the `welcome` view.
   - The `welcome` view renders the HTML output with the user data.

6. **Response:**
   - The rendered view is sent back to the user's browser as the HTTP response.

## Contributing

Feel free to fork this repository, create a feature branch, and submit a pull request. Any contributions are welcome!

## License

This project is licensed under the MIT License.


