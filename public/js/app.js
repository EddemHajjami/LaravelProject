require('./bootstrap.min');

$('#addRestaurantModal').on('shown.bs.modal', function () {
    $('#addRestaurantModal').trigger('focus')
})
