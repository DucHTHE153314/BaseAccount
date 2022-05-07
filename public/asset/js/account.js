/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Account {
    constructor(first_name, last_name, email, username, position, dob, phone, password, address) {
        this.first_name = first_name;
        this.last_name = last_name;
        this.email = email;
        this.username = username;
        this.position = position;
        this.dob = dob;
        this.password = password;
        this.phone = phone;
        this.address = address;
        this.message = ['', '', '', '', '']; // Name - email - dob - phone - password
    }
    setInfor() {
        this.first_name = $('#first_name').val().trim();
        this.last_name = $('#last_name').val().trim();
        this.position = $('#position').val().trim();
        this.dob = new Date($('#dob_year').val() + '-' + $('#dob_month').val() + '-' + $('#dob_date').val());
        this.phone = $('#phone').val().trim();
        this.address = $('#address').val().trim();
    }
    setRegister() {
        this.first_name = $('#first_name').val().trim();
        this.last_name = $('#last_name').val().trim();
        this.email = $('#register_email').val().trim();
        this.phone = $('#register_phone').val().trim();
        this.password = $('#register_password').val().trim();
    }
    checkName() {
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        if (this.first_name === '' || this.last_name === '') {
            this.message[0] = 'Fill your name!';
        } else if (!reg.test(this.first_name) && !reg.test(this.last_name)) {
            this.message[0] = '';
        } else {
            this.message[0] = 'Check your name again!';
        }
    }
    checkEmail() {
        $.ajax({
            url: '/BaseAccount/Validate/checkEmail',
            type: 'get', //send it through get method
            data: {
                email: this.email
            },
            success: function (data) { 

            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });        
    }
    checkPhone() {
        var reg = new RegExp(/^0[1-9]{2}[0-9]{7}$/);
        if (!reg.test(this.phone)) {
            this.message[3] = 'Error Phone Number!';
        } else {
            this.message[3] = '';
            $.ajax({
                url: '/BaseAccount/Validate/checkPhone',
                type: 'get', //send it through get method
                data: {
                    phone: this.phone
                },
                success: function (data) {
                },
                error: function (xhr) {
                    //Do Something to handle error
                }
            });
        }
    }
    checkPassword() {
        var pass = this.password;
        var reg = new RegExp(/^[a-zA-Z0-9!@#$%^&*]{6,16}/);
        if (!reg.test(pass)) {
            this.message[4] = 'Error Password Format!';
            return false;
        } else {
            this.message[4] = '';
            return true;
        }
    }
    checkDob() {
        if (this.dob.toString() === 'Invalid Date' || (this.dob.getMonth() + 1) != $('#dob_month').val()) {
            this.message[2] = 'Date not exist!';
        } else {
            this.message[2] = ''; 
        }
    }
    checkConfirm() {
        if (this.password === this.confirm) {
            this.message[4] = '';
        } else {
            this.message[4] = 'Password confirmation mismatch!';
        }
    }
    register() {
        this.setRegister();
        this.checkName();
        this.checkEmail();
        this.checkPhone();
        // alert(this.message);
        if (this.checkPassword()) {
            this.checkConfirm();
        }
        if (this.message[0] === '' && this.message[1] === '' && this.message[3] === '' && this.message[4] === '') {
            $.ajax({
                url: '/BaseAccount/Account/register',
                type: 'get', //send it through get method
                data: {
                    first_name: this.first_name, // $_GET["first_name"]
                    last_name: this.last_name,
                    phone: this.phone,
                    password: this.password
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
            $('#myMessage #message').html(`&nbsp;` + this.message[0] + `
            ` + this.message[1] + `
            ` + this.message[3] + `
            ` + this.message[4]);
            $('#myMessage #btn-confirm').click(function () {
                $('#myMessage').hide();
            });
            $('#myMessage').show();
        }
        return false;
    }
    update() {
        this.setInfor();
        this.checkName();
        this.checkPhone();
        this.checkDob();
        if (this.message[0] === '' && this.message[2] === '' && this.message[3] === '') {
            $.ajax({
                url: '/BaseAccount/Account/update',
                type: 'get', //send it through get method
                data: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    position: this.position,
                    dob: this.dob,
                    phone: this.phone,
                    address: this.address
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
                        location.reload();
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
            $('#myMessage #message').html(`&nbsp;` + this.message[0] + `
            &thinsp;` + this.message[2] + `
            ` + this.message[3]);
            $('#myMessage #btn-confirm').click(function () {
                $('#myMessage').hide();
            });
            $('#myMessage').show();
        }
    }
}
var User = new Account('', '', '', '', '', '', '', '', '');