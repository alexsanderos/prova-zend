$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);

    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);
    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');

    $(this).find('.modal-footer #confirm').data('form', form);
});

$('#modal-edit').on('show.bs.modal', function (e) {
     if($(this).find('.modal-body form')){
         $(this).find('form').remove();
     }

     var id_clicado = $(e.relatedTarget).parent().parent().find('#id_edit').text();
     var nome_clicado = $(e.relatedTarget).parent().parent().find('#nome_edit').text();

     var form = $('<form/>').attr({
          id: "form-edit",
          method: "POST",
          action: "/prova-zend-js/public/home/pessoas/edit/"+id_clicado
     });
     var id = $('<input/>').attr({
         type: "hidden",
         name: "id",
         value: id_clicado
     });
     var nome = $('<input/>').attr({
         type: "text",
         name: "nome",
         value: nome_clicado
     });
     var submit = $('<input/>').attr({
         type: "submit",
         name: "submit"
     });
     form.append(id);
     form.append(nome);
     form.append(submit);

    $(this).find('.modal-body').append(form);

});


$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
   $(this).data('form').submit();
});
