# Booking-System
Hairdressing Salon Booking System: A multi-purpose dynamic webpage with the booking system as its main component

Front-end components of web application:

1. User registration: Each user is able to make its own account through the registration page by inserting all login and personal information.
2. User authorization: Login sessions
3. Data: All data about the hairdressing salon are visible on the website. Some data found on the webpage are directly retrieved from the database, such as Services page containing the information about available services.
4. User Profile: There are 3 types of user profiles. After checking login session, user is directed to its particular profile.
5. Booking System: The booking page enables user to book an appointment. The page conducts all needed information that are to be acquired from the user for the preferred appointment, including types of services, a preferred employee as well as date and time of the appointment. 

The user is able to choose min 1 and max 3 services inside of one appointment. The entered information is redirected to the confirmation page where the total duration and total price are calculated, available time is chosen and the apppointment is inserted inside database.


Back-end of the application:

1. Web Administrator: Administrator is able to keep track of all employee’s schedules and business reports on its profile.
2. CRUD operations: Clients and employees are able to edit, manage their personal information and create and cancel the appointments through their profiles. Admin has a complete access to database related information found on the website.
3. Login Sessions: When logged in, sessions keep user’s id, role and username which are later on used to check the access rights on certain pages as well as display profile content according to the specific user.


Hairdressing Salon Booking System is built using HTML, CSS, JavaScript, PHP and a MySQL relational database.
