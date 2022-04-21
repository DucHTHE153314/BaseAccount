/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AccountRegister {
    constructor(fullname, email, phone, password) {
        this.fullname = fullname;
        this.email = email;
        this.phone = phone;
        this.password = password;
        this.message = ['', '', '', ''];
    }
    checkName() {
        alert(this.fullname);
        var reg = new RegExp(/[^a-zA-Z\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/);
        alert(this.fullname);
        if (!reg.test(this.fullname)) {
            this.message[0] = '';
            return true;
        } else {
            this.message[0] = 'Check your name again!';
            return false;
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
                if (data === 1) {
                    this.message[1] = 'This email has been used!';
                } else {
                    this.message[1] = '';
                }
            },
            error: function (xhr) {
                //Do Something to handle error
            }
        });
        return this.message[1] === '';
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
                type: 'get',
                data: {
                    phone: this.phone
                },
                success: function (data) {
                    if (data === 1) {
                        this.message[2] = 'This phone has been registered!';
                    } else {
                        this.message[2] = '';
                    }
                }
            });
        }
        return this.message[2] === '';
    }
    checkPassword() {
        var pass = this.password;
        var reg = new RegExp(/^[a-zA-Z0-9!@#$%^&*]{6,16}/);
        if (!reg.test(pass)) {
            this.message[3] = 'Error Password Format!';
            return false;
        } else {
            this.message[3] = '';
            return true;
        }
    }
    checkRegister() {
        var x = this.checkPhone() && this.checkEmail() && this.checkName() && this.checkPassword();
        for (var i = 0; i < 4; i++) {
            $('.message').eq(i).html(this.message[i]);
            $('.message').eq(i).css('color', 'red');
            $('.message').eq(i).show();
        }
        return x;
    }
}
