# Immediate Danger Indicator (IDI)

A web-based operational management system designed to help officers and team leaders monitor, assign, and manage emergency events in real time.

This project was built as a full-stack PHP application with a database-driven workflow for event management, officer registration, permissions, and emergency response coordination.

---

## Project Purpose

The application is designed for a security / emergency response workflow where users can:

- log in to the system
- create and manage events
- assign officers to specific operations
- filter and browse events by date or location
- view event details and operational information
- manage user permissions for different roles
- support emergency response actions such as reinforcement requests and alert messaging

The project focuses on operational visibility and team coordination, especially in scenarios where multiple events and responders need to be tracked efficiently.

---

## What This App Does

### 1. Authentication and user management
- Login page with email and password
- Session-based access control
- User and officer record linking
- Different permission levels for regular users vs. coordinators

### 2. Event management
- Add new events
- Edit or update existing events
- Track event title, type, location, date, time, risk level, and summary
- Show event cards in a dashboard list

### 3. Officer management
- Add officers to the system
- Connect officers to event teams
- Handle user registration and role assignment
- Support team-based operational grouping

### 4. Event dashboard
- Main landing page displaying all active or scheduled events
- Sort by date/time or location
- Filter by city/location
- Quick actions for edit, delete, and view details

### 5. Event detail page
- View full information about a specific event
- Show participating officers and team configuration
- Provide actions such as requesting reinforcements and sending alerts

### 6. Profile page
- View and update personal user profile
- Edit personal details such as email, password, and name

---

## Core Technologies Used

### Backend
- PHP for server-side logic and form handling
- MySQL database for storing users, officers, and event data
- Session management for authenticated access

### Frontend
- HTML5
- CSS3 for custom UI styling
- Bootstrap 5 for layout, forms, buttons, and responsive components
- JavaScript for interaction and UI behavior
- jQuery for DOM manipulation and dynamic behavior

### Additional assets and libraries
- Bootstrap Icons
- Google Fonts
- External CDN-based libraries for styling and UI
- JSON city data loaded from the project’s data folder

---

## Main Project Structure

- index.php – login page
- signup.php – registration page
- list.php – main dashboard of events
- form.php – add/edit event form
- event.php – detailed event information page
- profile.php – personal profile settings
- new_officer.php – officer assignment page
- action.php – backend processing logic for event actions
- delete.php – deletion logic
- config.php – app configuration constants
- css/style.css – custom visual styling
- java/scripts.js – JavaScript behavior and UI logic
- data/city.json – city list used for filtering
- images/ – visual assets

---

## Database and Data Model

The application uses database tables with names such as:

- tbl_206_users
- tbl_206_officers
- tbl_206_events

These tables are used to store:

- user login credentials
- officer profiles
- assigned teams
- permission flags
- event details like location, date, time, risk, and team assignments

The code also relies on SQL joins to connect user and officer information and to display dynamic event data.

---

## How the App Works

1. A user signs in from the login page.
2. A session is created and the user is redirected to the event dashboard.
3. The dashboard shows a list of events, sorted by date or location.
4. Users can view each event, update it, or create a new one.
5. Officers are assigned to events and grouped by operational team.
6. Certain actions are restricted based on user permissions.
7. The interface is built in Hebrew and uses a dashboard style layout.

---

## Security and Notes

This project demonstrates early-stage PHP web application development and includes:

- server-side form handling in PHP
- session-based user validation
- SQL queries for controlled data access
- role-based visibility for admin/coordinator features

It is a functional academic/demo project rather than a production-ready enterprise system.

---

## Setup Instructions

To run this project locally:

1. Place the project in a PHP-enabled server environment such as XAMPP, WAMP, or MAMP.
2. Create the MySQL database and import the required tables.
3. Configure the database connection in the project’s connection file.
4. Update the base URL in config.php if needed.
5. Start the local server.
6. Open the project in the browser and access the login page.

Example flow:

- Start Apache and MySQL
- Visit the project folder through localhost
- Access index.php to begin

---

## Interview Summary

This project shows that I can build:

- a full PHP-based web application
- database-driven business logic
- responsive UI with Bootstrap and custom CSS
- role-based access control and sessions
- data filtering, sorting, and management flows
- event-focused workflows for real-world operational systems

It combines backend logic, database integration, frontend interface design, and product workflow thinking in one project.

---

## Skills Demonstrated

- PHP development
- MySQL / SQL querying
- Frontend design with Bootstrap and CSS
- JavaScript and jQuery interactions
- Session-based authentication
- CRUD-style application flow
- Working with dynamic forms and dashboards
- Building UI for operational/management systems

---

## Final Reflection

This project represents a practical web application built around a real operational problem: managing incidents and emergency response teams efficiently. It reflects the ability to combine database work, backend logic, and user-focused interface design into a single working system.

