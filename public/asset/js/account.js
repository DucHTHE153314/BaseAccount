/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Account {
    constructor() {
    }
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
    setRegister() {
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-25');
        $('#myMessage #message').html('');
        this.first_name = $('#first_name').val();
        this.last_name = $('#last_name').val();
        this.email = $('#register_email').val();
        this.phone = $('#register_phone').val();
        this.password = $('#register_password').val();
        this.cf_password = $('#cf_new_pass').val();
    }
    setLogin() {
        $('#myMessage #message').html('');
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-25');
        this.email = $('#lemail').val();
        this.password = $('#lpassword').val();
    }
    setRepass() {
        $('#myMessage #message').html('');
        $('#myMessage #myMessage-content').removeClass();
        $('#myMessage #myMessage-content').addClass('modal-content mc-20');
    }
    checkEmail() {
        $.ajax({
            url: '/BaseAccount/Validate/checkEmail',
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
    async checkPhone() {
        if (!(new RegExp(/^0[1-9]{2}[0-9]{7}$/)).test(this.phone)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Error Phone Number!');
        } else {
            await $.ajax({
                url: '/BaseAccount/Validate/checkPhone',
                type: 'get', //send it through get method
                data: {
                    phone: this.phone
                },
                success: function (data) {
                    $('#myMessage #message').html($('#myMessage #message').html() + data);
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        }
    }
    checkDob() {
        if (this.dob.toString() === 'Invalid Date' || (this.dob.getMonth() + 1) != $('#dob_month').val()) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Date not exist!');
        }
    }
    checkName() {
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        if (this.first_name === '' || this.last_name === '') {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Fill your name!');
            return false;
        } else if (reg.test(this.first_name) || reg.test(this.last_name)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Check your name again!');
            return false;
        }
        return true;
    }
    checkPassword() {
        var pass = this.password;
        var reg = new RegExp(/^[a-zA-Z0-9!@#$%^&*]{6,16}/);
        if (!reg.test(pass)) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Error Password Format!');
            return false;
        }
        return true;
    }
    checkConfirm() {
        if (this.password !== this.confirm) {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Password confirmation mismatch!');
        }
    }
    register() {
        this.setRegister();
        if (this.checkName()) {
            this.checkEmail();
            this.checkPhone();
            if (this.checkPassword()) {
                this.checkConfirm();
            }
        }
        if ($('#myMessage #message').html() === '') {
            $.ajax({
                url: '/BaseAccount/Account/register',
                type: 'post', //send it through get method
                data: {
                    first_name: this.first_name, // $_GET["first_name"]
                    last_name: this.last_name,
                    register_phone: this.phone,
                    register_email: this.email,
                    register_password: this.password
                },
                success: function () {
                    $('#myMessage #modal-title').html('Success');
                    $('#myMessage #modal-title').css('color', '#42b814');
                    $('#myMessage #icon').css('color', '#42b814');
                    $('#myMessage #icon').css('margin-left', '25%');
                    $('#myMessage #icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> ' +
                        '<path d = "M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />' +
                        '<path d = "M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />' +
                        "</svg>");
                    $('#myMessage #message').html('&nbsp; Đăng ký thành công!');
                    $('#myMessage #btn-confirm').click(function () {
                        // Login 
                    });
                    $('#myMessage').show();
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        } else {
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
        return false;
    }
    async update() {
        this.setInfor();
        await this.checkPhone();
        this.checkName();
        this.checkDob();
        await this.setUpdate();
    }
    async setUpdate() {
        if ($('#myMessage #message').html() === '') {
            await $.ajax({
                url: '/BaseAccount/Account/update',
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
                    $('#myMessage #modal-title').html('Success');
                    $('#myMessage #modal-title').css('color', '#42b814');
                    $('#myMessage #icon').css('color', '#42b814');
                    $('#myMessage #icon').css('margin-left', '25%');
                    $('#myMessage #icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> ' +
                        '<path d = "M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />' +
                        '<path d = "M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />' +
                        "</svg>");
                    $('#myMessage #message').html('&nbsp; Cập nhật thành công!');
                    $('#myMessage #btn-confirm').click(function () {
                        $('#frm-avatar').submit();
                    });
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        } else {
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
        }
        $('#myMessage').show();
    }
    login() {
        this.setLogin();
        $.ajax(
            {
                url: '/BaseAccount/Account/login',
                type: 'post', //send it through get method
                data: {
                    lemail: this.email,
                    lpassword: this.password
                },
                success: function (data) {
                    $('#icon').css('margin-left', '17%');
                    $('#myModal').show();
                    if (data === '-1') {
                        $('#message').html('Email chưa được đăng ký!');
                    } else if (data === '0') {
                        $('#message').html('Mật Khẩu chưa chính xác');
                    } else {
                        window.location = '/BaseAccount/Account/login';
                    }
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
    }
    repass() {
        this.setRepass();
        $.ajax({
            url: '/BaseAccount/Validate/checkPass',
            type: 'get', //send it through get method
            data: {
                pass: $('#old_pass').val(),
                new: $('#new_pass').val(),
                cf: $('#cf_new_pass').val()
            },
            success: function (data) {
                $('#myMessage #icon').css('margin-left', '15%');
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
                } else {
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
                            window.location = '/BaseAccount/Account/login';
                        }
                    );
                }
                $('#myMessage').show();
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
    }
}
var User = new Account();