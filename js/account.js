/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Account {
    constructor(fullname, email, phone, password, confirm) {
        this.fullname = fullname;
        this.email = email;
        this.phone = phone;
        this.password = password;
        this.confirm = confirm;
        this.message = ['', '', '', '', ''];
    }
    checkName() {
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        if (!reg.test(this.fullname)) {
            this.message[0] = '';
        } else {
            this.message[0] = 'Check your name again!';
        }
    }
    checkEmail() {
        $.ajax({
            url: 'js/checkemail.php',
            type: 'get', //send it through get method
            data: {
                email: this.email
            },
            success: function (data) {
                $('#resultE').val(data);
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
    }
    checkPhone() {
        var phone = this.phone.replaceAll(' ', '');
        $('#phone').val(phone);
        var reg = new RegExp(/^0[1-9]{2}[0-9]{7}/);
        if (!reg.test(phone)) {
            this.message[2] = 'Error Phone Number!';
        } else {
            $.ajax({
                url: 'js/checkphone.php',
                type: 'get', //send it through get method
                data: {
                    phone: this.phone
                },
                success: function (data) {
                    $('#resultP').val(data);
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
            this.message[3] = 'Error Password Format!';
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
}
