function validateForm() {
    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let day = document.getElementById('day').value;
    let time = document.getElementById('time').value;
    let place = document.getElementById('place').value;
    let phonePattern = /^[0-9]{10}$/; // Basic validation for a 10-digit phone number
    
    // Validate Name (non-empty)
    if (name === "") {
        alert("Name is required!");
        return false;
    }

    // Validate Phone number (must be 10 digits)
    if (!phonePattern.test(phone)) {
        alert("Phone number must be 10 digits!");
        return false;
    }

    // Validate Day (non-empty)
    if (day === "") {
        alert("Day is required!");
        return false;
    }

    // Validate Time (non-empty)
    if (time === "") {
        alert("Time is required!");
        return false;
    }

    // Validate Place (non-empty)
    if (place === "") {
        alert("Place is required!");
        return false;
    }

    return true; // If everything is valid, submit the form
}