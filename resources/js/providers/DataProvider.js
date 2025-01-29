import {defineComponent, ref, watch} from "vue";

export default defineComponent({
    name: "DataProvider",
    props: {
        providerKey: {
            type: String,
        },
        url: {
            type: String,
        },
        filters: {
            type: Object,
            default: () => ({}),
        }
    },
    emits: ["refreshed"],
    setup(props, {slots, emit})
    {
        const data = ref(null);
        const loading = ref(false);
        const error = ref(null);

        watch(() => props.providerKey, () => fetchData());

        const fetchData = () => {
            loading.value = true;

            const urlParts = props.url.split('?');
            if (urlParts.length > 1) {
                const arrayOfFilters = urlParts[1].split('&');
                arrayOfFilters.forEach((filter) => {
                    const filterParts = filter.split('=');
                    props.filters[filterParts[0]] = filterParts[1];
                });
            }

            let filters = Object.keys(props.filters)
                .filter(key => key !== 'sorter')
                .filter(key => props.filters[key])
                .map(key => `${key}=${props.filters[key]}`)
                .join('&');

            if (props.filters?.sorter?.column) {
                if (filters) {
                    filters += '&';
                } else {
                    filters = '?';
                }
                filters += `sorter[column]=${props.filters?.sorter?.column}&sorter[direction]=${props.filters?.sorter?.direction}`;
            }

            fetch(`${urlParts[0]}?${new URLSearchParams(filters)}`)
                .then(response => response.json())
                .then(json => data.value = json)
                .then(json => emit('refreshed', json))
                .catch(er => error.value = er)
                .finally(() => loading.value = false);
        }

        fetchData()

        return () => slots.default({
            data: data.value,
            loading: loading.value,
            error: error.value,
        })
    }
});

/**
 * <DataProvider
 *  :url
 *  :provider-key
 *  @refreshed="dataProviderLoaded"
 * >
 *   <template v-slot="{loading, data, error}">
 *
*    </template>
 * </DataProvider>
 */
