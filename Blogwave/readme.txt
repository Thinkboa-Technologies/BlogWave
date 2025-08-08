Installation Steps
1.	Download/clone the repository into your server’s root folder (htdocs).
2.	Import the provided blogs.sql database file into MySQL.
3.	Update includes/db.php with your DB credentials.
4.	Start Apache & MySQL server (e.g., via XAMPP).
5.	Access the project in browser: http://localhost/blogwave.

A dynamic, user-friendly blogging platform where anyone can post and read stories.
**Designed & Developed by ** Shakti Barnwal ** blending style, simplicity, and security.

BlogWave is a dynamic, user-friendly blogging platform created to connect writers and readers in a seamless online space.
The platform is open for anyone to explore blog posts without needing an account.
However, users who wish to contribute their own content can register and log in to create, edit, and manage their posts.
A separate Admin Panel gives administrators full control over the website, including managing users, posts, and key site pages.


#Features:

Public
•	View all blog posts
•	Read full details of a post
•	Contact admin via contact form
•	View About and Services pages
User (after login)
•	Add new blog posts
•	Edit their own posts
•	Delete their own posts
Admin
•	Full control over posts (edit, delete any post)
•	Manage user accounts
•	Update Services and About page content
•	View and respond to contact messages from users

Technology Stack
 1. Frontend:
Designed with HTML5, CSS3, and Bootstrap for responsive layouts.
Enhanced interactivity using JavaScript and jQuery.
2. Backend:
Developed in PHP for dynamic content handling and secure data operations.
3. Database:
Built with MySQL for reliable data storage and retrieval.
4 Security:
•	Passwords hashed using PHP’s password_hash() function.
•	SQL queries protected with prepared statements to prevent SQL injection.
•	Role-based access control to distinguish between admin, user, and public permissions.
•	File upload validation for images to prevent malicious uploads.


WorkFlow:
1.	Visitor lands on homepage → Can browse posts, view details, visit Home Services, blogs and contact admin.
2.	User registers/logs in → Gains access to add/edit/delete their posts.
3.	Admin logs in → Can manage all posts, users, and static pages, plus read messages etc.





