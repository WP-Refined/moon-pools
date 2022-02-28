require("./bootstrap");

import { createApp } from "vue";
import DashboardLayout from "./Pages/Dashboard/DashboardLayout";

createApp({
    components: {
        DashboardLayout,
    }
}).mount("#app");
