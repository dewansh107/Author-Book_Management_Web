# Author-Book_Management_Web
This Laravel project provides a simple web application to manage Authors and their Books. It also includes an integrated Chatbot that can answer real-time questions using live database data.
🚀 Features

    ✅ Full CRUD operations for Authors

    ✅ Full CRUD operations for Books

    ✅ Each author can have multiple books

    ✅ Author list page shows number of books each author has

    ✅ Author detail page shows author info + all books

    ✅ Proper form validation for all create/update forms

    ✅ Integrated chatbot (fixed on bottom-right) that can answer:

        "How many authors are there?"

        "How many books are available?"

        "List top 5 authors."

🛠️ Technologies Used

    Laravel 10.x

    PHP 8.x

    MySQL

    Bootstrap 5

    JavaScript (for chatbot interaction)

📁 Folder Structure Highlights
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthorController.php
│   │   ├── BookController.php
│   │   └── ChatBotController.php
resources/
├── views/
│   ├── authors/
│   ├── books/
│   └── layout.blade.php
routes/
├── web.php

🧑‍💻 Setup Instructions (Clone and Run)

Follow these steps to run the project on your machine:
1️⃣ Clone the repository
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
2️⃣ Install Composer dependencies
composer install
3️⃣ Copy .env and generate app key
cp .env.example .env
php artisan key:generate
4️⃣ Configure .env for your database

Open .env and update these lines with your DB details:
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
5️⃣ Run migrations
php artisan migrate
6️⃣ Start the local server
php artisan serve
Then visit:
📍 http://127.0.0.1:8000



🙋‍♂️ Contributing

Pull requests are welcome. If you'd like to improve UI, add features, or fix bugs, feel free to fork and create a PR.
