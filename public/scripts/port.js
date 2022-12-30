$('#createButton').on('click',function () {
    $('#Modal form').attr('action','/createPort')
})
$('.edit-button').on('click', function () {
    $('#Modal form').attr('action','/editPort')
})