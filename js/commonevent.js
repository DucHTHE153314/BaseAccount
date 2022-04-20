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
        var reg = new RegExp(/[^a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u);
        if (reg.test(this.fullname)) {
            this.message[0] = '';
            return true;
        } else {
            this.message[0] = 'Check your name again!';
            return false;
        }
    }
    checkEmail() {
        $.ajax({
            url: 'checkemail.php',
            type: 'get', //send it through get method
            data: {
                email: this.email
            },
            success: function (data) {
                alert(data);
            },
            error: function (xhr) {
                var err = eval("(" + xhr.responseText + ")");
                alert('err'+err.Message);
                //Do Something to handle error
            }
        });
    }
}
