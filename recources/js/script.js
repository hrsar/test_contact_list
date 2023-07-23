$(document).ready(()=>{
    console.log(1)
    $('.send_btn').on('click', function () {
        let has_errors = false ;
        let all_data = {}
        $('.required').each(function (i, el) {
            if(!$(el).val()) {
                has_errors = true;
                $(el).addClass('is-invalid');
            } else {
                $(el).removeClass('is-invalid')
                all_data[$(el).attr('id')] = $(el).val()
            }
        })
        console.log(all_data)
        if(!has_errors) {
            $.ajax({
                url: "../../ajax.php",
                method: "post",
                data: {
                    action: 'add',
                    data : JSON.stringify(all_data)
                },
                success: function(response) {
                console.log(response)
                    if(response) {
                        let html = "<div class='current_contact p-3'><p class='label_text m-0'>"+all_data['name']+"<sup class ='del_contact_btn' data-id = '"+response+"'>  X</sup></p><p class='label_text m-0'>"+all_data['phone']+"</p></div>"
                        $('.contact_lists').prepend(html)
                        $('.required').val('');
                    }
                }
            });
        }
        
    })
    $('.contact_lists').on('click', '.del_contact_btn',function () {
        console.log('sfsdfs')
        let del_element = $(this).parents('.current_contact');
        let id = $(this).data('id')
        $.ajax({
            url: "../../ajax.php",
            method: "post",
            data: {
                action: 'del',
                data : id
            },
            success: function(response) {
            console.log(response)
                if(response) {
                    $(del_element).remove()
                }
            }
        });
        
        
    })
})