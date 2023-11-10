<template>
    <div class="card">
        <DataTable :value="allUsers" tableStyle="min-width: 50rem" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" >
            <template #header>
                <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                    <span class="text-xl text-900 font-bold">Users</span>
                    <div class="addUser ml-2">
                        <button
                            type="button"
                            v-tooltip.left="'Add new user'"
                            class="btn btn-outline-primary pt-1 w-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            rounded
                            @click="addUser"
                            >
                            <i class="allProduct pi pi-plus-circle pr-2"></i>New User
                        </button>
                    </div>
                </div>
            </template>
            <Column field="idcard" header="Id Card">
                <template #body="slotProps">
                    {{ (slotProps.data.id_card) }}
                </template>
            </Column>

            <Column field="firstname" header="First Name">
                <template #body="slotProps">
                    {{ (slotProps.data.first_name) }}
                </template>
            </Column>
            <Column field="middlename" header="Middle Name">
                <template #body="slotProps">
                    {{ (slotProps.data.middle_name) }}
                </template>
            </Column>
            <Column field="lastname" header="Last Name">
                <template #body="slotProps">
                    {{ (slotProps.data.last_name) }}
                </template>
            </Column>
            <Column field="address" header="Address">
                <template #body="slotProps">
                    {{ (slotProps.data.address) }}
                </template>
            </Column>
            <Column field="phone" header="Phone">
                <template #body="slotProps">
                    {{ (slotProps.data.phone) }}
                </template>
            </Column>
            <Column field="city" header="City">
                <template #body="slotProps">
                    {{ (slotProps.data.city) }}
                </template>
            </Column>

            <Column field="role" header="Role">
                <template #body="slotProps">
                    <div class="flex align-items-center gap-3">
                        <Tag
                            rounded
                            :value=getRoleName(slotProps.data.role_id)
                            :severity="getSeverity(slotProps.data.role_id)"
                        ></Tag>
                    </div>
                </template>
            </Column>
            <modal-user :Userupd="updUser" :modalTitle="titleModal"/>


            <template #footer> In total there are {{ allUsers ? allUsers.length : 0 }} users. </template>
        </DataTable>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import useUsers from "./composable/Users"
import useRoles from "./composable/Roles"
import ModalUser from "./ModalUser.vue"
export default {
  components: { ModalUser },

    setup() {
        const {allUsers, getAllUsers } = useUsers();
        const {allRoles, getAllRoles } = useRoles();

        onMounted(() => {
            getAllUsers();
            getAllRoles();
        });

        return {
            allUsers,
            getAllUsers,
            allRoles,
            getAllRoles
        };
    },

    data() {
        return {
            updUser: {
                role_id: '',
                id_card: '',
                first_name: '',
                middle_name: '',
                last_name: '',
                address: '',
                email: '',
                phone: '',
                city: '',
                password: '',
            },
            titleModal:'',
        };
    },

    methods: {
        getSeverity (role)  {
            switch (role) {
                case 1:
                return "success";
                case 2:
                return "warning";
                default:
                    return null;
            }
        },

        getRoleName(idRol) {
        let role = this.allRoles.find(c => c.id === idRol);
            if (role) {
                return role.name;
            }
        },

        addUser(){
            this.titleModal = 'Add new user';
            this.updUser = {
                role_id: '',
                id_card: '',
                first_name: '',
                middle_name: '',
                last_name: '',
                address: '',
                email: '',
                phone: '',
                city: '',
                password: '',
            };
        },


    }
};
</script>
<style>
</style>
