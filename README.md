
# library-reservation-system
We are expanding our previous project into a comprehensive system designed for both students and library staff to improve efficiency and resource management.

Technology Stack<br>
JavaScript: Manages client-side validation, handles AJAX requests for real-time room availability, and triggers interactive UI alerts.<br>
CSS: Custom styling used to create distinct, responsive layouts for both the Admin and Student dashboards.<br>
PHP: Handles server-side logic, processes form data, manages user sessions for authentication, and facilitates communication with the SQL database.<br>
MySQL (XAMPP): Used for database management, storing information for the library reservation system, including user credentials and facility booking records.


Student <br> 
focuses on a collision-free booking process through a sequential selection logic:<br>
Authentication: Students register or log in using their Student ID and password.<br>

Sequential Booking: To prevent two users from booking the same schedule,<br> the process follows these steps:<br>
Select Date: Choose the intended day of use.<br>
Choose Time: Select an available time slot.<br>
Pick Room/Place: The system only displays rooms available for that specific date and time.<br>

Admin <br>
The administrative view provides oversight and ensures accountability for all university facilities<br>
Pending Requests: Staff can review, approve, or deny student reservation requests directly from the dashboard.<br>
Usage Logs: Admins can track historical data to see who last used a room—essential for managing maintenance or addressing damages.<br>

## System Diagrams

### Use Case Diagram
<img src="assets/images/usecase digram.png" width="400" alt="Use Case Diagram">

### Class Diagram
<img src="assets/images/Classdiagram.png" width="200" alt="System Class Diagram">

    











