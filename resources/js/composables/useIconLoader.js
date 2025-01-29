import { defineAsyncComponent } from 'vue';

export default function useIconLoader() {
    const loadIcon = name => {
        return defineAsyncComponent({
            loader: () => import('@heroicons/vue/24/outline').then(module => module[name]),
        });
    }

    return {
        loadIcon,
    };
}
