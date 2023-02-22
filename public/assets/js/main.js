$(document).ready(function (){

    console.log(page)
    console.log(baseUrl)
    if(page=='tables'){
        getAllTables()
        $('#searchTables').on('click',filterTables)
        $('#resetTables').on('click',getAllTables)
    }
    if(page=='admin'){
        $('#showAllActivity').on('click',getAllActivity)
        $('#showAllUsers').on('click',getAllUsers)
        $('#createNewUser').on('click', userCreate)
        $('#showAllTables').on('click',getAllAdminTables)
        $('#showAllAds').on('click',showAllAds)
        $('#createNewAdd').on('click', printAdForm)
        $('#showAllMessages').on('click',getAllMessages)
        $('#showAllSocials').on('click',showAllSocials)
        $('#createNewSocial').on('click', printSocForm)
        $('#showAllComments').on('click',getAllComments)
        $('#showAllSystems').on('click',showAllSystems)
        $('#createNewSystem').on('click', printSysForm)
    }
    if(page.startsWith('table/')){
        console.log('starts with')
        getCommentsForTable()
        $('#commSubmit').on('click',submitComment)
        $('#commAjax').css('display','none')
    }
    if(page=='contact'){
        $('#submit').on('click',submitEmail)
        $('#emailError').css('display','none')
        $('#subjectError').css('display','none')
        $('#messageError').css('display','none')
    }
})
const token = $('meta[name="csrf-token"]').attr('content');

function ajaxCallback(url, method, data, success) {
    $.ajax({
        headers: {'X-CSRF-TOKEN': token},
        url: baseUrl + url,
        method: method,
        data: data,
        dataType: 'json',
        success: success,
        error:function(xhr,data){
            //console.log(xhr.responseText)
            console.log(xhr.status)
            console.log(data)
        }
    })
}

///////// COMMENTS ON TABLES ///////////

function submitComment(){
    let text = $('#commentOnTable').val().trim()
    console.log(text)
    let userId = $('#sessionUserId').val()
    let tableId = $('#tableId').val()
    console.log(userId)
    console.log(tableId)
    let errors = 0;
    if(text==null || text==''){
        $('#commAjax').css('display','block')
        errors++;
    }
    if(errors==0){
        ajaxCallback(
            '/comments',
            'post',
            {
                'text':text,
                'userId':userId,
                'tableId':tableId
            },
            function (data) {
                getCommentsForTable()
            }
        )
    }

}

function getCommentsForTable(){
    let tableId = $('#tableId').val()
    let sessionUserId = $('#sessionUserId').val()
    console.log(sessionUserId)
    ajaxCallback(
        '/comments/'+tableId,
        'get',
        {
            'tableId':tableId
        },
        function (data){
            console.log('komentari')
            console.log(data)
            printComments(data, sessionUserId)
        }
    )
}

function printComments(data, sessionUserId){
    let html=``
    for(let d of data){
        html+=`<div class="col-12 d-flex flex-row align-items-center justify-content-between">
    <div class="col-12 d-flex flex-column commentBorder mt-2 p-2">
        <div class="d-flex justify-content-end align-items-center">
            <i class="fa-solid fa-calendar pr-2 pl-2"></i> ${d.created_at}`

        if(d.user_id == sessionUserId){
            html+=`
            <a href="${baseUrl+'/comments/'+d.id+'/edit'}" class="mr-2"><i class="far fa-edit ml-2 pr-2 pl-2"></i>edit</a>
               <a href="" class="deleteCommentOnPost mr-2" data-id="${d.id}"><i class="far fa-trash-alt pr-2"></i>delete</button></a>
               `
        }
        else if(d.tabowner == sessionUserId){
            html+=`<a href="" class="deleteCommentOnPost mr-2" data-id="${d.id}"><i class="far fa-trash-alt ml-2 pr-2"></i>delete</button></a>`
        }
            html+=`</div>
        <div class="d-flex">
            <div class="d-flex flex-column justify-content-center align-items-center col-3">
                <img src="${baseUrl+'/assets/img/'+d.userimg}" alt="" class="img-fluid postIco mb-1">
                <p><a href="${baseUrl+'/account/'+d.user_id}">${d.username}</a></p>
            </div>
            <div class="d-flex align-items-center p-2 col-9">
                <p>${d.text}</p>
            </div>

        </div>
    </div>
</div>`
    }
    $('#commentsDiv').html(html)
    $('.deleteCommentOnPost').on('click',deleteCommentOnPost)
}

function deleteCommentOnPost(e){
    e.preventDefault()
    console.log('delete comment')
    let id = this.dataset.id
    console.log(id)
    ajaxCallback(
        '/comments/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getCommentsForTable()
        }
    )
}

///////// MAIL ///////////

function submitEmail(e){
    e.preventDefault()
    console.log('submit email')
    let email = $('#email').val()
    let subject = $('#subject').val()
    let message = $('#message').val().trim()
    console.log(email)
    console.log(subject)
    console.log(message)
    let errors = 0;
    let regexMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    if(!regexMail.test(email)){
        $('#emailError').css('display','block')
        errors++;
    }else{
        $('#emailError').css('display','none')
    }
    if(subject==null || subject==''){
        $('#subjectError').css('display','block')
        errors++;
    }else{
        $('#subjectError').css('display','none')
    }
    if(message==null || message==''){
        $('#messageError').css('display','block')
        errors++;
    }else{
        $('#messageError').css('display','none')
    }

    if(errors==0){
        ajaxCallback(
            '/contactMail',
            'get',
            {
                'email':email,
                'subject':subject,
                'message':message
            },
            function (data){
                storeEmail(email,subject,message)
                $("#contactFeedback").text(data.feedback)
                $("#contactFeedback").addClass("alert-success")
            }
        )
    }

}

function storeEmail(email,subject,message){
    console.log('store email')
        ajaxCallback(
            '/contact',
            'post',
            {
                'email':email,
                'subject':subject,
                'message':message
            },
            function (data){
                console.log('stored message')
            }
        )
}

///////// ADMIN ///////////

// email regex : ^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$
// username regex : /^[a-z0-9_-]{4,20}$/
// password regex : /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
// sys regex : /[A-Za-z\s\d\:?]+/

///////////////////// admin activity

function getAllActivity(e){
    e.preventDefault()
    ajaxCallback(
        '/allactivity',
        'get',
        {},
        function (data){
            console.log(data)
            printAllActivity(data.data)
        }
    )
}

function printAllActivity(data){
    let html=`
        <div class="m-4">
            <h2>Activity</h2>
        </div>
        <div id="date-picker-example" class="mb-3 md-form md-outline input-with-post-icon datepicker">
            <input type="date" class="form-control" id="filterDate" placeholder="Choose Date...">
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">IP</th>
            <th scope="col">Page</th>
            <th scope="col">Username</th>
            <th scope="col">Activity</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>`
    for(let d of data){
        html+=`<tr>
            <th scope="row">${d.split("\t")[0]}</th>
            <td>${d.split("\t")[1]}</td>
            <td>${d.split("\t")[2]}</td>
            <td>${d.split("\t")[3]}</td>
            <td>${d.split("\t")[4]}</td>
        </tr>`
    }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('#filterDate').on('change',filterActivity)
}

function filterActivity(){
    console.log('sort activity')
    let filter = $('#filterDate').val()
    console.log(filter)
    ajaxCallback(
        '/allactivity',
        'get',
        {
            'filter':filter
        },
        function (data){
            console.log(data)
            printAllActivity(data.data)
        }
    )
}

///////////////////// admin tables

function getAllAdminTables(e){
    e.preventDefault()
    ajaxCallback(
        '/alltables',
        'get',
        {},
        function (data){
            console.log(data)
            printAllAdminTables(data)
        }
    )
}

function printAllAdminTables(data){
    let html=`
        <div class="m-4">
            <h2>Tables</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Owner</th>
            <th scope="col">Created At</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`
        for(let d of data){
            html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.name}</td>
            <td>${d.user.username}</td>
            <td>${formatDate(d.created_at)}</td>
            <td class="text-center"><a href="#" class="editTable mr-2" data-id="${d.id}" ><i class="fa-solid fa-pen-to-square adminLinks"></i></a></td>
            <td class="text-center"><a href="#" class="deleteTable mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
        }

    html+=`</tbody>`

    $('#adminContent').html(html)

    $('.editTable').on('click', editTable)
    $('.deleteTable').on('click', deleteTable)
}

function deleteTable(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/alltables/'+id,
        'delete',
        {
            'id':id
        },
        function (data) {
            getAllAdminTables(e)
        }
    )
}

function editTable(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/alltables/'+id+'/edit',
        'get',
        {
            'id':id
        },
        function (data){
            printEditTableForm(data)
        }
    )
}

function printEditTableForm(data){
    let html=`
<div class="m-4">
            <h2>Tables</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="tableFeedback">
                                </div>
                    <form enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="name" value="${data.name}">
                            <label for="email" class="form-label mt-2">Name</label><br>
                            <div id="nameError" class="invalid-form">
                                Name required.
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                        <textarea class="form-control mt-1 contxt" name="about" id="about" rows="3">${data.about}</textarea>
                        <label for="email" class="form-label mt-2">Description</label><br>
                        <div id="aboutError" class="mt-2 invalid-form">
                            Description required.
                        </div>
                    </div>
                        <div class="form-group mt-4">
                            <input type="hidden" id="tableId" value="${data.id}">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="tableUpdateForm" name="">Update Table</button>
                        </div>
                    </form>
                </div>`
    $('#adminContent').html(html)
    $('#tableUpdateForm').on('click',updateTable)
    $('#nameError').css('display','none')
    $('#aboutError').css('display','none')

}

function updateTable(e){
    e.preventDefault()
    let id = $('#tableId').val()
    let name = $('#name').val()
    let about = $('#about').val()
    console.log(about)
    let errors=0
    if(name==null || name==''){
        $('#nameError').css('display','block')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(about==null || about==''){
        $('#aboutError').css('display','block')
        errors++;
    }else{
        $('#aboutError').css('display','none')
    }
    if(errors==0){
        console.log('aight')
    }
    ajaxCallback(
        '/alltables/'+id,
        'post',
        {
            'name':name,
            'about':about,
            '_method':'put'
        },
        function (data){
            $('#tableFeedback').text('Updated successfully.')
            $('#tableFeedback').addClass('alert-success')
        }
    )
}

///////////////////// admin users

function getAllUsers(e){
    e.preventDefault()

    ajaxCallback(
        "/allaccounts",
        'get',
        {},
        function(data){
            printAllUsers(data)
        }
    )
}

function printAllUsers(data){
    let html=`
        <div class="m-4">
            <h2>Users</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
            <th scope="col">Role</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`
    if(data.length==0){
        html+=`<td colspan="8">No users found.</td>`
    }
    else{
        for(let d of data){
            html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.username}</td>
            <td>${d.email}</td>
            <td>${formatDate(d.created_at)}</td>`

            if(d.role_id==1){
                html+=`<td>admin</td>`
            }else{
                html+=`<td>user</td>`
            }

            html+=`
            <td class="text-center"><a href="#" class="editUser mr-2" data-id="${d.id}" ><i class="fa-solid fa-pen-to-square adminLinks"></i></a></td>
            <td class="text-center"><a href="#" class="deleteUser mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
        }
    }
    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.editUser').on('click', editUser)
    $('.deleteUser').on('click', deleteUser)

}

function formatDate(date){
    let dt = new Date(date);
    let formated = dt.toLocaleDateString()
    return formated
}

function userCreate(e){
    e.preventDefault()
    ajaxCallback(
        '/allaccounts/create',
        'get',
        {},
        function (data){
            printUserForm(data.roles)
        }
    )
}

function printUserForm(roles){
    console.log(roles)
    let html=`
<div class="m-4">
            <h2>Users</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="userFeedback">
</div>
       <form >
                    <div class="form-group mt-4">
                        <input type="text" class="form-control form-control-lg" id="username" name="username" value="">
                        <label for="username" class="form-label mt-2 mb-0">Username</label><br>
                        <p class=" small ">Username can only contain letters and numbers, between 4 and 20 characters.</p>
                        <div id="usernameError" class="invalid-form">
                                Username required.
                            </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control form-control-lg" id="email" name="email" value="">
                        <label for="email" class="form-label mt-2">Email</label>
                        <div id="emailError" class="invalid-form">
                                Email required.
                            </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                        <label for="password" class="form-label mt-2 mb-0">Password</label>
                        <p class=" small">Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, special character, and at least 1 digit.</p>
                        <div id="passwordError" class="invalid-form">
                                Password required.
                            </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control form-control-lg" id="rePassword" name="password_confirmation">
                        <label for="rePassword" class="form-label mt-2"> Repeat Password</label>
                        <div id="passwordRepeatError" class="invalid-form">
                                Password doesn't match.
                            </div>
                    </div>
                    <div class="form-outline form-white ">
                        <select class="custom-select form-control mt-2 mb-2" id="role" name="role">`

                        for(let role of roles){
                            html+=`
                                <option value="${role.id}">${role.name}</option>
                            `
                        }
                        html+=`</select>
                        <label for="rePassword" class="form-label"> Role </label>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-outline-dark btn-lg px-5 mb-5" id="createUser" name="">Create User</button>
                    </div>
                    </form>
        </div>`

    $('#adminContent').html(html)
    $('#usernameError').css('display','none')
    $('#emailError').css('display','none')
    $('#passwordError').css('display','none')
    $('#passwordRepeatError').css('display','none')

    $('#createUser').on('click',storeUser)
}

function storeUser(e){
    e.preventDefault()
    console.log('store user')
    let role = $('#role').val()
    console.log(role)
    let username = $('#username').val().trim()
    let email = $('#email').val().trim()
    let password = $('#password').val().trim()
    let repeatPassword = $('#rePassword').val().trim()

    //////
    let regexUsername = /^[a-z0-9_-]{4,20}$/
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    let regexPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
    //////
    let errors=0
    if(!regexUsername.test(username)){
        $('#usernameError').css('display','block')
        $('#usernameError').text('Incorrect format.')
        errors++;
    }else{
        $('#usernameError').css('display','none')
    }
    if(!regexEmail.test(email)){
        $('#emailError').css('display','block')
        $('#emailError').text('Incorrect format.')
        errors++;
    }else{
        $('#emailError').css('display','none')
    }
    if(!regexPassword.test(password)){
        $('#passwordError').css('display','block')
        $('#passwordError').text('Incorrect format.')
        errors++;
    }else{
        $('#passwordError').css('display','none')
    }
    if(password!=repeatPassword || repeatPassword==''){
        $('#passwordRepeatError').css('display','block')
        errors++;
    }else{
        $('#passwordRepeatError').css('display','none')
    }
    if(errors==0){
        ajaxCallback(
            '/allaccounts',
            'post',
            {
                'username':username,
                'email':email,
                'password':password,
                'role':role
            },
            function (data){
                $('#userFeedback').text('Submission successful.')
                $('#userFeedback').addClass('alert-success')
            }
        )
    }
}

function editUser(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allaccounts/'+id+'/edit',
        'get',
        {
            'id':id
        },function (data) {
            console.log(data)
            printEditForm(data.roles,data.user)
        }
    )
}

function printEditForm(roles,data){
    let html=`
<div class="m-4">
            <h2>Users</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="userFeedback">
</div>
       <form >
                    <div class="form-group mt-4">
                        <input type="text" class="form-control form-control-lg" id="username" name="username" value="${data.username}">
                        <label for="username" class="form-label mt-2 mb-0">Username</label><br>
                        <p class=" small ">Username can only contain letters and numbers, between 4 and 20 characters.</p>
                        <div id="usernameError" class="invalid-form">
                                Username required.
                            </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                        <label for="password" class="form-label mt-2 mb-0">Password</label>
                        <p class=" small">Password must be at least 8 characters, contain at least 1 lowercase, at least 1 uppercase letter, special character, and at least 1 digit.</p>
                        <div id="passwordError" class="invalid-form">
                                Password required.
                            </div>
                    </div>
                    <div class="form-outline form-white ">
                        <select class="custom-select form-control mt-2 mb-2" id="role" name="role">`

    for(let role of roles){
        if(role.id==data.role_id){
            html+=`<option value="${role.id}" selected>${role.name}</option>`
        }else{
            html+=`<option value="${role.id}">${role.name}</option>`
        }
    }
    html+=`</select>
                        <label for="rePassword" class="form-label"> Role </label>
                    </div>
                    <div class="form-group mt-4">
                    <input type="hidden" id="userId" value="${data.id}">
                        <button type="submit" class="btn btn-outline-dark btn-lg px-5 mb-5" id="updateUser" name="">Update User</button>
                    </div>
                    </form>
        </div>`

    $('#adminContent').html(html)
    $('#usernameError').css('display','none')
    $('#passwordError').css('display','none')
    $('#updateUser').on('click',updateUser)
}

function updateUser(e){
    e.preventDefault()
    let id = $('#userId').val()
    let role = $('#role').val()
    let username = $('#username').val().trim()
    let password = $('#password').val().trim()
    let data= new FormData()
    data.append('role_id',role)
    //////
    let regexUsername = /^[a-z0-9_-]{4,20}$/
    let regexPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
    //////
    let errors=0
    if(!regexUsername.test(username)){
        $('#usernameError').css('display','block')
        $('#usernameError').text('Incorrect format.')
        errors++;
    }else{
        $('#usernameError').css('display','none')
        data.append('username',username)
    }
    if(password!='' && !regexPassword.test(password)){
        $('#passwordError').css('display','block')
        $('#passwordError').text('Incorrect format.')
        errors++;
    }else{
        $('#passwordError').css('display','none')
    }
    if(password!=''){
        data.append('password',password)
    }
    if(errors==0){
        data.append('_method','put')
        for (var pair of data.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }
        $.ajax({
            headers: {'X-CSRF-TOKEN': token},
            url: baseUrl + '/allaccounts/'+id,
            method: 'post',
            processData: false,
            contentType: false,
            data: data,
            dataType: 'json',
            success: function (data){
                $('#userFeedback').text('Update successful.')
                $('#userFeedback').addClass('alert-success')
            },error:function(xhr,data){
                //console.log(xhr.responseText)
                console.log(xhr.status)
                console.log(data)
            }
        })
    }
}

function deleteUser(e){
    e.preventDefault();
    let id = this.dataset.id
    ajaxCallback(
        '/allaccounts/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getAllUsers(e)
        }
    )
}
///////////////////// admin ads

function showAllAds(e){
    e.preventDefault()
    getAllAds()
}

function getAllAds(){

    ajaxCallback(
        "/allads",
        'get',
        {},
        function(data){
            printAds(data)
        }
    )
}

function printAds(data){
    let html=`<div class="m-4">
            <h2>Ads</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Link</th>
            <th scope="col">Text</th>
            <th scope="col">Image</th>
            <th scope="col">Active</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`

        for(let d of data){
            console.log(d)
            html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.link}</td>
            <td>${d.text}</td>
            <td><img src="${baseUrl+'/assets/img/'+d.image}" class="carouselImages adminTableImg"></td>`
            if(d.active){
                html+=`<td>Yes</td>`
            }else{
                html+=`<td>No</td>`
            }

           html+= `<td class="text-center"><a href="#" class="editAd mr-2" data-id="${d.id}" ><i class="fa-solid fa-pen-to-square adminLinks"></i></a></td>
            <td class="text-center"><a href="#" class="deleteAd mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
        }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.deleteAd').click(deleteAd)
    $('.editAd').click(editAd)

}

function printAdForm(e, data=null){
    console.log(data)
    let html=`
<div class="m-4">
            <h2>Ads</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="adFeedback">
                                </div>
                    <form enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="text"`

        if(data!=null){
            html+=`value="${data.text}"`
        }

        html+= ` name="text">
                            <label for="email" class="form-label mt-2">Text</label><br>
                            <div id="textError" class="invalid-form">
                                Text required.
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="link" `
        if(data!=null){
            html+=`value="${data.link}"`
        }

            html+= `name="link">
                            <label for="link" class="form-label mt-2">Link</label><br>
                            <div id="linkError" class="invalid-form">
                                Link required.
                            </div>
                        </div>
                        <div>
                            <input type="file" class="form-control mt-2 pb-2" id="image" name="userImg">
                            <label for="image" class="form-label mt-2">Image</label><br>
                            <div id="imageError" class="invalid-form">
                                Image required.
                            </div>
                        </div>

                        <div>
                            Active:<br>`
                if(data!=null && data.active == 1){
                    html+=`
                    <input class="form-check-input" type="radio" name="activity" value="1" checked>
                                <label class="form-check-label" for="inlineRadio2">Yes</label><br>
                                <input class="form-check-input" type="radio" name="activity" value="0">
                                <label class="form-check-label" for="inlineRadio1">No</label><br>
                    `
                }
                else if(data!=null && data.active == 0){
                    html+=`
                    <input class="form-check-input" type="radio" name="activity" value="1" >
                                <label class="form-check-label" for="inlineRadio2">Yes</label><br>
                                <input class="form-check-input" type="radio" name="activity" value="0" checked>
                                <label class="form-check-label" for="inlineRadio1">No</label><br>
                    `
                }
                else{
                    html+=`
                    <input class="form-check-input" type="radio" name="activity" value="1" >
                                <label class="form-check-label" for="inlineRadio2">Yes</label><br>
                                <input class="form-check-input" type="radio" name="activity" value="0">
                                <label class="form-check-label" for="inlineRadio1">No</label><br>
                    `
                }

                    html+=`
                                <div id="activityError" class="invalid-form">
                                    Activity required.
                                </div>
                        </div>`

                        if(data!=null){
                            html+=`<div class="form-group mt-4">
                            <input type="hidden" id="adId" value="${data.id}">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="adupdateform" name="">Update</button>
                        </div>`
                        }else{
                            html+=`<div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="adcreateform" name="">Submit</button>
                        </div>`
                        }
                        `
                    </form>
                </div>`
    $('#adminContent').html(html)
    $('#textError').css('display','none')
    $('#linkError').css('display','none')
    $('#imageError').css('display','none')
    $('#activityError').css('display','none')

    $('#adcreateform').on('click',submitAd)
    $('#adupdateform').on('click',updateAd)

}

function submitAd(e){
    e.preventDefault()
    console.log('create ad')
    let image = document.getElementById("image").files[0]
    console.log(image)
    let text = $('#text').val().trim()
    let link = $('#link').val().trim()
    console.log(text)
    console.log(link)
    let activeChb=``
    let sendData = new FormData()
    let errors = 0
    if(document.querySelector("input[name=activity]:checked")){
        let activeChb = document.querySelector("input[name=activity]:checked").value
        $('#activityError').css('display','none')
        console.log(activeChb)
        sendData.append('activity',activeChb)
    }else{
        $('#activityError').css('display','block')
        errors++
    }
    if(document.getElementById("image").files[0]){
        $('#imageError').css('display','none')
        sendData.append('image',image)
    }else{
        $('#imageError').css('display','block')
        errors++
    }
    if(text==null || text==''){
        $('#textError').css('display','block')
        errors++;
    }else{
        $('#textError').css('display','none')
        sendData.append('text',text)
    }
    if(link==null || link==''){
        $('#linkError').css('display','block')
        errors++;
    }else{
        $('#linkError').css('display','none')
        sendData.append('link',link)
    }
    if(errors==0){
        $.ajax({
            headers: {'X-CSRF-TOKEN': token},
            url: baseUrl + '/allads',
            method: 'post',
            processData: false,
            contentType: false,
            data: sendData,
            dataType: 'json',
            success: function (data){

                $('#adFeedback').text('Submission successful.')
                $('#adFeedback').addClass('alert-success')
            },
            error:function(xhr,data){
                //console.log(xhr.responseText)
                console.log(xhr.status)
                console.log(data)
            }
        })
    }


}

function deleteAd(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allads/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getAllAds()
        }
    )
}

function editAd(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allads/'+id+'/edit',
        'get',
        {
            'id':id
        },
        function (data){
            printAdForm(e,data)
            console.log(data)
        }
    )
}

function updateAd(e){
    e.preventDefault()
    console.log('update')
    let image = document.getElementById("image").files[0]
    let text = $('#text').val().trim()
    let link = $('#link').val().trim()
    let id = $('#adId').val()
    let sendData = new FormData()
    let errors = 0
    if(document.querySelector("input[name=activity]:checked")){
        let activeChb = document.querySelector("input[name=activity]:checked").value
        $('#activityError').css('display','none')
        console.log(activeChb)
        sendData.append('activity',activeChb)
    }else{
        $('#activityError').css('display','block')
        errors++
    }
    if(document.getElementById("image").files[0]){
        $('#imageError').css('display','none')
        sendData.append('image',image)
    }
    if(text==null || text==''){
        $('#textError').css('display','block')
        errors++;
    }else{
        $('#textError').css('display','none')
        sendData.append('text',text)
    }
    if(link==null || link==''){
        $('#linkError').css('display','block')
        errors++;
    }else{
        $('#linkError').css('display','none')
        sendData.append('link',link)
    }

    sendData.append('_method','put')
    console.log(sendData.values())
    for (var pair of sendData.entries()) {
        console.log(pair[0]+ ' = ' + pair[1]);
    }
    if(errors==0){
        $.ajax({
            url: '/allads/'+id,
            method: 'post',
            headers: {'X-CSRF-TOKEN': token},
            processData: false,
            contentType: false,
            dataType: 'json',
            data:sendData,
                success: function (data){
                    console.log(data)
                    $('#adFeedback').text('Update successful.')
                    $('#adFeedback').addClass('alert-success')
                },
                error:function(xhr,data){
                    //console.log(xhr.responseText)
                    console.log(xhr.status)
                    console.log(data)
                }
        }
        )
    }

}

//////////////// admin game systems

function showAllSystems(e){
    e.preventDefault()
    getAllSystems()
}

function getAllSystems(){
    ajaxCallback(
        '/allsystems',
        'get',
        {},
        function (data){
            printSystems(data)
        }
    )
}

function printSystems(data){
    let html=`<div class="m-4">
            <h2>Game Systems</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Update</th>
        </tr>
        </thead>
        <tbody>`

    for(let d of data){
        console.log(d)
        html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.name}</td>
            <td class="text-center"><a href="#" class="editSys mr-2" data-id="${d.id}" ><i class="fa-solid fa-pen-to-square adminLinks"></i></a></td>
        </tr>`
    }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.editSys').click(editSys)
}

function printSysForm(e,data=null){
    let html=`
<div class="m-4">
            <h2>Game Systems</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="sysFeedback">
                                </div>
                    <form enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="name"`

    if(data!=null){
        html+=`value="${data.name}"`
    }

    html+= ` name="text">
                            <label for="email" class="form-label mt-2">Name</label><br>
                            <div id="nameError" class="invalid-form">
                                Name required.
                            </div>
                        </div>`

    if(data!=null){
        html+=`<div class="form-group mt-4">
                            <input type="hidden" id="sysId" value="${data.id}">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="sysupdateform" name="">Update</button>
                        </div>`
    }else{
        html+=`<div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="syscreateform" name="">Submit</button>
                        </div>`
    }
    `
                    </form>
                </div>`
    $('#adminContent').html(html)
    $('#nameError').css('display','none')
    $('#syscreateform').on('click',submitSys)
    $('#sysupdateform').on('click',updateSys)

}

function submitSys(e){
    e.preventDefault()
    let name = $('#name').val()
    let errors=0
    let regexName = /[A-Za-z\s\d:?]{3,}/
    if(!regexName.test(name)){
        $('#nameError').css('display','block')
        $('#nameError').text('Incorrect format, title must have at least 3 characters.')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(name==null || name==''){
        $('#nameError').css('display','block')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(errors==0){
        ajaxCallback(
            '/allsystems',
            'post',
            {
                'name':name
            },
            function (data){
                $('#sysFeedback').text(data.feedback)
                $('#sysFeedback').addClass('alert-success')
            }
        )
    }
}

function editSys(e){
    e.preventDefault();
    let id = this.dataset.id
    ajaxCallback(
        '/allsystems/'+id+'/edit',
        'get',
        {
            'id':id
        },
        function (data){
            printSysForm(e,data)
        }
    )
}

function updateSys(e){
    e.preventDefault()
    let id = $('#sysId').val()
    let name = $('#name').val()
    let errors=0
    let regexName = /[A-Za-z\s\d:?]{3,}/
    if(!regexName.test(name)){
        $('#nameError').css('display','block')
        $('#nameError').text('Incorrect format, title must have at least 3 characters.')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(name==null || name==''){
        $('#nameError').css('display','block')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(errors==0){
        ajaxCallback(
            '/allsystems/'+id,
            'post',
            {
                'name':name,
                '_method':'put'
            },
            function (data){
                $('#sysFeedback').text(data.feedback)
                $('#sysFeedback').addClass('alert-success')
            }
        )
    }

}

//////////////// admin comments

function getAllComments(){
    ajaxCallback(
        "/allcomments",
        'get',
        {},
        function(data){
            printAllComments(data)
        }
    )
}

function printAllComments(data){
    let html=`<div class="m-4">
            <h2>Comments</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Comment</th>
            <th scope="col">Username</th>
            <th scope="col">Created At</th>
            <th scope="col">Table</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`
    for(let d of data){
        let date = new Date(d.created_at)
        let formated = date.toLocaleString()
        html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.text}</td>
            <td>${d.username}</td>
            <td>${formated}</td>
            <td>${d.tablename}</td>
            <td class="text-center"><a href="#" class="deleteComment mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
    }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.deleteComment').on('click',deleteComment)
}

function deleteComment(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allcomments/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getAllComments()
        }
    )
}

//////////////// admin messages

function getAllMessages(){
    ajaxCallback(
        "/allmessages",
        'get',
        {},
        function(data){
            printMessages(data)
        }
    )
}

function printMessages(data){
    let html=`<div class="m-4">
            <h2>Messages</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Created At</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`
    for(let d of data){
        let date = new Date(d.created_at)
        let formated = date.toLocaleString()
        html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.email}</td>
            <td>${d.subject}</td>
            <td>${d.message}</td>
            <td>${formated}</td>
            <td class="text-center"><a href="#" class="deleteMessage mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
    }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.deleteMessage').on('click',deleteMessage)
}

function deleteMessage(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allmessages/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getAllMessages()
        }
    )
}

//////////////// admin socials

function showAllSocials(e){
    e.preventDefault()
    getAllSocials()
}

function getAllSocials(){
    ajaxCallback(
        '/allsocials',
        'get',
        {},
        function (data){
            printSocials(data)
        }
    )
}

function printSocials(data){
    let html=`<div class="m-4">
            <h2>Socials</h2>
        </div>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Link</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>`

    for(let d of data){
        console.log(d)
        html+=`<tr>
            <th scope="row">${d.id}</th>
            <td>${d.name}</td>
            <td>${d.link}</td>
            <td class="text-center"><a href="#" class="editSoc mr-2" data-id="${d.id}" ><i class="fa-solid fa-pen-to-square adminLinks"></i></a></td>
            <td class="text-center"><a href="#" class="deleteSoc mr-2" data-id="${d.id}" ><i class="fa-solid fa-trash adminLinks"></i></a></td>
        </tr>`
    }

    html+=`</tbody>`

    $('#adminContent').html(html)
    $('.deleteSoc').on('click',deleteSocial)
    $('.editSoc').on('click',editSocial)
}

function editSocial(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allsocials/'+id+'/edit',
        'get',
        {
            'id':id
        },
        function (data){
            printSocForm(e,data)
        }
    )
}

function printSocForm(e,data=null){
    let html=`
<div class="m-4">
            <h2>Socials</h2>
        </div>
<div class="col-6">
<div class="alert" role="alert" id="socFeedback">
                                </div>
                    <form enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="name"`

    if(data!=null){
        html+=`value="${data.name}"`
    }

    html+= ` name="text">
                            <label for="email" class="form-label mt-2">Name</label><br>
                            <div id="nameError" class="invalid-form">
                                Name required.
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" class="form-control form-control-lg" id="link" `
    if(data!=null){
        html+=`value="${data.link}"`
    }

    html+= `name="link">
                            <label for="link" class="form-label mt-2">Link</label><br>
                            <div id="linkError" class="invalid-form">
                                Link required.
                            </div>
                        </div>`

    if(data!=null){
        html+=`<div class="form-group mt-4">
                            <input type="hidden" id="socId" value="${data.id}">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="socupdateform" name="">Update</button>
                        </div>`
    }else{
        html+=`<div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-dark btn-lg px-5" id="soccreateform" name="">Submit</button>
                        </div>`
    }
    `
                    </form>
                </div>`
    $('#adminContent').html(html)
    $('#nameError').css('display','none')
    $('#linkError').css('display','none')
    $('#soccreateform').on('click',submitSocial)
    $('#socupdateform').on('click',updateSocial)

}

function submitSocial(e){
    e.preventDefault();
    let name = $('#name').val()
    let link = $('#link').val()
    let errors=0
    if(name==null || name==''){
        $('#nameError').css('display','block')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(link==null || link==''){
        $('#linkError').css('display','block')
        errors++;
    }else{
        $('#linkError').css('display','none')
    }
    if(errors==0){
        ajaxCallback(
            '/allsocials',
            'post',
            {
                'name':name,
                'link':link,
            },
            function (data){
                $('#socFeedback').text(data.feedback)
                $('#socFeedback').addClass('alert-success')
            }
        )
    }
}

function updateSocial(e){
    e.preventDefault();
    let id = $('#socId').val()
    let name = $('#name').val()
    let link = $('#link').val()
    let errors=0
    if(name==null || name==''){
        $('#nameError').css('display','block')
        errors++;
    }else{
        $('#nameError').css('display','none')
    }
    if(link==null || link==''){
        $('#linkError').css('display','block')
        errors++;
    }else{
        $('#linkError').css('display','none')
    }
    if(errors==0){
        ajaxCallback(
            '/allsocials/'+id,
            'post',
            {
                'name':name,
                'link':link,
                '_method':'put'
            },
            function (data){
                $('#socFeedback').text(data.feedback)
                $('#socFeedback').addClass('alert-success')
            }
        )
    }
}

function deleteSocial(e){
    e.preventDefault()
    let id = this.dataset.id
    ajaxCallback(
        '/allsocials/'+id,
        'delete',
        {
            'id':id
        },
        function (data){
            getAllSocials()
        }
    )
}

///////// TABLES PAGE ///////////


function filterTables(){
    console.log('filter')
    let name = $('#tableName').val()
    console.log(name)
    let days1 =[];
    $(':checkbox:checked').each(function(i){
        days1.push($(this).val())
    });
    console.log(days1)
    let gmaster = '';
    if(document.querySelector("input[name=gm]:checked")){
        gmaster = document.querySelector("input[name=gm]:checked").value
    }else{
        gmaster = '';
    }
    console.log(gmaster)
    let gsys = $('#gSys').val();
    console.log(gsys)
    let sort = $('#ddSort').val();
    let split = sort.split('-')
    let sortVal = split[0];
    let sortCol = split[1];
    let lvl = $('#lvl').val();
    console.log(lvl)
    ajaxCallback(
        "/filtertables",
        'get',
        {
            "name":name,
            "days":days1,
            "gmaster":gmaster,
            "gsys":gsys,
            "sortVal":sortVal,
            "sortCol":sortCol,
            "lvl":lvl
        },
        function(data){
            printTables(data.data)
            printPagination(data)
            console.log(data)
            $('#first').val(0)
        }
    )
}

function getAllTables(){
    let all = '1st'
    ajaxCallback(
        "/filtertables",
        'get',
        {
            "all" : all
        },
        function(data){
            printTables(data.data)
            printPagination(data)
            $('#first').val(1)
        }
    )
}

function printPagination(data){
    let html =`<ul class="d-flex flex-row justify-content-center text-center col-12 mb-0">`
    for(let i=1;i<=data.last_page;i++){
        html+=`<li class="paginacija m-2"><a href="" class="paginationNum" data-id="${i}">${i}</a></li>`
    }
    html+=`</ul>`
    $('#pagination').html(html)
    $('.paginationNum').click(pagination)
}

function pagination(e){
    e.preventDefault()
    let page=this.dataset.id;
    console.log('PAGE - '+page)
    let all = $('#first').val()
    if(all==1){
        let all = '1st'
        ajaxCallback(
            "/filtertables",
            'get',
            {
                "all" : all,
                "page" : page
            },
            function(data){
                printTables(data.data)
                printPagination(data)
                $('#first').val(1)
            }
        )
    }
    else{
        let name = $('#tableName').val()
        let days1 =[];
        $(':checkbox:checked').each(function(i){
            days1.push($(this).val())
        });
        let gmaster = '';
        if(document.querySelector("input[name=gm]:checked")){
            gmaster = document.querySelector("input[name=gm]:checked").value
        }else{
            gmaster = '';
        }
        let gsys = $('#gSys').val();
        let sort = $('#ddSort').val();
        let split = sort.split('-')
        let sortVal = split[0];
        let sortCol = split[1];
        let lvl = $('#lvl').val();


        ajaxCallback(
            "/filtertables",
            'get',
            {
                "name":name,
                "days":days1,
                "gmaster":gmaster,
                "gsys":gsys,
                "sortVal":sortVal,
                "sortCol":sortCol,
                "lvl":lvl,
                "page":page
            },
            function(data){ printTables(data.data)
                printPagination(data)
                console.log(data)
            }
        )
    }
}

function printTables(tables){
    let html=''
    if(tables.length==0){
        html+=`<div class="m-5"><h1>No tables match your criteria.</h1></div>`
    }
    else{
        for(let table of tables){
            html+=`<div class="mt-4 mb-2 col-12 col-xl-5 p-3 testdiv d-flex flex-column justify-content-between">
    <span class="text-left w-100 p-2 infoBorder"><h3>${table.name} </h3></span>
    <div class="d-flex">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="${baseUrl+'/assets/img/'+table.image}" alt="${table.alt}" class="img-fluid pSlika">
        </div>
        <div class="col-6 p-0 d-flex justify-content-center align-items-center">
            <p class="pt-3">
                <i class="fa-solid fa-hat-wizard"></i> Game Master : <br>`
            if(table.game_master){
                html+=`Required <br>`
            }
            else{
                html+=`Not Required <br>`
            }
            html+=`<i class="fa-solid fa-gear"></i> Level required : ${table.l_name}<br>
                <i class="fa-solid fa-calendar"></i> Availability : <br>`
            for(let day of table.days){
                html+=`${day.name.substr(0,3)} `
            }
            html+= `<br><i class="fa-solid fa-book"></i> Game System : ${table.gs_name}<br><br>
            </p>
        </div>
            </div>
            <div class="text-right tableActions pt-3">
                <a href="table/${table.id}"><i class="fa-solid fa-eye pr-2 pl-2"></i>see more</a>
            </div>
            </div>`
        }
    }
   $('#allTables').html(html)
}
