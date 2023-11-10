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
                                <label class="fw-bold mb-n1 pb-n1" for="name">Role</label>
                                <select
                                    class="form-control"
                                    style="width: 205px;"
                                    id="roles"
                                    v-model="Userupd.role_id"
                                >
                                    <option v-for="option in allRoles"
                                        :key="option.id"
                                        :value="option.id">
                                        {{ option.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" v-if="true">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Id Card</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="idcard"
                                    placeholder="###########"
                                    required
                                    v-model="Userupd.id_card"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="name">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="firstname"
                                    placeholder="Juan"
                                    required
                                    v-model="Userupd.first_name"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="name">Middle Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="middlename"
                                    placeholder="Antonio"
                                    required
                                    v-model="Userupd.middle_name"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="last_name">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="lastname"
                                    placeholder="Pérez Perez"
                                    required
                                    v-model="Userupd.last_name"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="last_name">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Calle x #x-yy"
                                    required
                                    v-model="Userupd.address"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="phone">Phone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    placeholder="#### #######"
                                    required
                                    v-model="Userupd.phone"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="phone">City</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="city"
                                    placeholder="Colombia"
                                    required
                                    v-model="Userupd.city"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="xxxxx@mail.com"
                                    required
                                    v-model="Userupd.email"
                                />
                            </div>
                            <div class="form-group">
                                <label class="fw-bold mb-n1 pb-n1" for="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control "
                                    id="password"
                                    placeholder="###########"
                                    required
                                    v-model="Userupd.password"
                                />
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
                                @click="addUser"
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
import useUsers from "./composable/Users";
import useRoles from "./composable/Roles";
import { all } from "axios";

export default {
    props: ["Userupd", "modalTitle", "colorModal"],

    setup() {
        const { postNewUser, newUser } = useUsers();
        const { allRoles, getAllRoles } = useRoles();

        onMounted(() => {
            getAllRoles();
        });

        return {
            postNewUser, newUser,
            allRoles, getAllRoles
        };
    },

    data() {
        return {
            bgColor: 'bg-primary',
        };
    },

    // mounted() {
    //     if (this.Userupd == "") {
    //         console.log("no hay data");
    //     } else {
    //         this.roles = this.Userupd.role_id;
    //     }
    // },

    methods: {
        addUser: async function() {
            await this.postNewUser(this.Userupd);
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
