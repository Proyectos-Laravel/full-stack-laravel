import { inject } from "vue";

export default function ()
{
    const addErrorToast = inject('addErrorToast');

    const makeRequest = ({ method, url, data = null, headers = {} }) => {
        return axios[method](url, data, headers);
    };

    axios.interceptors.response.use(
        response => response,
        error => {
            const { response } = error;
            if ([500, 403, 401].includes(response?.status)) {
                if (response.status === 401) {
                    window.location.reload();
                    return;
                }

                const statusMessages = {
                    500: "Algo ha ido mal. Por favor inténtelo otra vez",
                    403: "No está autorizado a acceder a este recurso.",
                };

                addErrorToast(
                    'Error',
                    statusMessages[response.status],
                    5000,
                )
            }
            return Promise.reject(error);
        }
    );

    return {
        makeRequest
    };
}
