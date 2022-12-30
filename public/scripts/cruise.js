$(function () {

    $('button[data-modal-toggle="Modal"]').on('click', function () {
        const id = $(this).val();
        if (id){
            $.get('/getCruise', {id: id}).done(function (response) {
                const cruise = response;
                $('#Modal input[name="label"]').val(cruise.label)
            })

        }
    })

    $('#createButton').on('click',function () {
        $('#Modal form').attr('action','/createCruise')
    })
    $('.edit-button').on('click', function () {
        $('#Modal form').attr('action','/editCruise')
    })
    $('createButton').on('click',function () {
    })
})