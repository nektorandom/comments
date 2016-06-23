$(function(){

    /*
    * Add comment, reply
    */
    $('body').on('click', '.btn-post', function() {

        var formId = $(this).parent().attr('id');
        var idVal = $(this).parent().parent().data('idcomment');

        save(formId, idVal);

        return false;

    })

    /*
    * Reply comment
    */
    $('body').on('click', '.reply', function() {

        if ( $('#reply') ) {
            $('#reply').remove();
        }

        var level = 1;
        var levelVal = $(this).parent().data('lvl');
        var idComment = $(this).parent().data('id');

        if ( levelVal != '' ) {
            level += levelVal;
        }

        $(this).parent().after('<div data-idcomment="'+ idComment + '"><form id="reply" style="margin-left: ' + (level * 50) + 'px;"><textarea class="form-control" rows="4" placeholder="Add a reply..." name="comment"></textarea><button type="submit" class="btn btn-primary btn-post">Reply</button><button type="submit" class="btn btn-default btn-cancel">Cancel</button></form></div>');

        return false;
    })

    /*
    * Cancel comment
    */
    $('body').on('click', '.btn-cancel', function()  {

        $('#reply').remove();
        return false;
    })

    /*
    * Delete comment
    */
    $('body').on('click', '.close', function() {

        var idVal = $(this).parent().parent().data('id');
        var parentIdVal = $(this).parent().parent().data('parentid');
        var compareParentId;

        function deleteChild (id) {

            deleteComment(id);

            $('.child-comment[data-parentId="' + id + '"]').each(function() {

                compareParentId = $(this).data('id');

                $(this).hide('slow', function(){
                    $(this).remove();
                });

                deleteChild(compareParentId);
            })
        }

        deleteChild(idVal);

        $(this).parent().parent().hide('slow', function(){
            $(this).remove();
        });

        setTimeout( function() { $('.res').remove() } , 2000 );

    })


})