📚 BookTrackr – Laravel Book Tracking Application

BookTrackr is a simple Laravel web application that allows users to track their books, manage reading lists, and organize their personal library.
The project includes authentication, a dashboard, CRUD operations for books, and clean UI pages.

🚀 Features

User authentication (Login & Register)

Public pages (Home, About, Services, Contact)

Auth-protected dashboard

Add, edit, delete, and view books

Search and sort books

Clean and simple UI

REST API support (for future expansion)

🛠️ Tech Stack

Backend: Laravel

Frontend: Blade, CSS

Database: MySQL / SQLite

Authentication: Laravel Breeze

Version Control: Git & GitHub

📂 Project Structure (Important Parts)
app/
 ├── Http/Controllers/
 ├── Models/
resources/
 ├── views/
 ├── css/
routes/
 ├── web.php
 ├── api.php
public/
 ├── css/
 ├── images/

⚙️ Installation & Setup

Follow these steps to run the project locally:

1️⃣ Clone the repository
git clone https://github.com/your-username/book-tracker.git
cd book-tracker

2️⃣ Install dependencies
composer install
npm install
npm run build

3️⃣ Environment setup

Copy the example environment file:

cp .env.example .env


Generate the application key:

php artisan key:generate

4️⃣ Configure database

Edit .env and update:

DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

5️⃣ Run migrations
php artisan migrate

6️⃣ Start the server
php artisan serve


Visit:

http://127.0.0.1:8000

🔐 Authentication Flow

Public users: Can see Home, About, Services, Contact

Authenticated users:

Access Dashboard

Manage books (CRUD)

Books and dashboard are protected by middleware

📸 Screenshots (Optional)

Add screenshots here later

🧪 API Endpoints (Optional)

Example:

GET    /api/books
POST   /api/books
PUT    /api/books/{id}
DELETE /api/books/{id}

🚧 Future Improvements

Book categories

Reading status (To Read / Reading / Finished)

User profile management

Pagination & filters

Deployment

🤝 Contribution

This project is for learning and academic purposes.
Contributions are welcome.

📄 License

This project is open-source and free to use.

👤 Author

Ibtisam Kedir
Laravel Student & Web Developer
