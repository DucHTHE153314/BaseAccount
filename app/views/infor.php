<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel='icon' href="/BaseAccount/public/asset/images/logo.png" />
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/popup.css" />
    <link href="/BaseAccount/public/asset/css/content.css" rel="stylesheet" />
    <link href="/BaseAccount/public/asset/css/infor.css" rel="stylesheet" />
    <link rel="stylesheet" href="/BaseAccount/public/asset/css/common.css">
    <title>Account</title>
</head>

<body>
    <?php

    use Core\View;

    View::render('base_panel.php', array('act' => 'personal', 'cus' => $cus)); ?>
    <div class="main">
        <div class="main-header">
            <div class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                </svg>
            </div>
            <div class="sub-infor">
                <p id="header-title">TÀI KHOẢN</p>
                <p id="header-content"><?php echo $cus->getFull_name(); ?> · <?php echo $cus->getPosition(); ?></p>
            </div>
            <button class="header-act btn-tg-infor"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                </svg> Chỉnh sửa tài khoản</button>
        </div>
        <div class="main-infor">
            <div id="profile">
                <div class="main">
                    <div class="image">
                        <img class="img-md user-ava" id="user-avatar" src="/BaseAccount/public/asset/images/<?php echo $cus->getAvatar() ? $cus->getAvatar() : '765-default-avatar.png'; ?>" />
                    </div>
                    <div class="text">
                        <div class="title">
                            <?php echo $cus->getFull_name(); ?>
                        </div>
                        <div class="sub-title">
                            <?php echo $cus->getPosition(); ?>
                        </div>
                        <div class="infor">
                            <b>Địa chỉ email</b> <?php echo $cus->getEmail(); ?>
                        </div>
                        <div class="infor">
                            <b>Số điện thoại</b> <?php echo $cus->getPhone(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-menu" class="bg-gray">
        <div class="header-title">
            <div class="name">
                <?php echo $cus->getFull_name(); ?>
            </div>
            <div class="sub-title">
                @noname · <?php echo explode('@', $cus->getEmail())[0]; ?>
            </div>
        </div>
        <div class="menu-box">
            <div class="box-title">
                THÔNG TIN TÀI KHOẢN
            </div>
            <div class="box-act active">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg>&nbsp;
                Tài khoản
            </div>
            <div class="box-act btn-tg-infor">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg>&nbsp;
                Chỉnh sửa
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                    <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z" />
                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z" />
                </svg>&nbsp;
                Ngôn ngữ
            </div>
            <div class="box-act btn-tg-change-pass">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                </svg>&nbsp;
                Đổi mật khẩu
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
                    <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z" />
                </svg>&nbsp;
                Đổi màu hiển thị
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                </svg>&nbsp;
                Lịch làm việc
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z" />
                </svg>&nbsp;
                Bảo mật hai lớp
            </div>
        </div>
        <div class="menu-box">
            <div class="box-title">
                ỨNG DỤNG - BẢO MẬT
            </div>
        </div>
        <div class="menu-box">
            <div class="box-title">
                TÙY CHỈNH NÂNG CAO
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                </svg>&nbsp;
                Lịch sử đăng nhập
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                    <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                </svg>&nbsp;
                Quản lý thiết bị
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>&nbsp;
                Tùy chỉnh email thông báo
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                </svg>&nbsp;
                Chỉnh sửa múi giờ
            </div>
            <div class="box-act">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
                </svg> &nbsp;
                Ủy quyền tạm thời
            </div>
        </div>
    </div>
    <?php require 'logout.php'; ?>
    <!-- The Modal Changepass -->
    <div id="user-change-pass" class="modal">
        <!-- Modal content -->
        <div class="modal-content mc-25" id="" style="margin-top: 17%;">
            <div class="modal-header">
                <h3 class="modal-title">ĐỔI MẬT KHẨU</h3>
                <span class="close btn-close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4 field-name">Mật khẩu cũ</div>
                    <input class="col-6 input" type="password" id="old_pass" name="old_pass" placeholder="Mật khẩu cũ" value="">
                </div>
                <div class="row">
                    <div class="col-4  field-name">Mật khẩu mới</div>
                    <input class="col-6 input" type="password" id="new_pass" name="new_pass" placeholder="Mật khẩu mới" value="">
                </div>
                <div class="row">
                    <div class="col-4 field-name">Xác nhận</div>
                    <input class="col-6 input" type="password" id="cf_new_pass" name="cf_new_pass" value="" placeholder="Xác nhận">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close btn-skip left" onclick="location.reload();">Bỏ qua</button>
                <button type="button" id="" class="btn-save right" onclick="User.repass();">Cập nhật</button>
            </div>
        </div>
    </div>
    <!-- The Modal Infor -->
    <div id="user-infor" class="modal">
        <!-- Modal content -->
        <div class="modal-content mc-40" id="user-infor-content">
            <div class="modal-header">
                <h3 class="modal-title">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h3>
                <span class="close btn-close" onclick="location.reload();">&times;</span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 field-name">Tên của bạn</div>
                    <input class="col-7 input" type="text" id="first_name" name="first_name" placeholder="Tên của bạn" value="<?php echo $cus->getFirst_name(); ?>" maxlength="32">
                </div>
                <div class="row">
                    <div class="col-3  field-name">Họ của bạn</div>
                    <input class="col-7 input" type="text" id="last_name" name="last_name" placeholder="Họ của bạn" value="<?php echo $cus->getLast_name(); ?>" maxlength="32">
                </div>
                <div class="row">
                    <div class="col-3 field-name">Email</div>
                    <input class="col-7 input disabled" type="text" value="<?php echo $cus->getEmail(); ?>" disabled>
                </div>
                <div class="row">
                    <div class="col-3 field-name">Username</div>
                    <input class="col-7 input disabled" type="text" value="@noname" disabled>
                </div>
                <div class="row">
                    <div class="col-3 field-name">Vị trí công việc</div>
                    <input class="col-7 input" type="text" id="position" name="position" placeholder="Vị trí công việc" value="<?php echo $cus->getPosition(); ?>" maxlength="32">
                </div>
                <form class="row" id="frm-avatar" action="/BaseAccount/Account/update" method="post" enctype="multipart/form-data">
                    <div class="col-3 field-name">Ảnh đại diện</div>
                    <input class="col-7 input" type="file" id="inf_avatar" name="avatar" placeholder="" value="">
                </form>
                <div class="row">
                    <div class="col-3 field-name">Ngày tháng năm sinh</div>
                    <div class="col-7">
                        <select class="col-3" name="date" id="dob_date">
                            <option value="-- Chọn ngày --">-- Chọn ngày --</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                if ($i == $cus->getBirth_date()->format("d")) {
                                    echo "<option value='$i' selected>$i</option>";
                                } else {
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                            ?>
                        </select>
                        <select class="col-3" name="month" id="dob_month">
                            <option value="-- Chọn tháng --">-- Chọn tháng --</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                if ($i == $cus->getBirth_date()->format("m")) {
                                    echo "<option value='$i' selected>$i</option>";
                                } else {
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                            ?>
                        </select>
                        <select class="col-3" name="year" id="dob_year">
                            <option value="-- Chọn năm --">-- Chọn năm --</option>
                            <?php
                            for ($i = 2010; $i >= 1930; $i--) {
                                if ($i == $cus->getBirth_date()->format("Y")) {
                                    echo "<option value='$i' selected>$i</option>";
                                } else {
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 field-name">Số điện thoại</div>
                    <input class="col-7 input" type="text" id="phone" name="phone" placeholder="Số điện thoại" value="<?php echo $cus->getPhone(); ?>" maxlength="10">
                </div>
                <div class="row">
                    <div class="col-3 field-name">Chỗ ở hiện nay</div>
                    <input class="col-7 input" type="text" id="address" name="address" placeholder="Chỗ ở hiện nay" value="<?php echo $cus->getAddress(); ?>" maxlength="100">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close btn-skip left" onclick="location.reload();">Bỏ qua</button>
                <button type="button" id="logout" class="btn-save right" onclick="User.update();">Cập nhật</button>
            </div>
        </div>
    </div>
    <!-- The Modal Message -->
    <div id="myMessage" class="modal">
        <!-- Modal content -->
        <div class="modal-content mc-25" id="myMessage-content">
            <div class="modal-header">
                <h3 class="modal-title error" id="modal-title">Logout</h3>
                <span class="close btn-close">&times;</span>
            </div>
            <div class="modal-body">
                <p id="icon"> <svg class="warning" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg></p>
                <p id='message'>
                    &nbsp; Bạn có muốn đăng xuất khỏi hệ thống ngay bây giờ? </p>
            </div>
            <div class="modal-footer" id="btn-confirm">
                <p>Ok</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/BaseAccount/public/asset/js/common.js"></script>
    <script src="/BaseAccount/public/asset/js/popup.js"></script>
    <script src="/BaseAccount/public/asset/js/account.js"></script>
</body>

</html>