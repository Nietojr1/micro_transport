
import './bootstrap';
import { createApp } from 'vue';

import PrimeVue from "primevue/config";
import "primevue/resources/themes/saga-orange/theme.css"
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import "primeflex/primeflex.css";

import ExampleComponent from './components/ExampleComponent.vue';
import TableUser from './components/User/TableUser.vue';
import TableVehicle from './components/vehicle/TableVehicle.vue'


import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import SelectButton from 'primevue/selectbutton';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Tag from 'primevue/tag';
import Tooltip from 'primevue/tooltip';

const app = createApp({});

app.use(PrimeVue)

app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('Button', Button);
app.component('SelectButton', SelectButton);
app.component('InputText', InputText);
app.component('InputNumber', InputNumber)
app.component('Tag', Tag);
app.directive('tooltip', Tooltip);


app.component('example-component', ExampleComponent);
app.component('TableUser', TableUser);
app.component('TableVehicle', TableVehicle);
app.use(PrimeVue, { ripple: true });

app.mount('#app');
