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

**Requirements**
---------------

* PHP 7.4 or higher
* MySQL 5.7 or higher

**Installation**
---------------

1. Clone the repository:
```
git clone https://github.com/aliraza-sack/healthy-habitat-network.git
```
2. Create a new MySQL database and run the migraions to create tables.
```
php migrations/20250409_create_tables.php
```
Run this command to Drop all the tables.
```
php migrations/20250409_create_tables.php down
```

3. Update the `config/database.php` file with your database credentials and other settings
4. Go to the `public` directory
5. Start the application using `php -S localhost:8000`

**Usage**
---------

1. Register for an account or log in to an existing one
2. Browse the directory of local organizations and events
3. Filter and search for specific resources
4. Create and manage your own user profile and dashboard
5. Share resources and events on social media platforms

**Contributing**
------------

We welcome contributions to the Healthy Habitat Network project! If you're interested in contributing, please fork the repository and submit a pull request with your changes.

**License**
-------

This project is licensed under the MIT License. See `LICENSE` for details.

**Acknowledgments**
----------------

We would like to thank [list any contributors, organizations, or resources that have helped with the project].

**Contact**
---------

For questions, feedback, or support, please contact [your email address or other contact information].