// JavaScript code for handling form submission and displaying feedback list
const feedbackForm = document.getElementById('feedbackForm');
const feedbackList = document.getElementById('feedbackList');

feedbackForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const appointmentDate = document.getElementById('appointmentDate').value;
    const rating = document.getElementById('rating').value;
    const comments = document.getElementById('comments').value;

    // Create new feedback entry
    const feedbackEntry = document.createElement('div');
    feedbackEntry.classList.add('feedbackEntry');
    feedbackEntry.innerHTML = `
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Appointment Date/Time:</strong> ${appointmentDate}</p>
        <p><strong>Rating:</strong> ${rating}</p>
        <p><strong>Comments/Feedback:</strong> ${comments}</p>
    `;
    
    // Append feedback entry to feedback list
    feedbackList.appendChild(feedbackEntry);

    // Reset form fields
    feedbackForm.reset();
});
