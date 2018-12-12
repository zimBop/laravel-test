$('#modal-with-image').on('show.bs.modal', function (e) {
    let url = $(e.relatedTarget).data('url');
    let name = $(e.relatedTarget).data('name');
    $('#modal-title').text(name);
    $('#modal-image')
        .attr('src', url)
        .attr('alt', name);
});