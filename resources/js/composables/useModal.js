import { reactive, ref, toRefs } from 'vue'

export default function useModal()
{
    const modalAction = ref(null)
    const model = reactive({
        modelSelected: null,
    })

    const openModal = (action, modelSelected = null) => {
        modalAction.value = action;
        model.modelSelected = modelSelected;
    }

    const closeModal = callback => {
        modalAction.value = null;
        model.modelSelected = null;

        callback();
    }

    return {
        ...toRefs(model),
        modalAction,
        openModal,
        closeModal,
    }
}
