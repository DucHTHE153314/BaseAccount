/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Account {
    
    /**
     * Define an Account Object.
     * @returns {Account} Empty Account Object
     */
    constructor() {
    }
    /**
     * Set up information for this Account.<br/>
     * Data get from Update form. Make message box empty.
     * @returns {void}
     */
    setInfor() {
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-25');
        $('#myMessage #message').html('');
        this.first_name = $('#first_name').val();
        this.last_name = $('#last_name').val();
        this.position = $('#position').val();
        this.dob = (isNaN($('#dob_year').val()) || isNaN($('#dob_year').val()) || isNaN($('#dob_year').val())) ?
            new Date('hehehehehe') : new Date($('#dob_year').val() + '-' + $('#dob_month').val() + '-' + $('#dob_date').val());
        this.phone = $('#phone').val();
        this.address = $('#address').val();
    }
    /**
     * Set up information for this Account.<br/>
     * Data get from Register form. Make message box empty.
     * @returns {void}
     */
    setRegister() {
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-25');
        $('#myMessage #message').html('');
        this.first_name = $('#first_name').val();
        this.last_name = $('#last_name').val();
        this.email = $('#register_email').val();
        this.phone = $('#register_phone').val();
        this.password = $('#register_password').val();
        this.cf_password = $('#confirm_password').val();
    }
    /**
     * Set up email and password for this Account for Login action.<br/>
     * Data get from Login form. Make message box empty.
     * @returns {void}
     */
    setLogin() {
        $('#myMessage #message').html('');
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-25');
        this.email = $('#lemail').val();
        this.password = $('#lpassword').val();
    }
    /**
     * Make message box empty.
     * @returns {void}
     */
    setRepass() {
        $('#myMessage #message').html('');
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-20');
    }
    /**
     * An Async function allow send an ajax method to validate this Account's email.
     * Received message will be shown in message box.
     * @returns {void}
     */
    async checkEmail() {
        await $.ajax({
            url: '/Validate/checkEmail',
            type: 'get', //send it through get method
            data: {
                email: this.email
            },
            success: function (data) {
                $('#myMessage #message').html($('#myMessage #message').html() + data);
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
    };
    /**
     * An Async function check this Account's phone valid then allow send an ajax method to validate it.
     * Received message will be shown in message box.
     * @param {String} act Action call this function.
     * @returns {void}
     */
    async checkPhone(act) {

        if (!(new RegExp(/^0[1-9]{2}[0-9]{7}$/)).test(this.phone)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Error Phone Number!');
            return;
        }
        
        await $.ajax({
            url: '/Validate/checkPhone',
            type: 'get', //send it through get method
            data: {
                phone: this.phone,
                act: act
            },
            success: function (data) {
                $('#myMessage #message').html($('#myMessage #message').html() + data);
            },
            error: function (xhr) {
                //Do Something to handle error
                alert(xhr.statusText);
            }
        });        
    }
    /**
     * Validate this Account's date of birth.
     * Received message will be shown in message box.
     * @returns {void}
     */
    checkDob() {
        if (this.dob.toString() === 'Invalid Date' || (this.dob.getMonth() + 1) != $('#dob_month').val()) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Date not exist!');
        }
    }
    /**
     * Validate this Account's fullname.
     * Received message will be shown in message box.
     * @returns {Boolean} True if this name is Correct name, else False.
     */
    checkName() {
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        
        if (this.first_name === '' || this.last_name === '') {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Fill your name!');
            return false;
        }

        if (reg.test(this.first_name) || reg.test(this.last_name)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Check your name again!');
            return false;
        }

        return true;
    }
    /**
     * Only validate this Account's password in Register or Repass Action.
     * The correct password just has a-z, 0-9, some special character: !@#$%^&* and this length between 6 and 16.
     * Received message will be shown in message box.
     * @returns {void}
     */
    checkPassword() {
        var pass = this.password;
        var reg = new RegExp(/^[a-zA-Z0-9!@#$%^&*]{6,16}/);
        if (!reg.test(pass)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Error Password Format!');
            return;
        }
        this.checkConfirm();
    }
    /**
     * Only validate this Account's password in Register or Repass Action.
     * Check the confirm password equals or not to the new password.
     * Received message will be shown in message box.
     * @returns {void}
     */
    checkConfirm() {
        if (this.password !== this.cf_password) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Password confirmation mismatch!');
        }
    }
    /**
     * Check this Account's avatar is valid or not.
     * @returns {Boolean} True if this avatar is an almost square sized image or no file has been upload. Else, false.
     */
    checkAvatar() {
        var avatar = $('#inf_avatar').prop('files');
        try {

            if (avatar[0]['type'].split('/')[0] !== 'image') {
                $('#myMessage #message').html($('#myMessage #message').html() + ' Only support image files!');
                return false;
            }

            var _URL = window.URL || window.webkitURL;
            var avatar = $('#inf_avatar').prop('files');
            var img = new Image();
            img.src = _URL.createObjectURL(avatar[0]);

            if ((img.width / img.height) > 0.8 && (img.width / img.height) < 1.25) {
                $('#myMessage #message').html($('#myMessage #message').html() + ' Image size!');
                return false;
            }

            return true;
        } catch (error) {
            return true;
        }
    }
    /**
     * Async funtion handling this Account's register action.
     * @returns {void}
     */
    async register() {
        this.setRegister();
        this.checkName();
        await this.checkEmail();
        await this.checkPhone('register');
        this.checkPassword();
        await this.doRegister();
    }
    /**
     * Async funtion allow send an ajax function if the message box empty to register.
     * Then, show message box.
     * @returns {void}
     */
    async doRegister() {
        if ($('#myMessage #message').html() === '') {
            await $.ajax({
                url: '/Account/register',
                type: 'post', //send it through get method
                data: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    register_phone: this.phone,
                    register_email: this.email,
                    register_password: this.password
                },
                success: function () {
                    $('#myMessage #modal-title').html('Success');
                    $('#myMessage #modal-title').css('color', '#42b814');
                    $('#myMessage #icon').css('color', '#42b814');
                    $('#myMessage #icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> ' +
                        '<path d = "M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />' +
                        '<path d = "M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />' +
                        "</svg>");
                    $('#myMessage #message').html('&nbsp; Đăng ký thành công!');
                    $('#myMessage #btn-confirm').click(function () {
                        window.location = '/Account/login'
                    });
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
            $('#myMessage').show();
            return;
        }
        $('#myMessage #modal-title').html('Wrong');
        $('#myMessage #modal-title').css('color', 'red');
        $('#myMessage #icon').css('color', 'orange');
        $('#myMessage #icon').css('margin-left', '5%');
        $('#myMessage #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>`);
        $('#myMessage #btn-confirm').click(function () {
            $('#myMessage').hide();
        });
        $('#myMessage').show();
    }
    /**
     * Async funtion handling this Account's update action.
     * @returns {void}
     */
    async update() {
        this.setInfor();
        await this.checkPhone('update');
        this.checkName();
        this.checkDob();
        this.checkAvatar();
        await this.setUpdate();
    }
    /**
     * Async funtion allow send an ajax function if the message box empty to update information.
     * Then, show message box.
     * @returns {void}
     */
    async setUpdate() {
        if ($('#myMessage #message').html() === '') {
            await $.ajax({
                url: '/Account/update',
                type: 'post', //send it through post method
                data: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    position: this.position,
                    dob: this.dob.getUTCFullYear() + "-" + (this.dob.getUTCMonth() + 1) + "-" + this.dob.getUTCDate(),
                    phone: this.phone,
                    address: this.address,
                    avatar: this.avatar
                },
                success: function () {
                    $('#user-infor').hide();
                    $('#myMessage #modal-title').html('Success');
                    $('#myMessage #modal-title').css('color', '#42b814');
                    $('#myMessage #icon').css('color', '#42b814');
                    $('#myMessage #icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> ' +
                        '<path d = "M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />' +
                        '<path d = "M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />' +
                        "</svg>");
                    $('#myMessage #message').html('&nbsp; Cập nhật thành công!');
                    $('#myMessage .btn-close').click(function () {
                        $('#frm-avatar').submit();
                    });
                    $('#myMessage #btn-confirm').click(function () {
                        $('#frm-avatar').submit();
                    });
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
            $('#myMessage').show();
            return;
        } 
        $('#myMessage #modal-title').html('Wrong');
        $('#myMessage #modal-title').css('color', 'red');
        $('#myMessage #icon').css('color', 'orange');
        $('#myMessage #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>`);
        $('#myMessage #btn-confirm').click(function () {
            $('#myMessage').hide();
        });
        $('#myMessage').show();
    }
    /**
     * Async function allow send an ajax function to check email and password is correct or not.
     * Received message will be shown in message box.
     * @returns {void}
     */
    async checkLogin() {
        await $.ajax({
                url: '/Validate/checkLogin',
                type: 'get', //send it through get method
                data: {
                    lemail: $('#lemail').val(),
                    lpassword: $('#lpassword').val()
                },
                success: function (data) {
                    $('#message').html(data);
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
    }
    /**
     * Handling this Account's login action.
     * @returns {void}
     */
    async login() {
        this.setLogin();

        if (this.email.trim() == '') {
            $('#message').html('Invalid or empty email. Please try again.');
            $('#myModal').show();
            return;
        }

        if (this.password == '') {
            $('#message').html('Invalid password. Please try again.');
            $('#myModal').show();
            return;
        }

        await this.checkLogin();

        if ($('#message').html() == '') {
            $.ajax(
                {
                    url: '/Account/login',
                    type: 'post', //send it through post method
                    data: {
                        lemail: this.email,
                        lpassword: this.password
                    },
                    success: function (data) {
                        $('#icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                          </svg>`);
                        $('#message').html('Login successfully.');
                        $('#myModal .modal-body').css('color', 'green');
                        window.location = '/Account/login';
                    },
                    error: function (xhr) {
                        //Do Something to handle error
                    }
                });
        }

        $('#myModal').show();

    }
    /**
     * Handling this Account's change password action.
     * @returns {void}
     */
    repass() {
        this.setRepass();
        $.ajax({
            url: '/Validate/checkPass',
            type: 'post', //send it through get method
            data: {
                pass: $('#old_pass').val(),
                new: $('#new_pass').val(),
                cf: $('#cf_new_pass').val(),
                force_logout: $('#force_logout').val()
            },
            success: function (data) {
                $('#myMessage #btn-confirm').click(function () {
                    $('#myMessage').hide();
                });

                if (data !== '1') {
                    $('#myMessage #message').html(
                        data === '-2' ? 'Old password not correct!' :
                            data === '-1' ? 'New password wrong format!' : '&emsp;&ensp;Confirm error!');
                    $('#myMessage #modal-title').html('Wrong');
                    $('#myMessage #modal-title').css('color', 'red');
                    $('#myMessage #icon').css('color', 'red');
                    $('#myMessage #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>`);
                    $('#myMessage').show();
                    return;
                }

                $('#myMessage #message').html('Change password success!');
                $('#myMessage #modal-title').html('Success');
                $('#myMessage #modal-title').css('color', 'green');
                $('#myMessage #icon').css('color', 'green');
                $('#myMessage #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>`);
                $('#myMessage #btn-confirm').click(
                    function () {
                        window.location = '/Account/login';
                    }
                );
                $('#myMessage').show();
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
    }
}
var User = new Account();