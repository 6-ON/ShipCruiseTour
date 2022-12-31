$(function () {


    let modalHeader = $('#Modal h3')
    $('#createButton').on('click', function () {
        modalHeader.text(modalHeader.text().replace('Edit', 'Create'))


    })
    $('.edit-button').on('click', function () {
         modalHeader.text(modalHeader.text().replace('Create', 'Edit'))
        const id = $(this).val()
        $('#id-item').attr('value',id)
    })

    $('button[data-modal-toggle="deleteModal"]').on('click', function () {
        const id = $(this).val()
        $('#delete-confirm').val(id);

    })
})
