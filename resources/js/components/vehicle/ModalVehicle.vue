<template>
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content bg-body text-dark" >
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-user-tie"></i> {{ modalTitle }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form >

                    <div class="modal-body ">
                        <section class="d-flex justify-content-evenly flex-wrap">
                            <div class="form-group" v-if="true">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Owner</label>
                                <select
                                    class="form-control"
                                    style="width: 205px;"
                                    id="owner"
                                    required
                                    v-model="VehicleNew.owner_id"
                                >
                                    <option v-for="option in allUserByRole"
                                        :key="option.id"
                                        :value="option.id">
                                        {{ option.first_name + ' '+ option.last_name }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group" v-if="true">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Driver</label>
                                <select
                                    class="form-control"
                                    style="width: 205px;"
                                    id="driver"
                                    required
                                    v-model="VehicleNew.driver_id"
                                >
                                    <option v-for="option in allUserByRole"
                                        :key="option.id"
                                        :value="option.id">
                                        {{ option.first_name + ' '+ option.last_name }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group" v-if="true">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Brand</label>
                                <select
                                    class="form-control"
                                    style="width: 205px;"
                                    id="brand"
                                    required
                                    v-model="VehicleNew.brand_id"
                                >
                                    <option v-for="option in allBrand"
                                        :key="option.id"
                                        :value="option.id">
                                        {{ option.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group" v-if="true">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Plate</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="plate"
                                    placeholder="###-###"
                                    required
                                    v-model="VehicleNew.id_card"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Color</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="color"
                                    placeholder="Black"
                                    required
                                    v-model="VehicleNew.color"
                                />
                            </div>
                            <div class="form-group m-n1">
                                <label class="fw-bold mb-n1 pb-n1 fs-6" for="status">Type</label>
                                <select
                                    class="form-control mb-3 m-n1"
                                    style="width: 205px;"
                                    id="type"
                                    v-model="VehicleNew.type"
                                >
                                    <option value="Particular">Particular</option>
                                    <option value="Particular">Public</option>
                                </select>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-outline-secondary pt-1 p-1 w-2"
                            v-tooltip.left="'Close modal'"
                            data-bs-dismiss="modal"
                            >
                            <i class="addFavorites pi pi-sign-out"></i>
                        </button>
                        <button
                                @click="addVehicle"
                                type="button"
                                v-tooltip.left="'Save changes'"
                                class="btn btn-outline-success pt-1 p-1 w-2"
                                :disabled="false">
                                <i class="pi pi-save"></i>
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { ref, onMounted, reactive } from "vue";
import useVehicle from "./composable/Vehicle"
import useCardBrand from "./composable/CarBrand"
import useUsers from "../User/composable/Users"
import { all } from "axios";

export default {
    props: ["VehicleNew", "modalTitle", "colorModal"],

    setup() {
        const { postNewVehicle, newVehicle } = useVehicle();
        const { allBrand, getAllBrand } = useCardBrand();
        const {getAllUsers, allUsers, getUserByRole, allUserByRole} = useUsers();
        const ownerOptions = ref([]);
        const driverOptions = ref([]);

        onMounted(() => {
            getAllBrand();
            getAllUsers();
        });

        return {
            postNewVehicle, newVehicle,
            allBrand, getAllBrand,
            getAllUsers, allUsers,
            getUserByRole, allUserByRole,
            ownerOptions, driverOptions
        };
    },

    data() {
        return {
            bgColor: 'bg-primary',
        };
    },


    methods: {
        addVehicle: async function() {
            await this.postNewVehicle(this.VehicleNew);
            this.closeModal();
        },

        closeModal() {
            const modal = document.getElementById("exampleModal");
            modal.classList.remove("show");
            modal.style.display = "none";
            const backdrop = document.querySelector(".modal-backdrop");
            backdrop.parentNode.removeChild(backdrop);
        },
    },
};
</script>
<style>
</style>
