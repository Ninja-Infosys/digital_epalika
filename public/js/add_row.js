// Get the target element for the rows
const target_element = 'activities';

// Get the container element for the rows
const container = document.getElementById(target_element);

// Get the inputs for the first row
const inputs = container.querySelector('.activities-5').querySelectorAll('input, textarea');

// Define an array to store the data for each row
const data = [];

// Add an event listener to the "Add New Row" button
$('[data-toggle="add-more"]').on("click", function (e) {
    e.preventDefault();

    // Get the container element for the rows
    const container = document.getElementById(target_element);

    // Get the inputs for the last row
    const last_row = container.lastElementChild;
    const inputs = last_row.querySelectorAll('input, textarea');

    // Define an object to store the data for the last row
    const row_data = {};

    // Loop through the inputs for the last row and add their values to the object
    inputs.forEach(function (input) {
        const name = input.getAttribute('name');
        const value = input.value;
        row_data[name] = value;
    });

    // Add the object to the array of row data
    data.push(row_data);

    // Clone the content of the first row and append it to the container
    const new_row = container.querySelector('.activities-5').cloneNode(true);
    container.appendChild(new_row);
});

// Output the data when the form is submitted
document.getElementById('my-form').addEventListener('submit', function (e) {
    e.preventDefault();
    console.log(data);
});
