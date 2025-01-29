import { reactive, toRefs } from "vue";

export default function (columns) {
    const model = reactive({
        filters: {},
    });

    const filterData = (filters, callback) => {
        model.filters.page = 1;
        Object.assign(model.filters, filters);

        callback();
    }

    const updateSorter = (field, callback) => {
        if (! field.sortable) return;

        columns.value.map(item => {
            field.sort_key === item.sort_key ?
                item.direction = field.direction :
                item.direction = ''
        })

        if (field.direction === '') {
            field.direction = 'asc';
        } else {
            field.direction = field.direction === 'asc' ? 'desc' : 'asc';
        }

        model.filters.sorter = {
            column: field.sort_key,
            direction: field.direction,
        };

        callback();
    }

    const paginate = (page, callback) => {
        model.filters.page = page;

        callback();
    }

    return {
        ...toRefs(model),
        filterData,
        updateSorter,
        paginate,
    }
}
