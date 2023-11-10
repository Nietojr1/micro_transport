<template>
    <div class="card">
        <DataTable :value="allVehicle" tableStyle="min-width: 50rem" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" >
            <template #header>
                <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                    <span class="text-xl text-900 font-bold">Vehicles</span>
                    <div class="addVehicle ml-2">
                        <button
                            type="button"
                            v-tooltip.left="'Add new vehicle'"
                            class="btn btn-outline-primary pt-1 w-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            rounded
                            @click="addVehicle"
                            >
                            <i class="allProduct pi pi-plus-circle pr-2"></i>New Vehicle
                        </button>
                    </div>
                </div>
            </template>
            <Column field="owner" header="Owner">
                <template #body="slotProps">
                    {{ getUserName(slotProps.data.owner_id) }}
                </template>
            </Column>


            <Column field="driver" header="Driver">
                <template #body="slotProps">
                    {{ getUserName(slotProps.data.driver_id) }}
                </template>
            </Column>
            <Column field="brand" header="Brand">
                <template #body="slotProps">
                    {{ getBrandName(slotProps.data.brand_id) }}
                </template>
            </Column>
            <Column field="plate" header="Plate">
                <template #body="slotProps">
                    {{ (slotProps.data.plate) }}
                </template>
            </Column>
            <Column field="color" header="Color">
                <template #body="slotProps">
                    {{ (slotProps.data.color) }}
                </template>
            </Column>
            <Column field="type" header="Type">
                <template #body="slotProps">
                    <div class="flex align-items-center gap-3">
                        <Tag
                            rounded
                            :value=(slotProps.data.type)
                            :severity="getSeverity(slotProps.data.type)"
                        ></Tag>
                    </div>
                </template>
            </Column>
            <modal-vehicle :VehicleNew="newVehicle" :modalTitle="titleModal"/>

            <template #footer> In total there are {{ allVehicle ? allVehicle.length : 0 }} vehicles. </template>
        </DataTable>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import useVehicle from "./composable/Vehicle"
import useCardBrand from "./composable/CarBrand"
import useUsers from "../User/composable/Users"
import ModalVehicle from "./ModalVehicle.vue"
export default {
  components: { ModalVehicle },

    setup() {
        const { getAllVehicle, allVehicle, getVehicleByPlate, vehicleByPlate, } = useVehicle();
        const { allBrand, getAllBrand } = useCardBrand();
        const {getAllUsers, allUsers} = useUsers();



        onMounted(() => {
            getAllVehicle();
            getAllBrand();
            getAllUsers();
        });

        return {
            getAllVehicle, allVehicle,
            getVehicleByPlate, vehicleByPlate,
            allBrand, getAllBrand,
            getAllUsers, allUsers
        };
    },

    data() {
        return {
            newVehicle: {
                owner_id: '',
                driver_id: '',
                brand_id: '',
                plate: '',
                color: '',
                type: '',
            },
            titleModal:'',
        };
    },

    methods: {
        getSeverity (type)  {
            switch (type) {
                case "PARTICULAR":
                return "success";
                case "PUBLIC":
                return "warning";
                default:
                    return null;
            }
        },

        getBrandName(idBrand) {
        let brand = this.allBrand.find(c => c.id === idBrand);
            if (brand) {
                return brand.name;
            }
        },

        getUserName(idUser) {
        let nameUser = this.allUsers.find(c => c.id === idUser);
            if (nameUser) {
                return nameUser.first_name + ' ' + nameUser.last_name ;
            }
        },

        // getUserName: async function(idUser){
        //     console.log(idUser);
        //     await this.getUserById(idUser)
        //     return this.userId.name
        // },

        addVehicle(){
            this.titleModal = 'Add new Vehicle';
            this.newVehicle = {
                owner_id: '',
                driver_id: '',
                brand_id: '',
                plate: '',
                color: '',
                type: '',
            };
        },


    }
};
</script>
<style>
</style>
