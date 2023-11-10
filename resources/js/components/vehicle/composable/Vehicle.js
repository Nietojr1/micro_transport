import { ref } from "vue";
import axios from "axios";

export default function useVehicles() {
    const allVehicle      = ref([])
    const vehicleByPlate  = ref([])
    const newVehicle      = ref([])


    const getAllVehicle = async () => {
        try {

            const response = await axios.get('allVehicle')

            allVehicle.value = response.data;

        } catch (error) {

            alert(error);

        }
    }

    const getVehicleByPlate = async (plateVehicle) => {

        try {

            const response = await axios.get(`vehicleByPlate/${plateVehicle}`);

            vehicleByPlate.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }

    const postNewVehicle = async (dataCard) => {
        try {

            const response = await axios.post(`vehicleNew`, dataCard);

            newVehicle.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }

    return {
        getAllVehicle, allVehicle,
        getVehicleByPlate, vehicleByPlate,
        postNewVehicle, newVehicle

    }

}
