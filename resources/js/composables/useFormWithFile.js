import { reactive, toRefs } from 'vue'

export default function useFormWithFile()
{
    const data = reactive({
        selectedFile: null,
        fileLoaded: false,
    })

    const onFileChange = e => {
        data.selectedFile = e.target.files[0];
        data.fileLoaded = true;
    }

    return {
        ...toRefs(data),
        onFileChange,
    }
}
