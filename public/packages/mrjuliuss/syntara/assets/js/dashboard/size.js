$(function() 
{
    var nbInput = $('.input-group-addon').size() + 1;
    
    $(document).on('submit', '#create-size-form', function()
    {
        var sArray = $(this).serializeArray();
        $.ajax({
            "type": "POST",
            "url": window.location.href.toString(),
            data: sArray,
            "dataType": "json"
        }).done(function(result)
        {
            if(result.addSize === false)
            {
                if(typeof result.message !== 'undefined')
                {
                    showStatusMessage(result.message, result.messageType);
                    window.location = result.redirectUrl;
                }
                else if(typeof result.errorMessages !== 'undefined')
                {
                    showRegisterFormAjaxErrors(result.errorMessages);
                }
            }
            else
            {
                window.location = result.redirectUrl;
            }
        });

        return false;

    }).on('submit', '#edit-size-form', function()
    {
        var sArray = $(this).serializeArray();

        $.ajax({
            "type": "Post",
            "url": window.location.href.toString(),
            data: sArray,
            "dataType": "json",
            success: function(result)
            {
                if(typeof result.message !== 'undefined')
                {
                    showStatusMessage(result.message, result.messageType);
                    window.location = result.redirectUrl;
                }
                else if(typeof result.errorMessages !== 'undefined')
                {
                    showRegisterFormAjaxErrors(result.errorMessages);
                }
            }
        });

        return false;

    }).on('click', '#delete-item.groups', function()
    {
        $('#confirm-modal').modal();
        
    }).on('click', '.delete-group .confirm-action', function()
    {
        $.each($('.table tbody tr td input:checkbox:checked'), function( key, value ) 
        {
            $.ajax(
            {
                url: window.location.href.toString()+'/'+$(this).data('group-id'),
                type: "DELETE",
                datatype: "json"
            }).done(function(result)
            {
                showStatusMessage(result.message, result.messageType);
//                window.location = "/sadmin/size-management";
                window.location = window.location.href;
//                ajaxContent($(this).attr('href'), "#ajax_content", false);
            });
        });

        $('#confirm-modal').modal('hide');

    }).on('click', '#delete-item.users', function()
    {
        $.each($('.table tbody tr td input:checkbox:checked'), function( key, value ) 
        {
            $.ajax(
            {
                url: window.location.href.toString()+'/user/'+$(this).data('user-id'), 
                type: "DELETE"
            })
            .done(function(result)
            {
                showStatusMessage(result.message, result.messageType);
                ajaxContent($(this).attr('href'), ".ajax-content", false);
            });
        });
    }).on('click', '#add-user', function()
    {
        var userId = $("#ungrouped-users-list option:selected").val();
        var groupId = $("#ungrouped-users-list").data('group-id');

        $.ajax(
        {
            url: window.location.href.toString()+'/user/'+userId, 
            type: "POST",
            datatype: "json",
            data: { userId : userId, groupId : groupId }
        }).done(function(result)
        {
            showStatusMessage(result.message, result.messageType);
            ajaxContent($(this).attr('href'), ".ajax-content");
        });
    }).on('submit', '#feature-form', function()
    {
        var sArray = $(this).serializeArray();
        $.ajax({
            "type": "PUT",
            "url": window.location.href.toString(),
            "data": sArray,
            "dataType": "json"
        }).done(function(result)
        {
            if(typeof result.message !== 'undefined')
            {
                showStatusMessage(result.message, result.messageType);

                if(result.messageType == 'success')
                {
                    ajaxContent($(this).attr('href'), ".ajax-content", false);
                }
            }
            else if(typeof result.errorMessages !== 'undefined')
            {
                showRegisterFormAjaxErrors(result.errorMessages);
            }
        });

        return false;
    });
});