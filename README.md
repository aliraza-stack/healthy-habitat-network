**Healthy Habitat Network**
==========================

**Overview**
------------

Healthy Habitat Network is a web application designed to promote healthy living and sustainability in local communities. The application allows users to connect with local organizations, events, and resources that support healthy living and environmental sustainability.

**Features**
------------

* User registration and login system
* Database-driven directory of local organizations and events
* Filtering and search functionality for easy discovery
* User profiles and dashboard for tracking activity
* Integration with social media platforms for sharing and promotion

**Key Features (2025 Update)**
-----------------------------
- Company contact info now stored as separate columns (email, phone, address) in the database for easier access and management.
- Modernized company creation and display forms with improved UI/UX.
- Product listing page displays all product details (name, description, size/quantity, health benefits, price category, company, votes), with company names fetched dynamically.
- Added About Us and Contact Us pages, accessible via `/about` and `/contact` routes.
- Secure authentication: login/signup links hidden when logged in, logout hidden when not logged in.

**Usage**
---------
- Visit `/companies` to browse companies, `/companies/create` to add a new company (requires login).
- Visit `/products` for all products, with search and sort options (UI only, backend filtering coming soon).
- Use `/about` and `/contact` for informational and contact pages.

**Recent Improvements**
----------------------
- Refactored companies table and model: contact info split into `contact_email`, `contact_phone`, and `contact_address`.
- Updated all forms, controllers, and services to use the new structure.
- Fixed undefined property errors in product listings.
- Improved error handling and code organization.

**Requirements**
---------------

* PHP 7.4 or higher
* MySQL 5.7 or higher

**Installation & Setup**
-----------------------
1. **Clone the repository:**
   ```sh
   git clone https://github.com/aliraza-sack/healthy-habitat-network.git
   cd healthy-habitat-network
   ```
2. **Set up environment variables:**
   - Copy or create a `.env` file at the project root:
     ```sh
     cp .env.example .env
     # or manually edit .env with your settings
     ```
   - Update your database and app settings in `.env`.
3. **Create the database and tables:**
   - Create a new MySQL database.
   - Use the migration command below to create tables.

**Database Management (Migrations & Seeds)**
--------------------------------------------
All database commands are run from the project root using the `start` dispatcher:

- **Run all new migrations:**
  ```sh
  php start migrate
  ```
- **Rollback the last migration batch:**
  ```sh
  php start rollback
  ```
- **Run all seed files:**
  ```sh
  php start seed
  ```

**Directory Structure:**
```
db/
  ├── migrations/   # Each migration as a separate file, named with timestamp and action
  ├── schema/       # schema.sql (updated on every migration change)
  └── seeds/        # Seed files for inserting data
```

**Starting the Application**
---------------------------

From the project root, run:
```sh
php start
```
- The app will start on [http://localhost:8000](http://localhost:8000) by default.

To use a custom port (e.g., 3000):
```sh
php start -p=3000
```

**Contributing & Feedback**
--------------------------
Pull requests and suggestions are welcome! For issues, use the GitHub issues page or the contact form in the app.

**License**
-------

This project is licensed under the MIT License. See `LICENSE` for details.

**Acknowledgments**
----------------

We would like to thank [aliraza-sack](https://github.com/aliraza-sack) for their contributions.

**Contact**
---------

For questions, feedback, or support, please contact aliraxayasin@gmail.com.