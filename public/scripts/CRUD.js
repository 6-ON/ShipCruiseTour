$(function () {

    let modalHeader = $('#Modal h3')
    $('#createButton').on('click', function () {
        modalHeader.text(modalHeader.text().replace('Edit', 'Create'))

    })
    $('.edit-button').on('click', function () {
        modalHeader.text(modalHeader.text().replace('Create', 'Edit'))
    })
})
