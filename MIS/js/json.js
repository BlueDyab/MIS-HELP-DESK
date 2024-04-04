
// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Function to handle animation on scroll
function animateOnScroll() {
    const elements = document.querySelectorAll('.animate-on-scroll');
    elements.forEach(element => {
        if (isInViewport(element)) {
            element.classList.add('show');
        }
    });
}

// Listen for scroll events and trigger animation
window.addEventListener('scroll', animateOnScroll);

// Trigger animation on initial page load
animateOnScroll();

// Prevent scroll event from bubbling up to parent elements
document.getElementById('overlayFormProfessor').addEventListener('scroll', function(e) {
e.stopPropagation();
});
// Open the overlay form when the button is clicked
document.getElementById('openFormBtnProfessor').addEventListener('click', function() {
    document.getElementById('overlayFormProfessor').style.display = 'flex';
    document.body.classList.add('overlay-open');
    });
    
    // Close the overlay form when the close button is clicked
    document.getElementById('closeFormBtnProfessor').addEventListener('click', function() {
    document.getElementById('overlayFormProfessor').style.display = 'none';
    document.body.classList.remove('overlay-open');
    });
    
    // Prevent scroll event from bubbling up to parent elements
    document.getElementById('overlayFormStudent').addEventListener('scroll', function(e) {
    e.stopPropagation();
    });

// student

// Open the overlay form when the button is clicked
document.getElementById('openFormBtnStudent').addEventListener('click', function() {
document.getElementById('overlayFormStudent').style.display = 'flex';
document.body.classList.add('overlay-open');
});

// Close the overlay form when the close button is clicked
document.getElementById('closeFormBtnStudent').addEventListener('click', function() {
document.getElementById('overlayFormStudent').style.display = 'none';
document.body.classList.remove('overlay-open');
});

// Prevent scroll event from bubbling up to parent elements
document.getElementById('overlayFormStudent').addEventListener('scroll', function(e) {
e.stopPropagation();
});


// Service

// Open the overlay form when the button is clicked
document.getElementById('openFormBtnService').addEventListener('click', function() {
    document.getElementById('overlayFormService').style.display = 'flex';
    document.body.classList.add('overlay-open');
    });
    
    // Close the overlay form when the close button is clicked
    document.getElementById('closeFormBtnService').addEventListener('click', function() {
    document.getElementById('overlayFormService').style.display = 'none';
    document.body.classList.remove('overlay-open');
    });
    
    // Prevent scroll event from bubbling up to parent elements
    document.getElementById('overlayFormService').addEventListener('scroll', function(e) {
    e.stopPropagation();
    });

    
// feedback

// Open the overlay form when the button is clicked
document.getElementById('openFormBtnFeedback').addEventListener('click', function() {
    document.getElementById('overlayFormFeedback').style.display = 'flex';
    document.body.classList.add('overlay-open');
    });
    
    // Close the overlay form when the close button is clicked
    document.getElementById('closeFormBtnFeedback').addEventListener('click', function() {
    document.getElementById('overlayFormFeedback').style.display = 'none';
    document.body.classList.remove('overlay-open');
    });
    
    // Prevent scroll event from bubbling up to parent elements
    document.getElementById('overlayFormFeedback').addEventListener('scroll', function(e) {
    e.stopPropagation();
    });
    


       // Open the overlay form when the button is clicked
document.getElementById('openFormBtnProfessorRoom').addEventListener('click', function() {
    document.getElementById('overlayFormProfessorRoom').style.display = 'flex';
    document.body.classList.add('overlay-open');
    });
    
    // Close the overlay form when the close button is clicked
    document.getElementById('closeFormBtnProfessorRoom').addEventListener('click', function() {
    document.getElementById('overlayFormProfessorRoom').style.display = 'none';
    document.body.classList.remove('overlay-open');
    });
    
    // Prevent scroll event from bubbling up to parent elements
    document.getElementById('overlayFormProfessorRoom').addEventListener('scroll', function(e) {
    e.stopPropagation();
    });
    

       // Open the overlay form when the button is clicked
document.getElementById('openFormBtnStudentRoom').addEventListener('click', function() {
    document.getElementById('overlayFormStudentRoom').style.display = 'flex';
    document.body.classList.add('overlay-open');
    });
    
    // Close the overlay form when the close button is clicked
    document.getElementById('closeFormBtnStudentRoom').addEventListener('click', function() {
    document.getElementById('overlayFormStudentRoom').style.display = 'none';
    document.body.classList.remove('overlay-open');
    });
    
    // Prevent scroll event from bubbling up to parent elements
    document.getElementById('overlayFormStudentRoom').addEventListener('scroll', function(e) {
    e.stopPropagation();
    });
    