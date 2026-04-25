import {useToast} from "vue-toastification";
import i18n from "../i18n";
/*
 * Position
 * --------------
 * top-right
 * top-center
 * top-left
 * bottom-right
 * bottom-center
 * bottom-left
 * */
export default {
    default: function (message = "Default", position = "top-right") {
        const toast = useToast();
        toast(message, {
            position: position,
        });
    },

    success: function (message = "Success", position = "top-right") {
        const toast = useToast();
        toast.success(message, {
            position: position,
        });
    },

    info: function (message = "Info", position = "top-right") {
        const toast = useToast();
        toast.info(message, {
            position: position,
        });
    },

    warning: function (message = "Warning", position = "top-right") {
        const toast = useToast();
        toast.warning(message, {
            position: position,
        });
    },

    error: function (message = "Error", position = "top-right") {
        const toast = useToast();
        toast.error(message, {
            position: position,
        });
    },

    successFlip: function (status = null, message = "", position = "top-right") {
        const toast = useToast();
        if (status != null) {
            if (status) {
                message = message + i18n.global.t('message.updated_successfully');
            } else {
                message = message + i18n.global.t('message.created_successfully');
            }
        } else {
            message = message + i18n.global.t('message.deleted_successfully');
        }

        toast.success(message, {
            position: position,
        });
    },

    successInfo: function (status = null, message = "", position = "top-right") {
        const toast = useToast();
        toast.success(message, {
            position: position,
        });
    },
};
