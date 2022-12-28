$(function () {
    let modalHeader = $('#Modal h3')
    $('#createButton').on('click', function () {
        modalHeader.text(modalHeader.text().replace('Edit', 'Create'))
        $('#Modal input').val('')


    })
    $('.edit-button').on('click', function () {
         modalHeader.text(modalHeader.text().replace('Create', 'Edit'))
    })

    $('button[data-modal-toggle="deleteModal"]').on('click', function () {
        const id = $(this).val()
        $('#delete-cruise-confirm').val(id);

    })
})
