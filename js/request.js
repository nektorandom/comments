function quantComment() {

    $.ajax({
        type: 'POST',
        url: 'form.php?action=comment',
        success: function(response){
            $('strong').html(response);
        }   
    });
} 

function save(form, id_parent) {

    $.ajax({
        type: 'POST',
        url: 'form.php?action=add',
        data: $('#'+form).serialize()+'&idParent='+id_parent,
        success: function(response){
            $('.list-comments').html(response);
            quantComment();
        }   
    });
    document.getElementById(form).reset();   
}

function deleteComment(id) {

    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'form.php?action=delete',
        data: { get_id : id },
        success: function(response){
            $('#res').html('<span class="bg-success res">' + response + '</span>');
            quantComment();
        },
        error: function (response) {
            $('#res').html('<span class="bg-danger res">Ошибка при отправке формы</span>');
        }
    });
}
