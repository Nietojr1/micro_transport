import { ref } from "vue";
import axios from "axios";

export default function useUsers() {
    const userLogged    = ref([])
    const allUsers      = ref([])
    const userId        = ref([])
    const newUser       = ref([])
    const allUserByRole = ref([])


    const getUserLogged = async () => {
        try {

            const response = await axios.get('userLogged')

            userLogged.value = response.data;

        } catch (error) {

            alert(error);

        }
    }


    const getAllUsers = async () => {
        try {


            const response = await axios.get('getAllUsers')

            console.log(response.data);

            allUsers.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);

        }
    }


    const getUserById = async (idUser) => {

        try {

            const response = await axios.get(`userById/${idUser}`);

            userId.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }

    const postNewUser = async (dataUser) => {
        try {

            const response = await axios.post(`userNew`, dataUser);

            newUser.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }

    const getUserByRole = async (idRole) => {

        try {

            const response = await axios.get(`userByRole/${idRole}`);

            console.log(response.data);

            allUserByRole.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);
        }
    }

    return { getUserLogged, userLogged, getAllUsers, allUsers, userId, getUserById, postNewUser, newUser, getUserByRole, allUserByRole}

}
