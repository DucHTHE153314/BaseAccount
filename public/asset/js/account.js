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
        this.first_name = $('#first_name').val();
        this.last_name = $('#last_name').val();
        this.position = $('#position').val();
        this.dob = new Date($('#dob_year').val(), $('#dob_month').val() - 1, $('#dob_date').val());
        this.phone = $('#phone').val();
        this.address = $('#address').val();
    }
    checkName() {
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        if (!reg.test(this.first_name) || !reg.test(this.last_name)) {
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
            success: function(data) {
                User.message[1] = data;
                console.log(data);
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }
    checkPhone() {
        var phone = this.phone.replaceAll(' ', '');
        $('#phone').val(phone);
        var reg = new RegExp(/^0[1-9]{2}[0-9]{7}/);
        if (!reg.test(phone)) {
            this.message[3] = 'Error Phone Number!';
        } else {
            $.ajax({
                url: '/BaseAccount/Validate/checkPhone',
                type: 'get', //send it through get method
                data: {
                    phone: this.phone
                },
                success: function(data) {
                    User.message[2] = data;
                },
                error: function(xhr) {
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
        } else {
            this.message[4] = '';
        }
    }
    checkDob() {
        if (this.dob.toString() === 'Invalid Date') {
            this.message[3] = 'Date not exist!';
        } else {
            this.message[3] = '';
        }
    }
    checkConfirm() {
        if (this.password === this.confirm) {
            this.message[4] = '';
        } else {
            this.message[4] = 'Password confirmation mismatch!';
        }
    }
    checkRegister() {
        this.checkName();
        this.checkPassword();
        this.checkConfirm();
        this.checkPhone();
        this.checkEmail();
        if ($('#resultP').val() === 1) {
            this.message[2] = 'This phone has been registered!';
        } else {
            this.message[2] = 'Phone ko vao ne`';
        }
        if ($('#resultE').val() === 1) {
            this.message[1] = 'This email has been used!';
        } else {
            this.message[1] = 'Email ko vao ne`';
        }
        for (var i = 0; i < 5; i++) {
            $('.message').eq(i).html(this.message[i]);
            $('.message').eq(i).css('color', 'red');
            $('.message').eq(i).show();
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
                success: function() {
                    $('#myMessage #modal-title').html('Success');
                    $('#myMessage #modal-title').css('color', '#42b814');
                    $('#myMessage #icon').css('color', '#42b814');
                    $('#myMessage #icon').css('margin-left', '25%');
                    $('#myMessage #icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"> ' +
                        '<path d = "M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />' +
                        '<path d = "M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />' +
                        "</svg>");
                    $('#myMessage #message').html('&nbsp; Cập nhật thành công!')
                    $('#myMessage').show();
                },
                error: function(xhr) {
                    //Do Something to handle error
                }
            });
        } else {
            alert(this.message);
        }
    }
}
var User = new Account('', '', '', '', '', '', '', '', '');