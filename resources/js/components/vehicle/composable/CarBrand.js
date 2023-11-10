import { ref } from "vue";
import axios from "axios";

export default function useCardBrand() {
    const allBrand = ref([])

    const getAllBrand = async () => {
        try {

            const response = await axios.get('getAllBrand')
            console.log(response.data);

            allBrand.value = response.data;

        } catch (error) {

            console.log(error);

            alert(error);

        }
    }

    return { allBrand, getAllBrand}

}
