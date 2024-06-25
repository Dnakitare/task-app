import { ref } from "vue";
import { makeHttpReq } from "../../../helper/makeHttpReq";
import { showError, showSuccess } from "../../../helper/toast-notification";

export type RegisterUserType = {
  email: string
  password: string
}

export type RegisterResponseType = {
  user: { email: string }
  message: string
}

export const registerInput = ref<RegisterUserType>({} as RegisterUserType)

export function useRegisterUser() {
  const loading = ref(false)
  async function register() {
    try {
      loading.value = true
      const data = await makeHttpReq<RegisterUserType, RegisterResponseType>(
        'register',
        'POST',
        registerInput.value
      )
      loading.value = false
      registerInput.value = {} as RegisterUserType
      showSuccess(data.message)
      // Redirect to /login page
      window.location.href = '/app/login';
    } catch (error: any) {
      loading.value = false
      showError(error.message)
    }
  }

  return {register, loading}
}