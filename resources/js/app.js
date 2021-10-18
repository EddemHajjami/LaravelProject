require('./bootstrap');

$('#addRestaurantModal').on('shown.bs.modal', function () {
    $('#addRestaurantModal').trigger('focus')
})
