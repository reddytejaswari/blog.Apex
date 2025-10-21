READY-TO-RUN PHP Blog App (my_blog)
----------------------------------
Steps to run:
1. Make sure XAMPP is installed and Apache + MySQL are running.
2. Copy folder 'my_blog' to C:\xampp\htdocs\
3. Open http://localhost/phpmyadmin and create a database named 'blog'
4. Import the SQL file 'blog.sql' (optional - file included but empty schema also created by create_admin)
   - Alternatively you can run the SQL below manually.
5. Visit: http://localhost/my_blog/create_admin.php to create the admin user (username: admin / password: admin123)
6. Open http://localhost/my_blog in your browser.
Notes:
- Default DB user is root with no password.
- After creating admin, you may delete create_admin.php for security.
