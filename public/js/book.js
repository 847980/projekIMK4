document.addEventListener('DOMContentLoaded', function () {
    // Get all date points and time slots
    const datePoints = document.querySelectorAll('.date_point');
    const timeSlots = document.querySelectorAll('.showtime');
    const seats = document.querySelectorAll('.seat');

    // Function to handle date selection
    function handleDateSelection(event) {
        // Remove active class from all date points
        datePoints.forEach(point => {
            point.classList.remove('active');
        });

        // Add active class to the clicked date point if it's not already active
        if (!event.target.classList.contains('active')) {
            event.target.classList.add('active');
        } else {
            // If the clicked date point is already active, remove its active state
            event.target.classList.remove('active');
        }
    }

    // Function to handle time selection
    function handleTimeSelection(event) {
        // Remove active class from all time slots
        timeSlots.forEach(slot => {
            slot.classList.remove('active');
        });

        // Add active class to the clicked time slot if it's not already active
        if (!event.target.classList.contains('active')) {
            event.target.classList.add('active');
        } else {
            // If the clicked time slot is already active, remove its active state
            event.target.classList.remove('active');
        }
    }

    // Function to handle seat selection
    function handleSeatSelection(event) {
        const selectedSeat = event.target;

        if (!selectedSeat.classList.contains('booked')) {
            // Toggle selected class on click
            selectedSeat.classList.toggle('selected');
        }
    }

    // Add event listeners to each date point
    datePoints.forEach(point => {
        point.addEventListener('click', handleDateSelection);
    });

    // Add event listeners to each time slot
    timeSlots.forEach(slot => {
        slot.addEventListener('click', handleTimeSelection);
    });

    // Add event listeners to each seat
    seats.forEach(seat => {
        seat.addEventListener('click', handleSeatSelection);
    });
});
