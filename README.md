Task Management API
-------------------
A RESTful API for managing tasks, developed using Laravel.

Features:
Create a new task,
Retrieve a list of tasks,
Retrieve a sigle tasks,
Mark a task as completed,
Delete a task,

Requirements:
Before setting up the project, ensure you have the following installed:

PHP 8.1 or higher
Composer
Laravel 10.x
MySQL
Node.js and npm (for frontend or optional assets)
Postman or Curl for API testing
Installation
Clone the repository:
git clone https://github.com/your-username/task-management-api.git
cd task-management-api

composer install
Create a .env file:

cp .env.example .env
Set up your database in the .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=your_password
Generate the application key:

php artisan key:generate
Run database migrations:

php artisan migrate
Start the development server:

php artisan serve
Your API is now running at http://127.0.0.1:8000.

Seeding a Test User
Create a seeder to add a test user:

php artisan make:seeder UserSeeder
Edit the UserSeeder class in database/seeders/UserSeeder.php to include the following code:

public function run()
{
    $user = \App\Models\User::create([
        'name' => 'Test User',
        'email' => 'testuser@example.com',
        'password' => bcrypt('password'),
    ]);

    $token = $user->createToken('TestToken')->plainTextToken;

    $this->command->info("Test user created with email: testuser@example.com");
    $this->command->info("Token: $token");
}
Seed the user:

php artisan db:seed --class=UserSeeder
Note the token output in the terminal (e.g., eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsInR...)

Testing the API Endpoints
Using Postman
Open Postman and create a new request.
Add the Authorization header:
Key: Authorization
Value: Bearer <your_generated_token> (replace <your_generated_token> with the token from the seeder output).
Test any endpoint, e.g., creating a task:
Method: POST
URL: http://127.0.0.1:8000/api/tasks
Headers: Add the Authorization header as described above.
Body (JSON): {
    "title": "Sample Task",
    "description": "This is a sample task."
}

curl -X POST http://127.0.0.1:8000/api/tasks \
-H "Authorization: Bearer <your_generated_token>" \
-H "Content-Type: application/json" \
-d '{"title":"Sample Task", "description":"This is a sample task."}'

Common Endpoints
Here are some available endpoints you can test:

POST /api/tasks - Create a new task,
GET /api/tasks - Retrieve all tasks,
GET /api/tasks/{id} - Retrieve a single task,
PUT /api/tasks/{id} - Update a task,
DELETE /api/tasks/{id} - Delete a task,
