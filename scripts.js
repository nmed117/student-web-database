// Handle adding a new student (assuming you have an HTML form with appropriate IDs)
document.getElementById('add-student-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const email = document.getElementById('email').value;

    // Send the data to the PHP backend via AJAX (using fetch)
    fetch('php/add_student.php', {
        method: 'POST',
        body: new URLSearchParams({
            'first_name': firstName,
            'last_name': lastName,
            'email': email
        }),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);  // Log success message
        alert('Student added!');
        // Optionally, you could update the page with the new student without reloading it
    })
    .catch(error => console.error('Error:', error));
});

// Delete a student (you can link this to a delete button on the page)
function deleteStudent(studentId) {
    if (confirm('Are you sure you want to delete this student?')) {
        fetch(`php/delete_student.php?student_id=${studentId}`, { method: 'GET' })
            .then(response => response.text())
            .then(data => {
                console.log(data);  // Log success message
                alert('Student deleted!');
                // Optionally, remove the student row from the table without reloading the page
            })
            .catch(error => console.error('Error:', error));
    }
}

// Fetch and populate students dropdown
fetch('php/fetch_students.php')
    .then(response => response.json())
    .then(data => {
        const studentSelect = document.getElementById('student-id');
        data.forEach(student => {
            const option = document.createElement('option');
            option.value = student.student_id; // ID from database
            option.textContent = `${student.first_name} ${student.last_name}`; // Display name
            studentSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error fetching students:', error));

// Fetch and populate courses dropdown
fetch('php/fetch_courses.php')
    .then(response => response.json())
    .then(data => {
        const courseSelect = document.getElementById('course-id');
        data.forEach(course => {
            const option = document.createElement('option');
            option.value = course.course_id; // ID from database
            option.textContent = course.course_name; // Display course name
            courseSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error fetching courses:', error));

// Fetch grades and populate table
fetch('php/fetch_grades.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.getElementById('grades-table').getElementsByTagName('tbody')[0];
        data.forEach(grade => {
            const row = tableBody.insertRow();
            row.insertCell(0).textContent = `${grade.first_name} ${grade.last_name}`;
            row.insertCell(1).textContent = grade.course_name;
            row.insertCell(2).textContent = grade.grade;
            const actionsCell = row.insertCell(3);
            actionsCell.innerHTML = `<button class="btn btn-danger" onclick="deleteGrade(${grade.student_id}, ${grade.course_id})">Delete</button>`;
        });
    })
    .catch(error => console.error('Error fetching grades:', error));

// Fetch enrollments and populate table
fetch('php/fetch_enrollments.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.getElementById('enrollments-table').getElementsByTagName('tbody')[0];
        data.forEach(enrollment => {
            const row = tableBody.insertRow();
            row.insertCell(0).textContent = `${enrollment.first_name} ${enrollment.last_name}`;
            row.insertCell(1).textContent = enrollment.course_name;
            const actionsCell = row.insertCell(2);
            actionsCell.innerHTML = `<button class="btn btn-danger" onclick="unenrollStudent(${enrollment.student_id}, ${enrollment.course_id})">Unenroll</button>`;
        });
    })
    .catch(error => console.error('Error fetching enrollments:', error));
