$(function () {
    $('.reserve-btn').on('click',function () {
        const id = $(this).val()
        $('#reserve-confirm').val(id)
    })
})