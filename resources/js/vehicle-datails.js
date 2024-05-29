document.getElementById('vehicle-label').addEventListener('click', function() {
    var vehicleDetails = document.getElementById('vehicle-details');
    if (vehicleDetails.style.display === 'none') {
        vehicleDetails.style.display = 'block';
    } else {
        vehicleDetails.style.display = 'none';
    }
});
