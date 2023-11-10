import { ref } from "vue";
import axios from "axios";

export default function useRoles() {
    const allRoles = ref([])
    const roleId   = ref([])

    const getAllRoles = async () => {
        try {

            const response = await axios.get('getAllRoles')

            allRoles.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);

        }
    }

    const getRoleById = async (idRole) => {

        try {

            const response = await axios.get(`role/${idRole}`);

            roleId.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }


    return { allRoles, getAllRoles, roleId, getRoleById}

}
