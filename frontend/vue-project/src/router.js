import {
    createMemoryHistory,
    createWebHashHistory,
    createWebHistory,
    createRouter,
} from "vue-router";
import HomePage from "./pages/home.vue";
import About from "./pages/about.vue";
// import SecondPage from "./pages/SecondPage.vue";
// import ThirdPage from "./pages/ThirdPage.vue";

const routes = [
    { path: "/", component: HomePage },
    { path: "/about", name: "about", component: About },
    // { path: "/second", name: "secondpage", component: SecondPage },
    // { path: "/third", name: "thirdpage", component: ThirdPage },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
