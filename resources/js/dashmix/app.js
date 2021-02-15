// Import global dependencies
import './bootstrap';
window.Vue = require('vue');


import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import VueFlatPickr from 'vue-flatpickr-component';
import VueRouter from 'vue-router'
import Toast,{ POSITION } from "vue-toastification";


import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'flatpickr/dist/flatpickr.css';
import "vue-toastification/dist/index.css";

// Install BootstrapVue
Vue.use(VueFlatPickr);
Vue.use(BootstrapVue);
Vue.use(CKEditor);
// Import required modules
import Tools from './modules/tools';
import Helpers from './modules/helpers';
import Template from './modules/template';
const options = {
    // You can set your default options here
    timeout: 4000,
    draggable: false,
    closeOnClick: true,
    position: POSITION.TOP_RIGHT
};


Vue.use(Toast, options);

Vue.component('WorkshopUpdate',require('../components/Workshop/Backend/WorkshopUpdate').default);
Vue.component('WorkshopCreate',require('../components/Workshop/Backend/WorkshopCreate').default);
Vue.component('WorkshopOverview',require('../components/Workshop/Backend/WorkshopOverview').default);
Vue.component('WorkshopUpdate',require('../components/Workshop/Backend/WorkshopUpdate').default);
Vue.component('PreviewModal',require('../components/Workshop/Backend/PreviewModal').default);

// //ExampleComponent -- example-component
const files = require.context('../', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Config
import config from "../config";
Vue.prototype.$config = config;

//Bootstraps
import router from "../bootstraps/router.js";


const app = new Vue({

    el: '#main-container',
    router
});

// App extends Template
export default class App extends Template {
    /*
     * Auto called when creating a new instance
     *
     */
    constructor() {
        super();
    }

    /*
     *  Here you can override or extend any function you want from Template class
     *  if you would like to change/extend/remove the default functionality.
     *
     *  This way it will be easier for you to update the module files if a new update
     *  is released since all your changes will be in here overriding the original ones.
     *
     *  Let's have a look at the _uiInit() function, the one that runs the first time
     *  we create an instance of Template class or App class which extends it. This function
     *  inits all vital functionality but you can change it to fit your own needs.
     *
     */

    /*
     * EXAMPLE #1 - Removing default functionality by making it empty
     *
     */

    //  _uiInit() {}


    /*
     * EXAMPLE #2 - Extending default functionality with additional code
     *
     */

    //  _uiInit() {
    //      // Call original function
    //      super._uiInit();
    //
    //      // Your extra JS code afterwards
    //  }

    /*
     * EXAMPLE #3 - Replacing default functionality by writing your own code
     *
     */

    //  _uiInit() {
    //      // Your own JS code without ever calling the original function's code
    //  }
}

// Once everything is loaded
jQuery(() => {
    // Create a new instance of App
   window.Dashmix = new App();
});
