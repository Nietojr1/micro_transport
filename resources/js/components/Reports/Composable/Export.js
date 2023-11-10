import { ref } from "vue";
import axios from "axios";

export default function useExportData() {
    const exportData         = ref([]);
    const allDataExport      = ref([]);


    const postExportData = async (request, role) => {
        try {
            const response = await axios.post('ExportData', {
                selectedCategory: request,
                role: role
            });
            console.log(response.data);
            exportData.value = response.data;
        } catch (error) {
            alert(error);
        }
    }

    const getAllDataExport = async () => {
        try {

            const response = await axios.get('allDataExport')

            console.log(response.data);

            allDataExport.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);

        }
    }


    return {
        exportData, postExportData,
        allDataExport, getAllDataExport

    }
}
