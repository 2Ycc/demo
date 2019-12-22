/**
 * 与Register按钮绑定，点击后跳转到注册界面
 */
function register(){
    window.location.href="register.html";
}

/**
 * 与login按钮绑定，点击后跳转到登录界面
 */
function login(){
    window.location.href="login.html";
}

/**
 * 绑定在登录与注册页面的复选框上
 * 执行此函数会检查界面上“我已阅读详情”是否被选择，如果选上了则对应按钮可点击
 */
function checkBox(){
    var cbox = document.getElementById("cb");
    var btn_detail = document.getElementById("btn-detail");
    if(cbox.checked)
        btn_detail.disabled = false;
    else btn_detail.disabled = true;
}


/**
 * 绑定在登录界面的Login按钮上
 * 执行此函数会通过正则表达式来判断登录时用户输入的用户名与密码是否符合规则
 * （不判断密码与注册时是否相同，只要符合规则即为登陆成功）
 */
// function checkLogin(){
//     var uName = document.getElementById("mingzi");
//     var uPwd = document.getElementById("mima");
//     var checkName = /^(?!_)(?!.*?_$)[a-zA-Z0-9_]{6,12}$/;                                         
//     var checkPwd = /^.{8,16}$/;
//     var result_n = checkName.test(uName.value);
//     var result_p = checkPwd.test(uPwd.value);
//     if(result_n==true){
//         if(result_p==true){
//             alert("登录成功！");
//             window.location.href="index.html"+"?"+uName.value;
//         } 
//         else alert("密码格式不符！");
//     }
//     else alert("用户名格式不符！"); 
// }

/**
 * 绑定在注册页面的Register按钮上
 * 执行此函数会通过正则表达式来判断注册时用户输入的用户名、手机号码、密码与确认密码是否符合规则
 */
// function checkRegister(){
//     var uName = document.getElementById("mingzi");
//     var uPwd = document.getElementById("mima");
//     var queren = document.getElementById("queren");
//     var tele = document.getElementById("tel");
//     var checkName = /^(?!_)(?!.*?_$)[a-zA-Z0-9_]+$/; 
//     var checkPwd = /^.{8,16}$/;
//     var checkTel = /^1[3456789]\d{9}$/;
//     var result_n = checkName.test(uName.value);
//     var result_p = checkPwd.test(uPwd.value);
//     var result_t = checkTel.test(tele.value);
//     if(result_n==true){
//         if(result_t==true)
//             if(result_p==true){
//                 if(queren.value!=""&&queren.value==uPwd.value){
//                     alert("注册成功！");
//                     window.location.href="login.html";
//                 }
//                 else if(tele.value=="")
//                     alert("手机号码不能为空！");
//                 else if(queren.value=="")
//                     alert("确认密码不能为空！");
//                 else alert("两次密码不相同！");
//             }
//             else alert("密码格式不符");
//         else alert("手机号格式不符！");
//     }
//     else alert("用户名格式不符！");
// }

