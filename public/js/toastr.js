function showToast(parameters) {
    /* -------------------------------------------------------------------------------------------- */
    /* parameters:      type (string)                                                               */
    /*                  title (string)                                                              */
    /*                  message (string)                                                            */
    /* -------------------------------------------------------------------------------------------- */
    toastr.options = {
        closeButton: true,
        closeClass: "toast-close-button",
        closeDuration: 300,
        closeEasing: "swing",
        closeHtml: '<button><i class="icon-off"></i></button>',
        closeMethod: "fadeOut",
        closeOnHover: true,
        containerId: "toast-container",
        debug: false,
        escapeHtml: false,
        extendedTimeOut: 10000,
        hideDuration: 1000,
        hideEasing: "linear",
        hideMethod: "fadeOut",
        iconClass: "toast-info",
        iconClasses: {
            error: "toast-error",
            info: "toast-info",
            success: "toast-success",
            warning: "toast-warning"
        },
        messageClass: "toast-message",
        newestOnTop: false,
        onHidden: null,
        onShown: null,
        positionClass: "toast-top-left",
        preventDuplicates: true,
        progressBar: true,
        progressClass: "toast-progress",
        rtl: false,
        showDuration: 300,
        showEasing: "swing",
        showMethod: "fadeIn",
        tapToDismiss: true,
        target: "body",
        timeOut: 5000,
        titleClass: "toast-title",
        toastClass: "toast"
    };

    parameters.type = typeof parameters.type === "undefined" ? "info" : parameters.type;

    switch (parameters.type.toLowerCase()) {
        case "success":
            toastr.options.timeOut = 3000;
            break;
        case "info":
            toastr.options.timeOut = 6000;
            break;
        case "warning":
            toastr.options.timeOut = 10000;
            break;
        case "error":
            toastr.options.timeOut = 15000;
            break;
        default:
            toastr.options.timeOut = 5000;
    }

    toastr[parameters.type](parameters.message, parameters.title + "<hr />");
    /* -------------------------------------------------------------------------------------------- */
}
