var SnippetLogin = (function () {
    var e = $("#m_login");

    var showAlert = function (container, type, message) {
        var alert = $(
            '<div class="m-alert m-alert--outline alert alert-' +
                type +
                ' alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' +
                "<span></span>" +
                "</div>"
        );
        container.find(".alert").remove();
        alert.prependTo(container);
        mUtil.animateClass(alert[0], "fadeIn animated");
        alert.find("span").html(message);
    };

    var showSignIn = function () {
        e.removeClass("m-login--forget-password");
        e.removeClass("m-login--signup");
        e.addClass("m-login--signin");
        mUtil.animateClass(e.find(".m-login__signin")[0], "flipInX animated");
    };

    var handleSwitch = function () {
        $("#m_login_forget_password").click(function (i) {
            i.preventDefault();
            e.removeClass("m-login--signin");
            e.removeClass("m-login--signup");
            e.addClass("m-login--forget-password");
            mUtil.animateClass(
                e.find(".m-login__forget-password")[0],
                "flipInX animated"
            );
        });

        $("#m_login_forget_password_cancel").click(function (e) {
            e.preventDefault();
            showSignIn();
        });

        $("#m_login_signup").click(function (i) {
            i.preventDefault();
            e.removeClass("m-login--forget-password");
            e.removeClass("m-login--signin");
            e.addClass("m-login--signup");
            mUtil.animateClass(
                e.find(".m-login__signup")[0],
                "flipInX animated"
            );
        });

        $("#m_login_signup_cancel").click(function (e) {
            e.preventDefault();
            showSignIn();
        });
    };

    return {
        init: function () {
            handleSwitch();

            $("#m_login_signin_submit").click(function (e) {
                e.preventDefault();
                var btn = $(this),
                    form = $(this).closest("form");

                form.validate({
                    rules: {
                        email: { required: true, email: true },
                        password: { required: true },
                    },
                });

                if (form.valid()) {
                    btn.addClass(
                        "m-loader m-loader--right m-loader--light"
                    ).attr("disabled", true);
                    document.getElementById("loginForm").submit();
                }
            });

            $("#m_login_signup_submit").click(function (e) {
                e.preventDefault();
                var btn = $(this),
                    form = $(this).closest("form");

                form.validate({
                    rules: {
                        fullname: { required: true },
                        email: { required: true, email: true },
                        password: { required: true },
                        rpassword: { required: true },
                        agree: { required: true },
                    },
                });

                if (form.valid()) {
                    btn.addClass(
                        "m-loader m-loader--right m-loader--light"
                    ).attr("disabled", true);
                    form.ajaxSubmit({
                        url: "",
                        success: function () {
                            setTimeout(function () {
                                btn.removeClass(
                                    "m-loader m-loader--right m-loader--light"
                                ).attr("disabled", false);
                                form.clearForm();
                                form.validate().resetForm();
                                showSignIn();
                                var signinForm = e.find(
                                    ".m-login__signin form"
                                );
                                signinForm.clearForm();
                                signinForm.validate().resetForm();
                                showAlert(
                                    signinForm,
                                    "success",
                                    "Thank you. To complete your registration please check your email."
                                );
                            }, 500);
                        },
                    });
                }
            });

            $("#m_login_forget_password_submit").click(function (e) {
                e.preventDefault();
                var btn = $(this),
                    form = $(this).closest("form");

                form.validate({
                    rules: {
                        email: { required: true, email: true },
                    },
                });

                if (form.valid()) {
                    btn.addClass(
                        "m-loader m-loader--right m-loader--light"
                    ).attr("disabled", true);
                    form.ajaxSubmit({
                        url: "",
                        success: function () {
                            setTimeout(function () {
                                btn.removeClass(
                                    "m-loader m-loader--right m_loader--light"
                                ).attr("disabled", false);
                                form.clearForm();
                                form.validate().resetForm();
                                showSignIn();
                                var signinForm = e.find(
                                    ".m-login__signin form"
                                );
                                signinForm.clearForm();
                                signinForm.validate().resetForm();
                                showAlert(
                                    signinForm,
                                    "success",
                                    "Cool! Password recovery instruction has been sent to your email."
                                );
                            }, 10);
                        },
                    });
                }
            });
        },
    };
})();

jQuery(document).ready(function () {
    SnippetLogin.init();
});
