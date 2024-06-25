import { useToast } from "vue-toast-notification";

const toast = useToast();

export function showError(message: string) {
  toast.error(message, {
    position: 'top-right',
    duration: 5000,
    dismissible: true,
  })
}

export function showSuccess(message: string) {
  toast.success(message, {
    position: 'top-right',
    duration: 5000,
    dismissible: true,
  })
}