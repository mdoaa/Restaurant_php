# Project Setup Instructions

Follow these steps to successfully set up and run the project:

## Prerequisites
- XAMPP installed on your system.

## Steps

1. **Start XAMPP:**
   - Open the XAMPP Control Panel.

     ```bash
     # Example command to start XAMPP Control Panel
     C:\xampp\xampp-control.exe
     ```

2. **Access phpMyAdmin:**
   - Open your web browser and navigate to [http://localhost/phpmyadmin/].

3. **Create Database:**
   - In phpMyAdmin, create a new database called `system`.

     ```sql
     -- Example SQL query to create a database
     CREATE DATABASE IF NOT EXISTS system;
     ```

4. **Run the Project:**
   - Copy all project files into the `htdocs` directory within your XAMPP installation directory.

     ```bash
     # Example path to the project directory
     C:\xampp\htdocs\Final_soft
     ```

   - Open your web browser and go to [http://localhost/Final_soft].

5. **Success:**
   - The project is now accessible at [http://localhost/Final_soft].

