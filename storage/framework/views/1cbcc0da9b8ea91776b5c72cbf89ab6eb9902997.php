<?php $__env->startSection('title'); ?> <?php echo e(__('locale.apartment_sale')); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>  <?php echo e(translate('User show')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
#chat_area
{
	min-height: 500px;
	max-height: 50vh;
	overflow-y: auto;
}

#chat_history
{
    width: 100%;
	height: 79%; 
	overflow-y: auto; 
	margin-bottom:16px; 
	background-color: #ffffff;
	padding: 16px;
}

#user_list
{
	min-height: 500px; 
	max-height: 50vh; 
	overflow-y: auto;
	padding: 0 5px;
}
.sender_chat
{
    background-color: #94B2EB !important;
    border-radius: 20px !important;
}
.recever_chat
{
    background-color: #E8F0FF !important;
    border-radius: 20px !important;
}
.content_center {
  display: flex;
  justify-content: center !important;
  align-items: center !important; 

}

.chatIsThreeInput {
	border-radius: 3px !important;
}
.fz-10{
    font-size: 10px;
}
.list-group-item:first-child{
    border-top: 1px solid #DEE2E6 !important;
}
.list-group-item:last-child{
    border-bottom: 1px solid #DEE2E6 !important;
}
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-9 d-flex align-items-center">                            
                            <h4 class="me-3">
                                <?php echo e(translate('Chat')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            
                

            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 pr-0" id="group"></div>
                                <div class="col-md-6" id="chat_header"></div>
                            </div>
                            <div class="profileChartChat pt-0 mt-0" id="chat_area"></div>
                                
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="allUsersProfile rounded">
                                <h5 class="text-center mt-2 MoyiZadachiTextCartGreenH5"><?php echo e(translate('My team')); ?></h5>
                                <div  id="user_list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    let page_name = 'chats';

    $(document).on('keyup', '#message_area', function(e) {
                e.preventDefault()
                if(e.which == 13) {
                    $('#send_button').trigger('click')
                }
    });


    // var conn = new WebSocket('http://businesshouse-kg.icstroy.com:30000/?token=<?php echo e(auth()->user()->token); ?>');

    var conn = new WebSocket('ws://162.55.134.175:1213/?token=<?php echo e(auth()->user()->token); ?>');

    var from_user_id = "<?php echo e(Auth::user()->id); ?>";

    var to_user_id = "";

    conn.onopen = function(e) {
        console.log("new connection ");

        load_connected_chat_user(from_user_id);
    };
    
    conn.onmessage = function(e) {


        var data = JSON.parse(e.data); 

        if(data.response_connected_chat_user)
        {
            var html = '<div class="list-group">';

            if(data.data.length > 0)
            {
                for(var count = 0; count < data.data.length; count++)
                {
                    console.log(data.data[count]);
                    html += `
                    <a href="#" class="list-group-item rounded d-flex justify-content-between align-items-start border mb-1" onclick="make_chat_area(`+data.data[count].id+`, '`+data.data[count].first_name+`'); load_chat_data(`+from_user_id+`, `+data.data[count].id+`); ">
                        <div class="d-flex align-items-center">
                    `;

                    var last_seen = '';
                    last_seen = data.data[count].last_seen;
                    if(data.data[count].user_image == null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`;
                       
                    }
                    else
                    {
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.data[count].id+`/s_`+data.data[count].user_image+`" " class="rounded-circle avatar-sm" />`;
                    }

                    html += user_image+`
                            <div class="ms-2">
                                <b><small>`+data.data[count].name+`</small></b>
                                <small class="fz-10 text-muted last_seen" id="last_seen_`+data.data[count].id+`">`+data.data[count].user_role_name+`</small>
                            </div>
                        </div>
                    </a>
                    `;
                }
            }
            else
            {
                html += 'No User Found';
            }

            

            html += '</div>';
            document.getElementById('user_list').innerHTML = html;
            document.getElementById('group').innerHTML = `<button type="button" id="close_chat_group" class="btn  float-end one_chat" onclick="make_group_chat_area(); load_group_chat_data(`+from_user_id+`);"><?php echo e(translate("General chat")); ?></button>`;
            document.getElementById('chat_header').innerHTML = `<button type="button" id="close_chat" class="btn  float-end  group_chat" onclick="close_chat();"><?php echo e(translate("Private chat")); ?></button>`;


            var html = `
            <div id="chat_history"></div>
            <div class="input-group">
                <input type="text" class="chatIsThreeInput mt-0 form-control" id="message_area" placeholder="<?php echo e(translate("quick response")); ?>">
                <button type="button" class="btn btn-success d-none" id="send_button" onclick="send_group_chat_message()"><i class="fas fa-paper-plane"></i></button>
            </div>
            `;

            document.getElementById('chat_area').innerHTML = html;

            var data = {
            from_user_id : from_user_id,
            type : 'request_connected_group_chat_user_history'
            };
            console.log(data);
            conn.send(JSON.stringify(data));



            // load_chat_data();
            // load_chat_data(`+from_user_id+`);
            // check_unread_message();
        }
        if(data.message)
        {
            console.log('camne');
            console.log(data);
            var html = '';

            if(data.from_user_id == from_user_id)
            {
                html += `
                <div class="row">
                    <div class="col col-2">&nbsp;</div>
                    <div class="col col-10 alert  text-dark sender_chat">
                        <div class="row">
                            <div class="col-md-10">
                                <b>
                                    `+data.sender_connection[0].first_name+` `+data.sender_connection[0].last_name+`
                                </b> <br>
                               `+data.message+`
                            </div>
                            <div class="col-md-2">
                            `

                            
                if(data.sender_connection[0].avatar== null)
                {
                    user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>"" class="rounded-circle avatar-sm" />`
                }
                else{
                    user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection[0].avatar+`" " class="rounded-circle avatar-sm" />`
                }

                html += `
                 `+user_image+` <br> 
                    <b>
                      `+data.time+`
                    </b>
                           </div>
                        </div>
                    </div>
                </div>
                    `;
                              
                            
            }
            else
            {
                // console.log(to_user_id);
                if(to_user_id != '')
                {

                    html += `
                    <div class="row">
                        <div class="col col-9 alert  text-dark recever_chat">
                            <div class="row">
                                <div class="col-md-2">
                                `
                if(data.sender_connection[0].avatar== null)
                {
                    user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" " class="rounded-circle avatar-sm" />`
                }
                else{
                    user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection[0].avatar+`" " class="rounded-circle avatar-sm" />`
                }
                    html += `
                    &nbsp; `+user_image+`
                                </div>
                                <div class="col-md-10">
                                    <b>
                                       `+data.sender_connection[0].first_name+`,`+data.sender_connection[0].last_name+`
                                    </b> <br>
                                    `+data.message+`
                                    <b style="float:right">`+data.time+`</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                                
                            


                }
                else
                {
                    var count_unread_message_element = document.getElementById('user_unread_message_'+data.from_user_id+'');
                    if(count_unread_message_element)
                    {
                        var count_unread_message = count_unread_message_element.textContent;
                        if(count_unread_message == '')
                        {
                            count_unread_message = parseInt(0) + 1;
                        }
                        else
                        {
                            count_unread_message = parseInt(count_unread_message) + 1;
                        }
                        count_unread_message_element.innerHTML = '<span class="badge bg-primary rounded-pill">'+count_unread_message+'</span>';

                    }
                }
                
            }

            if(html != '')
            {
                var previous_chat_element = document.querySelector('#chat_history');

                var chat_history_element = document.querySelector('#chat_history');

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
                // scroll_top();
            }
            
        }
        if(data.chat_history)
        {
            var html = '';

            for(var count = 0; count < data.chat_history.length; count++)
            {
                if(data.chat_history[count].user_from_id == from_user_id)
                {
                    html += `
                    <div class="row">
                        <div class="col col-2">&nbsp;</div>
                        <div class="col col-10 alert  text-dark sender_chat">
                            <div class="row">
                                <div class="col-md-10">
                                    <b>
                                        `+data.sender_connection.first_name+` `+data.sender_connection.last_name+`
                                    </b> <br>
                                    `+data.chat_history[count].text+`
                                </div>
                                <div class="col-md-2">
                                `

                                
                    if(data.sender_connection.avatar== null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" " class="rounded-circle avatar-sm" />`
                    }
                    else{
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.chat_history[count].user_from_id+`/s_`+data.sender_connection.avatar+`" class="rounded-circle avatar-sm" />`
                    }

                    html += `
                      `+user_image+`
                        <b>
                        `+data.chat_history[count].time+`
                        </b>                        
                            </div>
                            </div>
                        </div>
                    </div>
                        `;   
                }
                else
                {

                    html += `
                    <div class="row">
                        <div class="col col-9 alert  text-dark recever_chat">
                            <div class="row">
                                <div class="col-md-2">
                                `
                    if(data.receiver_connection.avatar== null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`
                    }
                    else{
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.chat_history[count].user_from_id+`/s_`+data.receiver_connection.avatar+`" class="rounded-circle avatar-sm" />`
                    }
                    html += `
                    &nbsp; `+user_image+`
                                </div>
                                <div class="col-md-10">
                                    <b>
                                       `+data.receiver_connection.first_name+``+data.receiver_connection.last_name+`
                                    </b> <br>
                                    `+data.chat_history[count].text+`
                                    <b style="float:right" class"time">`+data.chat_history[count].time+`</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                    var count_unread_message_element = document.getElementById('user_unread_message_'+data.chat_history[count].from_user_id+'');

                    if(count_unread_message_element)
                    {
                        count_unread_message_element.innerHTML = '';
                    }
                }
            }

            document.querySelector('#chat_history').innerHTML = html;

            // scroll_top();
        }
        if(data.group_message)
        {
            console.log('camne');
            console.log(data);
            var html = '';

            if(data.from_user_id == from_user_id)
            {
                html += `
                <div class="row">
                    <div class="col col-2">&nbsp;</div>
                    <div class="col col-10 alert  text-dark sender_chat">
                        <div class="row">
                            <div class="col-md-10">
                                <b>
                                    `+data.sender_connection.first_name+`,`+data.sender_connection.last_name+`
                                </b> <br>
                               `+data.group_message+`
                               
                            </div>
                            <div class="col-md-2">
                            `

                            
                if(data.sender_connection.avatar== null)
                {
                    user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`
                }
                else{
                    user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection.avatar+`" class="rounded-circle avatar-sm" />`
                }

                html += `
                 `+user_image+`
                 <b>
                    `+data.time+`
                 </b>
                           </div>
                        </div>
                    </div>
                </div>
                    `;
                              
                            
            }
            else
            {

                    html += `
                    <div class="row">
                        <div class="col col-9 alert recever_chat text-dark ">
                            <div class="row">
                                <div class="col-md-2">
                                `
                    if(data.sender_connection.avatar== null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`
                    }
                    else{
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection.avatar+`" class="rounded-circle avatar-sm" />`
                    }



                    html += `
                    &nbsp; `+user_image+`
                                </div>
                                <div class="col-md-10">
                                    <b>
                                       `+data.sender_connection.first_name+`,`+data.sender_connection.last_name+`
                                    </b> <br>
                                    `+data.group_message+`
                                    <span style="float:right">`+data.time+`</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                
            }

            if(html != '')
            {
                var previous_chat_element = document.querySelector('#chat_history');

                var chat_history_element = document.querySelector('#chat_history');

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
            }
            
        }
        if (data.group_chat_history) {
            console.log(data);
            var html = '';

            for(var count = 0; count < data.group_chat_history.length; count++)
            {
                // console.log(data.group_chat_history[count].user_from_id);
                if(data.group_chat_history[count].user_from_id == from_user_id)
                {


                    html += `
                    <div class="row">
                        <div class="col col-2">&nbsp;</div>
                        <div class="col col-10 alert  text-dark sender_chat">
                            <div class="row">
                                <div class="col-md-10">
                                    <b>
                                        `+data.group_chat_history[count].first_name+` `+data.group_chat_history[count].last_name+`
                                    </b> <br>
                                    `+data.group_chat_history[count].text+`
                                </div>
                                <div class="col-md-2">
                                `

                                
                    if(data.group_chat_history[count].avatar== null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`
                    }
                    else{
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.group_chat_history[count].user_from_id+`/s_`+data.group_chat_history[count].avatar+`"  class="rounded-circle avatar-sm" />`
                    }

                    html += `
                        `+user_image+`<br>
                        <b>
                        `+data.group_chat_history[count].time+`
                        </b>
                            </div>
                            </div>
                        </div>
                    </div>
                        `;   


                    
                }
                else
                {
                    html += `
                    <div class="row">
                        <div class="col col-9 alert recever_chat text-dark ">
                            <div class="row">
                                <div class="col-md-2">
                                `
                    if(data.group_chat_history[count].avatar== null)
                    {
                        user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-sm" />`
                    }
                    else{
                        user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.group_chat_history[count].user_from_id+`/s_`+data.group_chat_history[count].avatar+`" class="rounded-circle avatar-sm" />`
                    }
                    html += `
                    &nbsp; `+user_image+`
                                </div>
                                <div class="col-md-10">
                                    <b>
                                       `+data.group_chat_history[count].first_name+` `+data.group_chat_history[count].last_name+`
                                    </b> <br>
                                    `+data.group_chat_history[count].text+`
                                    <b style="float:right">`+data.group_chat_history[count].time+`</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                }
            }

            document.querySelector('#chat_history').innerHTML = html;
        }


    };

    function load_connected_chat_user(from_user_id)
    {
        var data = {
            from_user_id : from_user_id,
            type : 'request_connected_chat_user'
        };

        conn.send(JSON.stringify(data));
    }


    function make_chat_area(user_id, to_user_name)
    {
        var html = `
        <div id="chat_history"></div>
        <div class="input-group">
            <input type="text" class="chatIsThreeInput mt-0 form-control" id="message_area" placeholder="<?php echo e(translate("quick response")); ?>"> 
            <button type="button" class="btn btn-success d-none" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
        </div>
        `;



        document.getElementById('chat_header').innerHTML = `<button type="button" id="close_chat" class="btn  float-end group_chat" onclick="make_chat_area(`+user_id+`, '`+to_user_name+`'); load_chat_data(`+from_user_id+`, `+user_id+`);">`+to_user_name+`</button>`;

        document.getElementById('chat_area').innerHTML = html;
        // document.getElementById('close_chat_group').style.backgroundColor="#17a2b8";
        // document.getElementById('close_chat').style.backgroundColor="#92b0e8";

        document.getElementById('close_chat_group').style.backgroundColor="#94B2EB";
        document.getElementById('close_chat_group').style.color="#ffffff";
        document.getElementById('close_chat').style.backgroundColor="#ffffff";
        document.getElementById('close_chat').style.color="#000000";


        // document.getElementById('chat_header').innerHTML = '<b>'+to_user_name+'</b>';

        // document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

        to_user_id = user_id;
    }


    function make_group_chat_area()
    {
        var html = `
        <div id="chat_history"></div>
        <div class="input-group">
            <input type="text" class="chatIsThreeInput mt-0 form-control" id="message_area" placeholder="<?php echo e(translate("quick response")); ?>">
            <button type="button" class="btn btn-success d-none" id="send_button" onclick="send_group_chat_message()"><i class="fas fa-paper-plane"></i></button>
        </div>
        `;

        document.getElementById('chat_area').innerHTML = html;
        // document.getElementById('close_chat_group').style.backgroundColor="#94B2EB";
        // document.getElementById('close_chat_group').style.color="#ffffff";
        // document.getElementById('close_chat').style.backgroundColor="#ffffff";
        // document.getElementById('close_chat').style.color="#000000";

        document.getElementById('close_chat_group').style.backgroundColor="#ffffff";
        document.getElementById('close_chat_group').style.color="#000000";
        document.getElementById('close_chat').style.backgroundColor="#94B2EB";
        document.getElementById('close_chat').style.color="#ffffff";

    }
    function send_group_chat_message()
    {
        
        document.querySelector('#send_button').disabled = true;

        var message = document.getElementById('message_area').value.trim();

        var data = {
            message : message,
            from_user_id : from_user_id,
            type : 'request_send_group_chat_message'
        };
        console.log(data);
        conn.send(JSON.stringify(data));

        document.querySelector('#message_area').value = '';

        document.querySelector('#send_button').disabled = false;
    }

    function load_group_chat_data()
    {
        var data = {
            from_user_id : from_user_id,
            type : 'request_connected_group_chat_user_history'
        };
        console.log(data);
        conn.send(JSON.stringify(data));
    }
    function send_chat_message()
    {
        console.log();
        document.querySelector('#send_button').disabled = true;

        var message = document.getElementById('message_area').value.trim();

        var data = {
            message : message,
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            type : 'request_send_message'
        };

        conn.send(JSON.stringify(data));

        document.querySelector('#message_area').value = '';

        document.querySelector('#send_button').disabled = false;
    }
    function load_chat_data(from_user_id, to_user_id)
    {
        var data = {
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            type : 'request_chat_history'
        };

        conn.send(JSON.stringify(data));
    }
    function close_chat()
    {



        html= `
               <div class="row">
                    <div class=" col-md-12 text-dark text-center" style="margin-top: 100px;" >
                    <b>
                        <?php echo e(translate("There is nothing here yet")); ?>

                        </b>  <br> 
                        <b class="">
                        <?php echo e(translate('Select a user to write to him')); ?> 
                    </b>
                         
                    </div>
                </div>
                    `;

        document.getElementById('chat_area').innerHTML = html;
        // document.getElementById('close_chat_group').style.backgroundColor="#17a2b8";
        // document.getElementById('close_chat').style.backgroundColor="#92b0e8";


        document.getElementById('close_chat_group').style.backgroundColor="#94B2EB";
        document.getElementById('close_chat_group').style.color="#ffffff";
        document.getElementById('close_chat').style.backgroundColor="#ffffff";
        document.getElementById('close_chat').style.color="#000000";


    }
    
</script>
   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/user/chat.blade.php ENDPATH**/ ?>