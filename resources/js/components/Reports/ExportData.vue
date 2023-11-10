<template>
    <div class="card">
        <DataTable :value="allDataExport" ref="dt" tableStyle="min-width: 50rem" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]">

            <template #header>
                <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                    <span class="text-xl text-900 font-bold">Report Information</span>
                    <div class="addVehicle ml-2">
                        <button
                            type="button"
                            v-tooltip.left="'Export Information'"
                            class="btn btn-outline-success pt-1 w-auto"
                            rounded
                            @click="exportCSV($event)"
                            >
                            <i class="allProduct pi pi-file-excel pr-2"></i>Export Data
                        </button>
                    </div>
                </div>
            </template>
            <Column field="plate" header="Plate">
                <template #body="slotProps">
                    {{ (slotProps.data.plate) }}
                </template>
            </Column>
            <Column field="brand_name" header="Brand">
                <template #body="slotProps">
                    {{ (slotProps.data.brand_name) }}
                </template>
            </Column>
            <Column field="owner_full_name" header="Owner">
                <template #body="slotProps">
                    {{ slotProps.data.owner_full_name }}
                </template>
            </Column>
            <Column field="driver_full_name" header="Driver">
                <template #body="slotProps">
                    {{ slotProps.data.driver_full_name }}
                </template>
            </Column>
            <template #footer> In total there are {{ allDataExport ? allDataExport.length : 0 }} vehicles. </template>
        </DataTable>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import useExport from "./Composable/Export"
export default {

    setup() {
        const { allDataExport, getAllDataExport } = useExport();
        const dt = ref(null);
        const exportCSV = () => {
        if (dt.value) {
            dt.value.exportCSV();
        } else {
            console.error("DataTable instance is not available.");
        }
    };
        onMounted(() => {
            getAllDataExport();
        });

        return {
            allDataExport, getAllDataExport,
            exportCSV, dt
        };
    },

};
</script>
<style>
</style>

