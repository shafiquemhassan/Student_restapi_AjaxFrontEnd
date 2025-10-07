
---

## 🧰 Tech Stack

- **Language:** PHP (PDO)
- **Database:** MySQL
- **Frontend:** HTML, jQuery AJAX
- **API Format:** JSON

---

## 📡 API Endpoints

| Action | Method | Endpoint | Description |
|--------|---------|-----------|-------------|
| Create | POST | `/student-rest-api/api_endpoint/insert.php` | Add new student |
| Read | GET | `/student-rest-api/api_endpoint/read.php` | Fetch all students |
| Update | POST | `/student-rest-api/api_endpoint/update.php` | Update student info |
| Delete | POST | `/student-rest-api/api_endpoint/delete.php` | Remove student record |

---

## 🧠 How to Run Locally

1. Clone the repo:
   ```bash
   git clone https://github.com/YOUR-USERNAME/student-rest-api.git
2-Place it inside your local server folder   
C:\xampp\htdocs\student-rest-api6

3 Start Apache & MySQL (XAMPP)
4 Create a database named login
5 Run this SQL query in phpMyAdmin

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    fname VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(100),
    contact VARCHAR(20)
);

6 Open http://localhost/student-rest-api/index.html
7 Test using Postman or your AJAX frontend
{
  "student_name": "Ali Khan",
  "student_fname": "Ahmed Khan",
  "student_address": "123 Main Street",
  "student_city": "Karachi",
  "student_state": "Sindh",
  "student_contact": "03001234567"
}

