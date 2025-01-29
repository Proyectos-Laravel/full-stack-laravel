import {ref} from 'vue';

export default function useDataProvider()
{
    const dataProviderKey = ref(`data-provider-${Date.now()}`);

    const updateDataProvider = () => {
        dataProviderKey.value = `data-provider-${Date.now()}`
    }

    return {
        dataProviderKey,
        updateDataProvider,
    }
}
