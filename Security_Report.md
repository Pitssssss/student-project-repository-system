# Security Report: Student Project Repository System

The Student Project Repository System was developed with security as a major consideration. Two common web application attacks addressed in this project are Cross-Site Request Forgery (CSRF) and Cross-Site Scripting (XSS).

CSRF is an attack where a malicious website tricks a user into performing unwanted actions on another website where they are already authenticated. To prevent this attack, the CodeIgniter 4 CSRF filter was enabled in the application's configuration. Every POST form in the system includes the CSRF token using the `csrf_field()` function. This generates a unique token that is verified by the server before processing any request. If the token is missing or invalid, the request is rejected with a 403 Forbidden response. This ensures that only legitimate requests originating from the application are accepted.

XSS is an attack where malicious scripts are injected into user inputs and executed in the browser of other users. To prevent XSS attacks, all user-generated content displayed in the system is escaped using the `esc()` function. During testing, the payload `<script>alert(1)</script>` was entered into the project title field. Instead of executing as JavaScript, the content was displayed as plain text, proving that output escaping successfully blocked the attack.

Additional security measures were implemented throughout the system. Uploaded files are validated by file type and file size before being stored. SMTP credentials are stored in the `.env` file and excluded from version control through `.gitignore`. Sensitive configuration files are not uploaded to GitHub.

Through the implementation of CSRF protection, XSS prevention, input validation, secure file handling, and proper credential management, the Student Project Repository System demonstrates secure coding practices and follows the security recommendations provided by CodeIgniter 4.
