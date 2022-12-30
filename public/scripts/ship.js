$('#createButton').on('click',function () {
    $('#Modal form').attr('action','/createShip')
})
$('.edit-button').on('click', function () {
    $('#Modal form').attr('action','/editShip')
})